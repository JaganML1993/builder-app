<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCreateReq;
use App\Models\Article;
use App\Models\CaseStudy;
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

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query();


        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->filled('service_id')) {
            $query->where('service_slug', $request->service_id);
        }
        $articles = $query->with('serviceList')->latest()->get();

        $allServices = ServiceList::all();

        return view('admin.article.index', compact('articles', 'allServices'));
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
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
            'slug' => ['required', 'string', 'max:255', new UniqueSlug()],
            'banner_image' => $required . '|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'body_content' => $required . '|string',
            'faq_title.*' => 'nullable|string',
            'faq_description.*' => 'nullable|string',
            'digital_para' => 'nullable|string',
            'reimage_para' => 'nullable|string',
            'faq_main_title' => 'nullable|string',

            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'code_snippet' => 'nullable|string',
            // Reimage
            'reimage_title' => 'nullable|string',
            'reimage_desc' => 'nullable|string',
            'reimage_item_title.*' => 'nullable|string|max:255',
            'reimage_item_description.*' => 'nullable|string',

            // Registration
            'regis_title' => 'nullable|string',
            'regis_desc' => 'nullable|string',
            'regis_item_title.*' => 'nullable|string|max:255',
            'regis_item_desc.*' => 'nullable|string',

            // Digital
            'digital_title' => 'nullable|string',
            'digital_desc' => 'nullable|string',
            'digital_item_title.*' => 'nullable|string|max:255',
            'digital_item_desc.*' => 'nullable|string',

        ]);


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

        $faqJson = null;
        if (count($validatedData['faq_title']) > 0) {
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

        // Process Reimage Section
        $reimageJson = null;
        if (isset($validatedData['reimage_item_title']) && count($validatedData['reimage_item_title']) > 0) {
            $reimageListItems = [];
            foreach ($validatedData['reimage_item_title'] as $index => $file) {
                $reimageTitle = $validatedData['reimage_item_title'][$index];
                $reimageDescription = $validatedData['reimage_item_description'][$index];

                $reimageListItem = [
                    'title' => $reimageTitle,
                    'description' => $reimageDescription
                ];

                $reimageListItems[] = $reimageListItem;
            }
            $reimageJson = json_encode($reimageListItems);
        }

        // Process Registration Section
        $registrationJson = null;
        if (isset($validatedData['regis_item_title']) && count($validatedData['regis_item_title']) > 0) {
            $registrationListItems = [];
            foreach ($validatedData['regis_item_title'] as $index => $file) {
                $registrationTitle = $validatedData['regis_item_title'][$index];
                $registrationDescription = $validatedData['regis_item_desc'][$index];

                $registrationListItem = [
                    'title' => $registrationTitle,
                    'description' => $registrationDescription
                ];

                $registrationListItems[] = $registrationListItem;
            }
            $registrationJson = json_encode($registrationListItems);
        }


        // Process Digital Section
        $digitalJson = null;
        if (isset($validatedData['digital_item_title']) && count($validatedData['digital_item_title']) > 0) {
            $digitalListItems = [];
            foreach ($validatedData['digital_item_title'] as $index => $file) {
                $digitalTitle = $validatedData['digital_item_title'][$index];
                $digitalDescription = $validatedData['digital_item_desc'][$index];

                $digitalListItem = [
                    'title' => $digitalTitle,
                    'description' => $digitalDescription
                ];

                $digitalListItems[] = $digitalListItem;
            }
            $digitalJson = json_encode($digitalListItems);
        }


        $pageLink = $this->getPageLinks($validatedData);

        // Create a new service instance
        $service = new Article();
        $service->page_link = $pageLink ?? null;
        $service->meta_title = $validatedData['meta_title'];
        $service->service_slug = $validatedData['service_slug'] ?? '';
        $service->sub_service_slug = $validatedData['sub_service_slug'] ?? '';
        $service->sub_sub_service_slug = $validatedData['sub_sub_service_slug'] ?? '';
        $service->meta_description = $validatedData['meta_description'];
        $service->meta_keywords = $validatedData['meta_keywords'] ?? null;
        $service->banner_title = $validatedData['banner_title'];
        $service->banner_image = isset($validatedData['banner_image']) ? $validatedData['banner_image'] : null;
        $service->body_content = $validatedData['body_content'];
        $service->feature_image = isset($validatedData['feature_image']) ? $validatedData['feature_image'] : null;
        $service->slug = $validatedData['slug'];
        $service->faqs = $faqJson;
        $service->code_snippet = $validatedData['code_snippet']  ?? null;
        $service->status = 1;
        
        
        if ($action == 'publish') {
            $published = 1;
        } else if ($action == 'draft') {
            $published = 2;
        } else {
            $published = 0;
        }

        $service->published = $published;

        $service->digital_para = $validatedData['digital_para'] ?? null;
        $service->reimage_para = $validatedData['reimage_para'] ?? null;
        $service->faq_main_title = $validatedData['faq_main_title'] ?? null;
        $service->reimage_title = $validatedData['reimage_title'] ?? null;
        $service->reimage_desc = $validatedData['reimage_desc'] ?? null;
        $service->reimage_items = $reimageJson;
        $service->regis_title = $validatedData['regis_title'] ?? null;
        $service->regis_desc = $validatedData['regis_desc'] ?? null;
        $service->regis_items = $registrationJson;
        $service->digital_title = $validatedData['digital_title'] ?? null;
        $service->digital_desc = $validatedData['digital_desc'] ?? null;
        $service->digital_items = $digitalJson;

        $service->save();

        $id = $service->id;

        switch ($action) {
            case 'publish':
                // Handle publish action
                return redirect()->route('admin.article.publish', ['id' => $id])
                    ->with('success', 'Article published successfully');
                break;
            case 'draft':
                // Redirect to a success page or return a response
                return redirect()->route('admin.article.index')->with('success', 'Article Draft Created Successfully');
                break;
            case 'save':
                // Redirect to a success page or return a response
                return redirect()->route('admin.article.index')->with('success', 'Article Page Created Successfully');
                break;
        }
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        //    dd($article );
        $services = ServiceList::all();
        $subServices = SubServiceList::get();
        $subSubServices = SubSubServiceList::get();

        return view('admin.article.edit', compact('article', 'services', 'subServices', 'subSubServices'));
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

    public function update(Request $request, $id)
    {
        // Validate the request data
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
                Rule::unique('articles')->ignore($id)
            ],
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'body_content' => 'required|string',
            'faq_title.*' => 'nullable|string',
            'faq_description.*' => 'nullable|string',

            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'code_snippet' => 'nullable|string',


            'reimage_para' => 'nullable|string',
            'digital_para' => 'nullable|string',
            'faq_main_title' => 'nullable|string',
            // Reimage
            'reimage_title' => 'nullable|string',
            'reimage_desc' => 'nullable|string',
            'reimage_item_title.*' => 'nullable|string|max:255',
            'reimage_item_description.*' => 'nullable|string',

            // Registration
            'regis_title' => 'nullable|string',
            'regis_desc' => 'nullable|string',
            'regis_item_title.*' => 'nullable|string|max:255',
            'regis_item_desc.*' => 'nullable|string',

            // Digital
            'digital_title' => 'nullable|string',
            'digital_desc' => 'nullable|string',
            'digital_item_title.*' => 'nullable|string|max:255',
            'digital_item_desc.*' => 'nullable|string',

        ]);

        // Find the existing article
        $article = Article::findOrFail($id);

        // Generate slug from meta title
        $slug = Str::slug($validatedData['slug']);

        // Add the slug to the validated data
        $validatedData['slug'] = $slug;

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');

            // Use the saveFileToFolder method to save the file and get the filename
            $filename = $this->saveFileToFolder($file, 'storage/banner_images');

            // Store the filename in the validated data
            $validatedData['banner_image'] = $filename;
        }

        if ($request->hasFile('feature_image')) {
            $file = $request->file('feature_image');

            // Use the saveFileToFolder method to save the file and get the filename
            $filename = $this->saveFileToFolder($file, 'storage/feature_images');

            // Store the filename in the validated data
            $validatedData['feature_image'] = $filename;
        }

        $faqJson = null;
        // if (count($validatedData['faq_title']) > 0) {
        //     $faqListItems = [];
        //     foreach ($validatedData['faq_title'] as $index => $title) {
        //         $faqDescription = $validatedData['faq_description'][$index];

        //         $faqListItems[] = [
        //             'title' => $title,
        //             'description' => $faqDescription,
        //         ];
        //     }
        //     // Convert the array to JSON format
        //     $faqJson = json_encode($faqListItems);
        // }

        // Reimage
        $reimageJson = $article->reimage_items; // Default to existing data
        if (isset($validatedData['reimage_item_title']) && count($validatedData['reimage_item_title']) > 0) {
            $reimageListItems = [];
            foreach ($validatedData['reimage_item_title'] as $index => $file) {
                $reimageTitle = $validatedData['reimage_item_title'][$index];
                $reimageDescription = $validatedData['reimage_item_description'][$index];

                $reimageListItem = [
                    'title' => $reimageTitle,
                    'description' => $reimageDescription,
                ];

                // Add the reimage item to the array
                $reimageListItems[] = $reimageListItem;
            }

            // Convert the array to JSON format
            $reimageJson = json_encode($reimageListItems);
        }
        // Registration
        $registrationJson = $article->regis_items; // Default to existing data
        if (isset($validatedData['regis_item_title']) && count($validatedData['regis_item_title']) > 0) {
            $registrationListItems = [];
            foreach ($validatedData['regis_item_title'] as $index => $file) {
                $registrationTitle = $validatedData['regis_item_title'][$index];
                $registrationDescription = $validatedData['regis_item_desc'][$index];

                $registrationListItem = [
                    'title' => $registrationTitle,
                    'description' => $registrationDescription,
                ];

                // Add the registration item to the array
                $registrationListItems[] = $registrationListItem;
            }

            // Convert the array to JSON format
            $registrationJson = json_encode($registrationListItems);
        }

        // Digital
        $digitalJson = $article->digital_items; // Default to existing data
        if (isset($validatedData['digital_item_title']) && count($validatedData['digital_item_title']) > 0) {
            $digitalListItems = [];
            foreach ($validatedData['digital_item_title'] as $index => $file) {
                $digitalTitle = $validatedData['digital_item_title'][$index];
                $digitalDescription = $validatedData['digital_item_desc'][$index];

                $digitalListItem = [
                    'title' => $digitalTitle,
                    'description' => $digitalDescription,
                ];

                // Add the digital item to the array
                $digitalListItems[] = $digitalListItem;
            }

            // Convert the array to JSON format
            $digitalJson = json_encode($digitalListItems);
        }

        // FAQ
        $faqJson = $article->faqs; // Default to existing data
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


        $pageLink = $this->getPageLinks($validatedData);

        $article->page_link = $pageLink;
        // Update the article instance
        $article->meta_title = $validatedData['meta_title'];
        $article->service_slug = $validatedData['service_slug'] ?? $article->service_slug;
        $article->sub_service_slug = $validatedData['sub_service_slug'] ?? $article->sub_service_slug;
        $article->sub_sub_service_slug = $validatedData['sub_sub_service_slug'] ?? $article->sub_sub_service_slug;
        $article->meta_description = $validatedData['meta_description'];
        $article->meta_keywords = $validatedData['meta_keywords'] ?? null;
        $article->banner_title = $validatedData['banner_title'];

        if (isset($validatedData['banner_image'])) {
            $article->banner_image = $validatedData['banner_image'];
        }
        if (isset($validatedData['feature_image'])) {
            $article->feature_image = $validatedData['feature_image'];
        }

        $article->body_content = $validatedData['body_content'];
        $article->slug = $validatedData['slug'];
        $article->faqs = $faqJson ?? null;
        $article->status = 1;
        $article->published = 1;

        $article->digital_para = $validatedData['digital_para'] ?? $article->digital_para;;
        $article->reimage_para = $validatedData['reimage_para'] ?? $article->reimage_para;;
        $article->faq_main_title = $validatedData['faq_main_title'] ?? $article->faq_main_title;;
        $article->code_snippet = $validatedData['code_snippet']  ?? $article->code_snippet;

        $article->reimage_title = $validatedData['reimage_title'] ?? $article->reimage_title;
        $article->reimage_desc = $validatedData['reimage_desc'] ?? $article->reimage_desc;
        $article->reimage_items = $reimageJson;
        $article->regis_title = $validatedData['regis_title'] ?? $article->regis_title;
        $article->regis_desc = $validatedData['regis_desc'] ?? $article->regis_desc;
        $article->regis_items = $registrationJson;
        $article->digital_title = $validatedData['digital_title'] ?? $article->digital_title;
        $article->digital_desc = $validatedData['digital_desc'] ?? $article->digital_desc;
        $article->digital_items = $digitalJson;
        $article->faqs = $faqJson;

        $pageLink = $this->getPageLinks($validatedData);
        $article->page_link = $pageLink;

        $article->save();

        $action = $request->input('action');

        if ($action == 'save') {
            return redirect()->route('admin.article.index')->with('success', 'Article Page Updated Successfully');
        } else if ($action == 'close') {
            return redirect()->route('admin.article.index');
        } else {
            return redirect()->route('admin.article.publish', ['id' => $id]);
        }
    }

    public function delete($id)
    {
        Article::where('id', $id)->delete();
        return redirect()->route('admin.article.index')->with('success', 'Article deleted successfully');
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
        $subsubservices = SubSubServiceList::where('sub_services_list_id', $subServiceId)->get();
        return response()->json($subsubservices);
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

    public function publish($id)
    {
        $article = Article::findOrFail($id);
        
        Article::where('id', $id)->update(['published' => 1]);

        $services = ServiceList::all();
        $subServices = SubServiceList::get();
        $subSubServices = SubSubServiceList::get();

        return view('admin.article.publish', compact('article', 'services', 'subServices', 'subSubServices'));
    }
}
