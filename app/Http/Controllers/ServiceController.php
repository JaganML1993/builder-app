<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCreateReq;
use App\Models\ProfessionalService;
use App\Models\Service;
use App\Models\ServiceList;
use App\Models\ServiceSolution;
use App\Models\SubServiceList;
use App\Models\SubSubServiceList;
use App\Rules\UniqueSlug;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->filled('service_id')) {
            $query->where('service_slug', $request->service_id);
        }

        $services = $query->with('serviceList')->latest()->get();

        $allServices = ServiceList::all();

        return view('admin.service.index', compact('services', 'allServices'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $action = $request->input('action');
        $required = ($action == 'draft') ? 'nullable' : 'required';

        // Validate the request data
        $validatedData = $request->validate([
            'service_slug' => 'nullable',
            'sub_service_slug' => 'nullable',
            'sub_sub_service_slug' => 'nullable',
            'meta_title' => $required . '|string|max:255',
            'meta_description' => $required . '|string',
            'meta_keywords' => 'nullable|string',
            'banner_title' => $required . '|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('services')
            ],
            'banner_description' => $required . '|string',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'body_content' => $required . '|string',
            'code_snippet' => 'nullable|string',

            // Service
            'service_list_title' => 'nullable|string',
            'service_list_description' => 'nullable|string',
            'service_list_item_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'service_list_item_image_old.*' => 'nullable',
            'service_list_item_title.*' => 'nullable|string|max:255',
            'service_list_item_description.*' => 'nullable|string',
            'service_list_item_link.*' => 'nullable|string',

            // More Services
            'more_service_main_title' => 'nullable|string|max:255',
            'more_service_items' => 'nullable|array',
            'more_service_items.*' => 'nullable|string|max:255',
            'more_service_items_link.*' => 'nullable|string|max:255',

            // Process Flow
            'process_flow_title' => 'nullable|string',
            'process_flow_description' => 'nullable|string',
            'process_flow_item_logo.*' => 'nullable|string',
            'process_flow_item_title.*' => 'nullable|string',
            'process_flow_item_description.*' => 'nullable|string',

            // Industries We Serve
            'industry_main_title' => 'nullable|string',
            'industry_items' => 'nullable|array',
            'industry_items.*' => 'nullable|string|max:255',

            // Why Choose Us
            'why_choose_title' => 'nullable|string',
            'why_choose_description' => 'nullable|string',
            'why_choose_item_title.*' => 'nullable|string|max:255',
            'why_choose_item_description.*' => 'nullable|string',
            'why_choose_item_link.*' => 'nullable|string',

            // Article
            'article_main_title' => 'nullable|string',
            'article_item_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'article_item_description.*' => 'nullable|string',
            'article_item_link.*' => 'nullable|string',

            // Additional Services
            'additional_title' => 'nullable|string',
            'additional_services_item_title.*' => 'nullable|string|max:255',
            'additional_services_item_description.*' => 'nullable|string',
            'additional_services_item_link.*' => 'nullable|string',

            // Tech Images
            'tech_title' => 'nullable|string',
            'tech_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',

            // Client Success Stories
            'client_main_title' => 'nullable|string',
            'client_title_link' => 'nullable|string',
            'client_success_title.*' => 'nullable|string|max:255',
            'client_success_description.*' => 'nullable|string',
            'client_success_link.*' => 'nullable|string',

            // Client Testimonial
            'testimonial_main_title' => 'nullable|string',
            'testimonial_title_link' => 'nullable|string',
            'testimonial_title' => 'nullable|string',
            'testimonial_description' => 'nullable|string',
            'testimonial_author' => 'nullable|string',
            'testimonial_company' => 'nullable|string',
            'testimonial_link' => 'nullable|string',

            // Out Source
            'outsource_title' => 'nullable|string',
            'outsource_description' => 'nullable|string',
            'outsource_para' => 'nullable|string',
            'outsource_dynamic' => 'nullable|array',
            'outsource_dynamic.*' => 'nullable|string|max:255',

            // FAQ
            'faq_main_title' => 'nullable|string',
            'faq_title.*' => 'nullable|string',
            'faq_description.*' => 'nullable|string',
        ]);

        // dd($validatedData);

        // Initialize an empty array for service list items
        $serviceListItems = [];

        // Check if service_list_item_image is set and has elements
        if (isset($validatedData['service_list_item_image']) && count($validatedData['service_list_item_image']) > 0) {
            foreach ($validatedData['service_list_item_image'] as $index => $file) {
                // Ensure all other arrays have values at the current index
                $serviceTitle = $validatedData['service_list_item_title'][$index] ?? null;
                $serviceDescription = $validatedData['service_list_item_description'][$index] ?? null;
                $serviceLink = $validatedData['service_list_item_link'][$index] ?? null;

                // Process the file and save it
                $imagePath = $this->saveFileToFolder($file, 'storage/service_list_item_images');

                // Create an array for the service list item
                $serviceListItem = [
                    'image' => $imagePath,
                    'title' => $serviceTitle,
                    'description' => $serviceDescription,
                    'link' => $serviceLink,
                ];

                // Add the service list item to the array
                $serviceListItems[] = $serviceListItem;
            }
        } else {
            // If no data, populate with null values
            $serviceListItems[] = [
                'image' => null,
                'title' => null,
                'description' => null,
                'link' => null,
            ];
        }

        // Convert the array to JSON format
        $serviceListJson = json_encode($serviceListItems);



        // process flow
        $processFlowJson = null;
        if (isset($validatedData['process_flow_item_logo']) && count($validatedData['process_flow_item_logo']) > 0) {
            $processFlowListItems = [];
            foreach ($validatedData['process_flow_item_logo'] as $index => $file) {
                $processFlowLogo = $validatedData['process_flow_item_logo'][$index];
                $processFlowTitle = $validatedData['process_flow_item_title'][$index];
                $processFlowDescription = $validatedData['process_flow_item_description'][$index];

                $serviceListItem = [
                    'logo' => $processFlowLogo,
                    'title' => $processFlowTitle,
                    'description' => $processFlowDescription,
                ];

                // Add the service item to the array
                $processFlowListItems[] = $serviceListItem;
            }

            // Convert the array to JSON format
            $processFlowJson = json_encode($processFlowListItems);
        }

        // dd($serviceListJson,$processFlowJson);

        // why choose
        $whyChooseJson = null;
        if (isset($validatedData['why_choose_item_title']) && count($validatedData['why_choose_item_title']) > 0) {
            $whyChooseListItems = [];
            foreach ($validatedData['why_choose_item_title'] as $index => $file) {
                $whyChooseTitle = $validatedData['why_choose_item_title'][$index];
                $whyChooseDescription = $validatedData['why_choose_item_description'][$index];
                $whyChooseLink = $validatedData['why_choose_item_link'][$index];

                $serviceListItem = [
                    'title' => $whyChooseTitle,
                    'description' => $whyChooseDescription,
                    'link' => $whyChooseLink,
                ];

                // Add the service item to the array
                $whyChooseListItems[] = $serviceListItem;
            }

            // Convert the array to JSON format
            $whyChooseJson = json_encode($whyChooseListItems);
        }

        // article
        $articleListItems = [];

        // Check if article_item_image is set and has elements
        if (isset($validatedData['article_item_image']) && count($validatedData['article_item_image']) > 0) {
            foreach ($validatedData['article_item_image'] as $index => $file) {
                // Ensure all other arrays have values at the current index
                $articleDescription = $validatedData['article_item_description'][$index] ?? null;
                $articleLink = $validatedData['article_item_link'][$index] ?? null;

                // Process the file and save it
                $imagePath = $this->saveFileToFolder($file, 'storage/article_item_images');

                // Create an array for the article item
                $articleListItem = [
                    'image' => $imagePath,
                    'description' => $articleDescription,
                    'link' => $articleLink,
                ];

                // Add the article item to the array
                $articleListItems[] = $articleListItem;
            }
        } else {
            // If no data, populate with null values
            $articleListItems[] = [
                'image' => null,
                'description' => null,
                'link' => null,
            ];
        }

        // Convert the array to JSON format
        $articleJson = json_encode($articleListItems);



        // additional services
        $additionalServicesJson = null;
        if (isset($validatedData['additional_services_item_title']) && count($validatedData['additional_services_item_title']) > 0) {
            $additionalServicesItems = [];
            foreach ($validatedData['additional_services_item_title'] as $index => $file) {
                $additionalServiceTitle = $validatedData['additional_services_item_title'][$index];
                $additionalServiceDescription = $validatedData['additional_services_item_description'][$index];
                $additionalServiceLink = $validatedData['additional_services_item_link'][$index];

                $additionalServicesItem = [
                    'title' => $additionalServiceTitle,
                    'description' => $additionalServiceDescription,
                    'link' => $additionalServiceLink,
                ];

                // Add the service item to the array
                $additionalServicesItems[] = $additionalServicesItem;
            }

            // Convert the array to JSON format
            $additionalServicesJson = json_encode($additionalServicesItems);
        }

        //Tech Images
        if ($request->hasFile('tech_images')) {
            $techImages = [];

            foreach ($request->file('tech_images') as $file) {
                // Get the original filename
                $filename = $file->getClientOriginalName();

                // Move the uploaded file to the specified directory
                $file->move(public_path('storage/tech_images'), $filename);

                // Store the filename in the array
                $techImages[] = $filename;
            }

            // Store the array of filenames in the validated data
            $validatedData['tech_images'] = $techImages;
        }
        // dd($validatedData['client_success_title']);

        // Client Success Stories
        $clientJson = null;

        if (isset($validatedData['client_success_title']) && count($validatedData['client_success_title']) > 0) {
            $clientListItems = [];

            foreach ($validatedData['client_success_title'] as $index => $file) {
                $clientTitle = $validatedData['client_success_title'][$index];
                $clientTitleLink = $validatedData['client_success_title_link'][$index] ?? null; // Provide default value if not set
                $clientDescription = $validatedData['client_success_description'][$index];
                $clientLink = $validatedData['client_success_link'][$index];

                $serviceListItem = [
                    'title' => $clientTitle,
                    'title_link' => $clientTitleLink,
                    'description' => $clientDescription,
                    'link' => $clientLink,
                ];

                // Add the service item to the array
                $clientListItems[] = $serviceListItem;
            }

            // Convert the array to JSON format
            $clientJson = json_encode($clientListItems);
        }

        // Faq 

        $faqJson = null;
        if (isset($validatedData['faq_title']) && count($validatedData['faq_title']) > 0) {
            $faqListItems = [];
            foreach ($validatedData['faq_title'] as $index => $file) {
                $faqTitle = $validatedData['faq_title'][$index];
                $faqDescription = $validatedData['faq_description'][$index];

                $serviceListItem = [
                    'title' => $faqTitle,
                    'description' => $faqDescription,
                ];

                // Add the service item to the array
                $faqListItems[] = $serviceListItem;
            }

            // Convert the array to JSON format
            $faqJson = json_encode($faqListItems);
        }

        // Faq 

        $moreserviceJson = null;
        if(!empty($validatedData['more_service_items'][0])){
            if (isset($validatedData['more_service_items']) && count($validatedData['more_service_items']) > 0) {
                $faqListItems = [];
                foreach ($validatedData['more_service_items'] as $index => $file) {
                    $more_service_items = $validatedData['more_service_items'][$index];
                    $more_service_items_link = $validatedData['more_service_items_link'][$index];
    
                    $serviceListItem = [
                        'title' => $more_service_items,
                        'link' => $more_service_items_link,
                    ];
    
                    // Add the service item to the array
                    $moreserviceItems[] = $serviceListItem;
                }
    
                // Convert the array to JSON format
                $moreserviceJson = json_encode($moreserviceItems);
            }
        }


        // Generate slug from meta title
        $slug = Str::slug($validatedData['slug']);

        // Add the slug to the validated data
        $validatedData['slug'] = $slug;

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');

            // Get the original filename
            $filename = $file->getClientOriginalName();

            // Move the uploaded file to the specified directory
            $file->move(public_path('storage/banner_images'), $filename);

            // Store the filename in the validated data
            $validatedData['banner_image'] = $filename;
        }

        if ($request->hasFile('feature_image')) {
            $file = $request->file('feature_image');

            // Get the original filename
            $filename = $file->getClientOriginalName();

            // Move the uploaded file to the specified directory
            $file->move(public_path('storage/feature_images'), $filename);

            // Store the filename in the validated data
            $validatedData['feature_image'] = $filename;
        }

        $pageLink = $this->getPageLinks($validatedData);


        // Create a new service instance
        $service = new Service();
        $service->page_link = $pageLink ?? null;
        $service->service_slug = $validatedData['service_slug'] ?? '';
        $service->sub_service_slug = $validatedData['sub_service_slug'] ?? '';
        $service->sub_sub_service_slug = $validatedData['sub_sub_service_slug'] ?? '';
        $service->meta_title = $validatedData['meta_title'];
        $service->meta_description = $validatedData['meta_description'];
        $service->meta_keywords = $validatedData['meta_keywords'] ?? null;
        $service->banner_title = $validatedData['banner_title'];
        $service->banner_description = $validatedData['banner_description'];
        $service->banner_image = isset($validatedData['banner_image']) ? $validatedData['banner_image'] : null;
        $service->feature_image = isset($validatedData['feature_image']) ? $validatedData['feature_image'] : null;
        $service->body_content = $validatedData['body_content'];
        $service->code_snippet = $validatedData['code_snippet']  ?? null;


        //Services
        $service->service_list_title = $validatedData['service_list_title'] ?? null;
        $service->service_list_description = $validatedData['service_list_description'] ?? null;
        $service->service_list_contents = $serviceListJson;

        //More Services
        $service->more_service_main_title = $validatedData['more_service_main_title'] ?? null;
        $service->more_service_items = $moreserviceJson;

        //Process Flow
        $service->process_flow_title = $validatedData['process_flow_title'] ?? null;
        $service->process_flow_description = $validatedData['process_flow_description'] ?? null;
        $service->process_flow_contents = $processFlowJson;

        //Industries We serve
        if(!empty($validatedData['industry_items'][0])){
            $service->industry_main_title = $validatedData['industry_main_title'] ?? null;
            $service->industry_items = isset($validatedData['industry_items']) ? json_encode($validatedData['industry_items']) : null;
        }else{
            $service->industry_main_title = null;
            $service->industry_items = null;
        }
        

        //Why Choose Us
        $service->why_choose_title = $validatedData['why_choose_title'] ?? null;
        $service->why_choose_description = $validatedData['why_choose_description'] ?? null;
        $service->why_choose_contents = $whyChooseJson;

        //Article
        $service->article_main_title = $validatedData['article_main_title'] ?? null;
        $service->article_contents = $articleJson;

        //Additional Services
        $service->additional_title = $validatedData['additional_title'] ?? null;
        $service->additional_services_contents = $additionalServicesJson;

        //Tech Images
        $service->tech_title = $validatedData['tech_title'] ?? null;
        $service->tech_images = isset($validatedData['tech_images']) ? json_encode($validatedData['tech_images']) : null;

        //Client Success Stories
        $service->client_main_title = $validatedData['client_main_title'] ?? null;
        $service->client_title_link = $validatedData['client_title_link'] ?? null;
        $service->client_success_stories = $clientJson;

        //Client Testimonial
        $service->testimonial_main_title = $validatedData['testimonial_main_title'] ?? null;
        $service->testimonial_title_link = $validatedData['testimonial_title_link'] ?? null;
        $service->testimonial_title = $validatedData['testimonial_title'] ?? null;
        $service->testimonial_description = $validatedData['testimonial_description'] ?? null;
        $service->testimonial_author = $validatedData['testimonial_author'] ?? null;
        $service->testimonial_link = $validatedData['testimonial_link'] ?? null;

        //Out Source
        $service->outsource_title = $validatedData['outsource_title'] ?? null;
        $service->outsource_description = $validatedData['outsource_description'] ?? null;
        $service->outsource_para = $validatedData['outsource_para'] ?? null;
        $service->outsource_dynamic = isset($validatedData['outsource_dynamic']) ? json_encode($validatedData['outsource_dynamic']) : null;


        //Faq
        $service->faq_main_title = $validatedData['faq_main_title'] ?? null;
        $service->faqs = $faqJson;


        $service->slug = $validatedData['slug'];
        $service->status = 1;

        if ($action == 'publish') {
            $published = 1;
        } else if ($action == 'draft') {
            $published = 2;
        } else {
            $published = 0;
        }

        $service->published = $published;


        // dd("all ok can save");

        $service->save();

        $id = $service->id;

       

        switch ($action) {
            case 'publish':
                // Handle publish action
                return redirect()->route('admin.service.publish', ['id' => $id])
                    ->with('success', 'Service published successfully');
                break;
            case 'draft':
                return redirect()->route('admin.service.index')->with('success', 'Service Draft created successfully');
                break;
            case 'save':
                return redirect()->route('admin.service.index')->with('success', 'Service created successfully');
                break;
        }
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        $services = ServiceList::all();
        $subServices = SubServiceList::get();
        $subSubServices = SubSubServiceList::get();

        return view('admin.service.edit_v1', compact('service', 'services', 'subServices', 'subSubServices'));
    }

    // public function publish($id)
    // {
    //     $service = Service::findOrFail($id);


    //     //dd(json_decode($service->service_list_contents));

    //     $services = ServiceList::all();
    //     $subServices = SubServiceList::get();
    //     $subSubServices = SubSubServiceList::get();

    //     return view('admin.service.publish', compact('service', 'services', 'sub_services', 'sub_sub_services'));
    // }

    public function publish($id)
    {
        $service = Service::findOrFail($id);

        Service::where('id', $id)->update(['published' => 1]);

        $services = ServiceList::all();
        $sub_services = SubServiceList::where('services_list_id', $service->service_slug)->get();
        $sub_sub_services = SubSubServiceList::where('sub_services_list_id', $service->sub_service_slug)->get();

        return view('admin.service.publish', compact('service', 'services', 'sub_services', 'sub_sub_services'));
    }

    public function saveFileToFolder($file, $path)
    {
        $filename = $file->getClientOriginalName();

        $directory = public_path($path);

        // Check if the directory exists, if not, create it
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        // Move the uploaded file to the specified directory
        $file->move($directory, $filename);

        // Store the filename in the validated data
        return '/storage/' . basename($path) . '/' . $filename;
    }


    public function delete($id)
    {
        Service::where('id', $id)->delete();
        ProfessionalService::where('service_id', $id)->delete();
        ServiceSolution::where('service_id', $id)->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully');
    }


    public function professionalServiceIndex($id)
    {
        $services = ProfessionalService::where('service_id', $id)->get();

        return view('admin.service.prof.index', compact('services', 'id'));
    }

    public function professionalServiceCreate($id)
    {
        return view('admin.service.prof.create', compact('id'));
    }

    public function professionalServiceStore(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Get the original filename
            $filename = $file->getClientOriginalName();

            // Move the uploaded file to the specified directory
            $file->move(public_path('storage/professional_service_images'), $filename);

            // Store the filename in the validated data
            $validatedData['image'] = $filename;
        }

        $profService = ProfessionalService::create([
            'service_id' => $request->id,
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],

        ]);


        return redirect()->route('admin.service.professional.index', $request->id)->with('success', 'Service created successfully');
    }



    public function professionalServiceDelete(Request $request, $id)
    {
        ProfessionalService::where('id', $id)->delete();
        return redirect()->route('admin.service.professional.index', $request->service_id)->with('success', 'Service created successfully');
    }


    public function serviceSolutionIndex($id)
    {
        $services = ServiceSolution::where('service_id', $id)->get();
        return view('admin.service.servicesolution.index', compact('services', 'id'));
    }

    public function serviceSolutionCreate($id)
    {
        return view('admin.service.servicesolution.create', compact('id'));
    }

    public function serviceSolutionStore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Get the original filename
            $filename = $file->getClientOriginalName();

            // Move the uploaded file to the specified directory
            $file->move(public_path('storage/professional_service_images'), $filename);

            // Store the filename in the validated data
            $validatedData['image'] = $filename;
        }

        $profService = ServiceSolution::create([
            'service_id' => $request->id,
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],

        ]);


        return redirect()->route('admin.service.servicesolution.index', $request->id)->with('success', 'Service created successfully');
    }

    public function serviceSolutionDelete(Request $request, $id)
    {
        ServiceSolution::where('id', $id)->delete();
        return redirect()->route('admin.service.servicesolution.index', $request->service_id)->with('success', 'Service created successfully');
    }

    public function getSubServices($serviceId)
    {
        $subservices = SubServiceList::where('services_list_id', $serviceId)->get();
        return response()->json($subservices);
    }

    public function getSubSubServices($subServiceId)
    {
        $subServiceId = SubServiceList::where('slug', $subServiceId)->first();
        $subsubservices = SubSubServiceList::where('sub_services_list_id', $subServiceId->id)->get();
        return response()->json($subsubservices);
    }

    public function update(Request $request, $id)
    {
          

        $validatedData = $request->validate([
            'service_slug' => 'nullable',
            'sub_service_slug' => 'nullable',
            'sub_sub_service_slug' => 'nullable',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'banner_title' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('services')->ignore($id)
            ],
            'banner_description' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'body_content' => 'required|string',

            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'code_snippet' => 'nullable|string',

            // Service
            'service_list_title' => 'nullable|string',
            'service_list_description' => 'nullable|string',
            'service_list_item_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'service_list_item_image_old.*' => 'nullable',
            'service_list_item_title.*' => 'nullable|string|max:255',
            'service_list_item_description.*' => 'nullable|string',
            'service_list_item_link.*' => 'nullable|string',

            // More Services
            'more_service_main_title' => 'nullable|string|max:255',
            'more_service_items' => 'nullable|array',
            'more_service_items.*' => 'nullable|string|max:255',
            'more_service_items_link'=>'nullable|array',
            'more_service_items_link.*' => 'nullable|string|max:255',


            // Process Flow
            'process_flow_title' => 'nullable|string',
            'process_flow_description' => 'nullable|string',
            'process_flow_item_logo.*' => 'nullable|string',
            'process_flow_item_title.*' => 'nullable|string',
            'process_flow_item_description.*' => 'nullable|string',

            // Industries We Serve
            'industry_main_title' => 'nullable|string',
            'industry_items' => 'nullable|array',
            'industry_items.*' => 'nullable|string|max:255',

            // Why Choose Us
            'why_choose_title' => 'nullable|string',
            'why_choose_description' => 'nullable|string',
            'why_choose_item_title.*' => 'nullable|string|max:255',
            'why_choose_item_description.*' => 'nullable|string',
            'why_choose_item_link.*' => 'nullable|string',

            // Article
            'article_main_title' => 'nullable|string',
            'article_item_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'article_item_description.*' => 'nullable|string',
            'article_item_link.*' => 'nullable|string',

            // Additional Services
            'additional_title' => 'nullable|string',
            'additional_services_item_title.*' => 'nullable|string|max:255',
            'additional_services_item_description.*' => 'nullable|string',
            'additional_services_item_link.*' => 'nullable|string',

            // Tech Images
            'tech_title' => 'nullable|string',
            'tech_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',

            // Client Success Stories
            'client_main_title' => 'nullable|string',
            'client_title_link' => 'nullable|string',
            'client_success_title.*' => 'nullable|string|max:255',
            'client_success_description.*' => 'nullable|string',
            'client_success_link.*' => 'nullable|string',

            // Client Testimonial
            'testimonial_main_title' => 'nullable|string',
            'testimonial_title_link' => 'nullable|string',
            'testimonial_title' => 'nullable|string',
            'testimonial_description' => 'nullable|string',
            'testimonial_author' => 'nullable|string',
            'testimonial_company' => 'nullable|string',
            'testimonial_link' => 'nullable|string',

            // Outsource
            'outsource_title' => 'nullable|string',
            'outsource_description' => 'nullable|string',
            'outsource_para' => 'nullable|string',
            'outsource_dynamic' => 'nullable|array',
            'outsource_dynamic.*' => 'nullable|string|max:255',

            // FAQ
            'faq_main_title' => 'nullable|string',
            'faq_title.*' => 'nullable|string',
            'faq_description.*' => 'nullable|string',
        ]);

        // dd("validation done");



        $pageLink = $this->getPageLinks($validatedData);

        // Fetch the service instance by ID
        $service = Service::findOrFail($id);

        // Our Services
        $serviceListJson = $service->service_list_contents; // Default to existing data
        if (isset($validatedData['service_list_item_image']) && count($validatedData['service_list_item_image']) > 0) {
            $serviceListItems = [];
            foreach ($validatedData['service_list_item_image'] as $index => $file) {
                $serviceTitle = $validatedData['service_list_item_title'][$index];
                $serviceDescription = $validatedData['service_list_item_description'][$index];
                $serviceLink = $validatedData['service_list_item_link'][$index];

                // Check if new file is uploaded or use the old file
                if (is_file($file)) {
                    $serviceListItem = [
                        'image' => $this->saveFileTofolder($file, 'storage/service_list_item_images'), // file, path
                        'title' => $serviceTitle,
                        'description' => $serviceDescription,
                        'link' => $serviceLink,
                    ];
                } else {
                    $serviceListItem = [
                        'image' => $validatedData['service_list_item_image_old'][$index],
                        'title' => $serviceTitle,
                        'description' => $serviceDescription,
                        'link' => $serviceLink,
                    ];
                }

                // Add the service item to the array
                $serviceListItems[] = $serviceListItem;
            }

            // Convert the array to JSON format
            $serviceListJson = json_encode($serviceListItems);
        }

        // Process Flow
        $processFlowJson = $service->process_flow_contents; // Default to existing data
        if (isset($validatedData['process_flow_item_logo']) && count($validatedData['process_flow_item_logo']) > 0) {
            $processFlowListItems = [];
            foreach ($validatedData['process_flow_item_logo'] as $index => $file) {
                $processFlowLogo = $validatedData['process_flow_item_logo'][$index];
                $processFlowTitle = $validatedData['process_flow_item_title'][$index];
                $processFlowDescription = $validatedData['process_flow_item_description'][$index];

                $processFlowListItem = [
                    'logo' => $processFlowLogo,
                    'title' => $processFlowTitle,
                    'description' => $processFlowDescription,
                ];

                // Add the process flow item to the array
                $processFlowListItems[] = $processFlowListItem;
            }

            // Convert the array to JSON format
            $processFlowJson = json_encode($processFlowListItems);
        }

        // Why Choose Us
        $whyChooseJson = $service->why_choose_contents; // Default to existing data
        if (isset($validatedData['why_choose_item_title']) && count($validatedData['why_choose_item_title']) > 0) {
            $whyChooseListItems = [];
            foreach ($validatedData['why_choose_item_title'] as $index => $file) {
                $whyChooseTitle = $validatedData['why_choose_item_title'][$index];
                $whyChooseDescription = $validatedData['why_choose_item_description'][$index];
                $whyChooseLink = $validatedData['why_choose_item_link'][$index];

                $whyChooseListItem = [
                    'title' => $whyChooseTitle,
                    'description' => $whyChooseDescription,
                    'link' => $whyChooseLink,
                ];

                // Add the why choose us item to the array
                $whyChooseListItems[] = $whyChooseListItem;
            }

            // Convert the array to JSON format
            $whyChooseJson = json_encode($whyChooseListItems);
        }

        // Article
        $articleJson = $service->article_contents; // Default to existing data
        if (isset($validatedData['article_item_image']) && count($validatedData['article_item_image']) > 0) {
            $articleListItems = [];
            foreach ($validatedData['article_item_image'] as $index => $file) {
                $articleDescription = $validatedData['article_item_description'][$index];
                $articleLink = $validatedData['article_item_link'][$index];

                $serviceListItem = [
                    'image' => $this->saveFileTofolder($file, 'storage/article_item_images'), // file, path
                    'description' => $articleDescription,
                    'link' => $articleLink,
                ];

                // Add the service item to the array
                $articleListItems[] = $serviceListItem;
            }

            // Convert the array to JSON format
            $articleJson = json_encode($articleListItems);
        }

        // Additional Services
        $additionalServicesJson = $service->additional_services_contents; // Default to existing data
        if (isset($validatedData['additional_services_item_title']) && count($validatedData['additional_services_item_title']) > 0) {
            $additionalServicesItems = [];
            foreach ($validatedData['additional_services_item_title'] as $index => $file) {
                $additionalServiceTitle = $validatedData['additional_services_item_title'][$index];
                $additionalServiceDescription = $validatedData['additional_services_item_description'][$index];
                $additionalServiceLink = $validatedData['additional_services_item_link'][$index];

                $additionalServicesItem = [
                    'title' => $additionalServiceTitle,
                    'description' => $additionalServiceDescription,
                    'link' => $additionalServiceLink,
                ];

                // Add the service item to the array
                $additionalServicesItems[] = $additionalServicesItem;
            }

            // Convert the array to JSON format
            $additionalServicesJson = json_encode($additionalServicesItems);
        }

        // Tech Images
        $techImages = $service->tech_images ? json_decode($service->tech_images, true) : []; // Default to existing data
        if ($request->hasFile('tech_images')) {
            foreach ($request->file('tech_images') as $file) {
                // Get the original filename
                $filename = $file->getClientOriginalName();

                // Move the uploaded file to the specified directory
                $file->move(public_path('storage/tech_images'), $filename);

                // Store the filename in the array
                $techImages[] = $filename;
            }

            // Store the array of filenames in the validated data
            $validatedData['tech_images'] = $techImages;
        }

        // Client Success Stories
        $clientJson = $service->client_success_stories; // Default to existing data
        if (isset($validatedData['client_success_title']) && count($validatedData['client_success_title']) > 0) {
            $clientListItems = [];
            foreach ($validatedData['client_success_title'] as $index => $file) {
                $clientTitle = $validatedData['client_success_title'][$index];
                $clientTitleLink = $validatedData['client_success_title_link'][$index] ?? null; // Provide default value if not set
                $clientDescription = $validatedData['client_success_description'][$index];
                $clientLink = $validatedData['client_success_link'][$index];

                $serviceListItem = [
                    'title' => $clientTitle,
                    'title_link' => $clientTitleLink,
                    'description' => $clientDescription,
                    'link' => $clientLink,
                ];

                // Add the service item to the array
                $clientListItems[] = $serviceListItem;
            }

            // Convert the array to JSON format
            $clientJson = json_encode($clientListItems);
        }

        // FAQ
        $faqJson = $service->faqs; // Default to existing data
        if (isset($validatedData['faq_title']) && count($validatedData['faq_title']) > 0) {
            $faqListItems = [];
            foreach ($validatedData['faq_title'] as $index => $file) {
                $faqTitle = $validatedData['faq_title'][$index];
                $faqDescription = $validatedData['faq_description'][$index];

                $serviceListItem = [
                    'title' => $faqTitle,
                    'description' => $faqDescription,
                ];

                // Add the service item to the array
                $faqListItems[] = $serviceListItem;
            }

            // Convert the array to JSON format
            $faqJson = json_encode($faqListItems);
        }

        // moreservice
        $moreserviceJson = $service->more_service_items; // Default to existing data
    
        if (isset($validatedData['more_service_items']) && count($validatedData['more_service_items']) > 0) {
            $moreserviceListItems = [];
            // dd($validatedData['more_service_items_link']);
            foreach ($validatedData['more_service_items'] as $index => $file) {
                $moreserviceTitle = $validatedData['more_service_items'][$index];
                $moreserviceLink = isset($validatedData['more_service_items_link'][$index]) ? $validatedData['more_service_items_link'][$index] : '';

                $serviceListItem = [
                    'title' => $moreserviceTitle,
                    'link' => $moreserviceLink,
                ];

                // Add the service item to the array
                $moreserviceListItems[] = $serviceListItem;
            }

            // Convert the array to JSON format
            $moreserviceJson = json_encode($moreserviceListItems);
        }

        $service->page_link = $pageLink;
        $service->service_slug = $validatedData['service_slug'];
        $service->sub_service_slug = $validatedData['sub_service_slug'];
        $service->sub_sub_service_slug = $validatedData['sub_sub_service_slug'];
        $service->slug = $validatedData['slug'] ?? $service->slug;
        $service->meta_title = $validatedData['meta_title'] ?? $service->meta_title;
        $service->meta_description = $validatedData['meta_description'] ?? $service->meta_description;
        $service->meta_keywords = $validatedData['meta_keywords'] ?? $service->meta_keywords;
        $service->banner_title = $validatedData['banner_title'] ?? $service->banner_title;
        $service->banner_description = $validatedData['banner_description'] ?? $service->banner_description;
        $service->body_content = $validatedData['body_content'] ?? $service->body_content;
        $service->code_snippet = $validatedData['code_snippet']  ?? $service->code_snippet;

        // Updating the service
        $service->service_list_title = $validatedData['service_list_title'] ?? $service->service_list_title;
        $service->service_list_description = $validatedData['service_list_description'] ?? $service->service_list_description;
        $service->service_list_contents = $serviceListJson;

        // Process Flow
        $service->process_flow_title = $validatedData['process_flow_title'] ?? $service->process_flow_title;
        $service->process_flow_description = $validatedData['process_flow_description'] ?? $service->process_flow_description;
        $service->process_flow_contents = $processFlowJson;

        // Why Choose Us
        $service->why_choose_title = $validatedData['why_choose_title'] ?? $service->why_choose_title;
        $service->why_choose_description = $validatedData['why_choose_description'] ?? $service->why_choose_description;
        $service->why_choose_contents = $whyChooseJson;

        // Updating the service
        $service->article_main_title = $validatedData['article_main_title'] ?? $service->article_main_title;
        $service->article_contents = $articleJson;

        // Additional Services
        $service->additional_title = $validatedData['additional_title'] ?? $service->additional_title;
        $service->additional_services_contents = $additionalServicesJson;

        // Tech Images
        $service->tech_title = $validatedData['tech_title'] ?? $service->tech_title;
        $service->tech_images = isset($validatedData['tech_images']) ? json_encode($validatedData['tech_images']) : $service->tech_images;

        // Updating the service
        $service->client_main_title = $validatedData['client_main_title'] ?? $service->client_main_title;
        $service->client_title_link = $validatedData['client_title_link'] ?? $service->client_title_link;
        $service->client_success_stories = $clientJson;

        // FAQ
        $service->faq_main_title = $validatedData['faq_main_title'] ?? $service->faq_main_title;
        $service->faqs = $faqJson;

        // More Services
        $service->more_service_main_title = $validatedData['more_service_main_title'] ?? $service->more_service_main_title;
        $service->more_service_items = $moreserviceJson;

        // Industries We Serve
        $service->industry_main_title = $validatedData['industry_main_title'] ?? $service->industry_main_title;
        $service->industry_items = isset($validatedData['industry_items']) ? json_encode($validatedData['industry_items']) : $service->industry_items;

        // Client Testimonial
        $service->testimonial_main_title = $validatedData['testimonial_main_title'] ?? $service->testimonial_main_title;
        $service->testimonial_title_link = $validatedData['testimonial_title_link'] ?? $service->testimonial_title_link;
        $service->testimonial_title = $validatedData['testimonial_title'] ?? $service->testimonial_title;
        $service->testimonial_description = $validatedData['testimonial_description'] ?? $service->testimonial_description;
        $service->testimonial_author = $validatedData['testimonial_author'] ?? $service->testimonial_author;
        $service->testimonial_link = $validatedData['testimonial_link'] ?? $service->testimonial_link;

        // Out Source
        $service->outsource_title = $validatedData['outsource_title'] ?? $service->outsource_title;
        $service->outsource_description = $validatedData['outsource_description'] ?? $service->outsource_description;
        $service->outsource_para = $validatedData['outsource_para'] ?? $service->outsource_para;
        $service->outsource_dynamic = isset($validatedData['outsource_dynamic']) ? json_encode($validatedData['outsource_dynamic']) : $service->outsource_dynamic;

        // Update status and published fields
        $service->status = $validatedData['status'] ?? $service->status;
        $service->published = $validatedData['published'] ?? $service->published;


        // Handle banner image
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerImageName = $bannerImage->getClientOriginalName();
            $bannerImage->move(public_path('storage/banner_images'), $bannerImageName);
            $bannerImage = $bannerImageName;
        } else {
            $bannerImage = $service->banner_image;
        }

        $service->banner_image = $bannerImage;

        // Handle feature image
        if ($request->hasFile('feature_image')) {
            $featureImage = $request->file('feature_image');
            $featureImageName = $featureImage->getClientOriginalName();
            $featureImage->move(public_path('storage/feature_images'), $featureImageName);
            $featureImage = $featureImageName;
        } else {
            $featureImage = $service->feature_image;
        }

        $service->feature_image = $featureImage;

        $service->save();

        $action = $request->input('action');
       
        if ($action == 'save') {
            return redirect()->route('admin.service.index')->with('success', 'Service updated successfully');
        } else if ($action == 'close') {
            return redirect()->route('admin.service.index');
        } else {
            return redirect()->route('admin.service.publish', ['id' => $id]);
        }
    }

    protected function getPageLinks($validatedData)
    {
        $pageLink = '';

        if (isset($validatedData['slug']) && !empty($validatedData['slug'])) {
            // Check and append the service_slug if it's set and not empty
            if (isset($validatedData['service_slug']) && !empty($validatedData['service_slug'])) {
                $service = ServiceList::find($validatedData['service_slug']);
                if ($service) { // Ensure the service exists
                    $pageLink .= '/' . $service->slug;
                }
            }

            // Check and append the sub_service_slug if it's set and not empty
            if (isset($validatedData['sub_service_slug']) && !empty($validatedData['sub_service_slug'])) {
                $pageLink .= '/' . $validatedData['sub_service_slug'];
            }

            // Check and append the sub_sub_service_slug if it's set and not empty
            if (isset($validatedData['sub_sub_service_slug']) && !empty($validatedData['sub_sub_service_slug'])) {
                $pageLink .= '/' . $validatedData['sub_sub_service_slug'];
            }

            $pageLink .= '/' . $validatedData['slug'];
        }

        return $pageLink;
    }


    public function deleteTechImage(Service $service, $image)
    {
        // Decode the tech images array
        $techImages = json_decode($service->tech_images, true);

        // Find the image in the array and remove it
        if (($key = array_search($image, $techImages)) !== false) {
            unset($techImages[$key]);

            // Delete the image file from the storage
            Storage::delete('public/tech_images/' . $image);

            // Update the service with the new array of images
            $service->tech_images = json_encode(array_values($techImages));
            $service->save();
        }

        return response()->json(['success' => true]);
    }
}
