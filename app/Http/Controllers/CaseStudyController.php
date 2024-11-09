<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\ServiceList;
use App\Models\SubServiceList;
use App\Models\SubSubServiceList;
use App\Rules\UniqueSlug;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CaseStudyController extends Controller
{
    public function index(Request $request)
    {
        $query = CaseStudy::query();

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->filled('service_id')) {
            $query->where('service_slug', $request->service_id);
        }

        $studies = $query->with('serviceList')->latest()->get();
        $allServices = ServiceList::all();

        return view('admin.case-study.index', compact('studies', 'allServices'));
    }

    public function create()
    {
        return view('admin.case-study.create');
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
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // 'body_content' => 'required|string'
            'code_snippet' => 'nullable|string',
            'client_title' => 'nullable',
            'client_description' => 'nullable',
            'client_req_title' => 'nullable',
            'client_req_desc' => 'nullable',
            'business_title' => 'nullable',
            'business_desc' => 'nullable',
            'business_items' => 'nullable|array',
            'business_items.*' => 'nullable',
            'our_solution_title' => 'nullable',
            'our_solution_desc' => 'nullable',
            'the_results_title' => 'nullable',
            'the_results_desc' => 'nullable',
            'out_source_title' => 'nullable',
            'out_source_desc' => 'nullable',

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

        $pageLink = $this->getPageLinks($validatedData);
        // Create a new service instance
        $service = new CaseStudy();
        $service->page_link = $pageLink ?? null;
        $service->meta_title = $validatedData['meta_title'];
        $service->service_slug = $validatedData['service_slug'] ?? '';
        $service->sub_service_slug = $validatedData['sub_service_slug'] ?? '';
        $service->sub_sub_service_slug = $validatedData['sub_sub_service_slug'] ?? '';
        $service->meta_description = $validatedData['meta_description'];
        $service->meta_keywords = $validatedData['meta_keywords'] ?? null;
        $service->banner_title = $validatedData['banner_title'];
        $service->banner_image = isset($validatedData['banner_image']) ? $validatedData['banner_image'] : null;
        $service->feature_image = isset($validatedData['feature_image']) ? $validatedData['feature_image'] : null;
        // $service->body_content = $validatedData['body_content'];       
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

        $service->client_title = $validatedData['client_title'] ?? null;
        $service->client_description = $validatedData['client_description'] ?? null;
        $service->client_req_title = $validatedData['client_req_title'] ?? null;
        $service->client_req_desc = $validatedData['client_req_desc'] ?? null;
        $service->business_title = $validatedData['business_title'] ?? null;
        $service->business_desc = $validatedData['business_desc'] ?? null;
        $service->business_items = isset($validatedData['business_items']) ? json_encode($validatedData['business_items']) : null;
        $service->our_solution_title = $validatedData['our_solution_title'] ?? null;
        $service->our_solution_desc = $validatedData['our_solution_desc'] ?? null;
        $service->the_results_title = $validatedData['the_results_title'] ?? null;
        $service->the_results_desc = $validatedData['the_results_desc'] ?? null;
        $service->out_source_title = $validatedData['out_source_title'] ?? null;
        $service->out_source_desc = $validatedData['out_source_desc'] ?? null;
        $service->code_snippet = $validatedData['code_snippet']  ?? null;
        $service->save();

        $id = $service->id;

        switch ($action) {
            case 'publish':
                // Handle publish action
                return redirect()->route('admin.case-study.publish', ['id' => $id])
                    ->with('success', 'Case Study published successfully');
                break;
            case 'draft':
                return redirect()->route('admin.case-study.index')->with('success', 'Case Study Draft Created Successfully');
                break;
            case 'save':
                // Redirect to a success page or return a response
                return redirect()->route('admin.case-study.index')->with('success', 'Case Study Page Created Successfully');
                break;
        }
    }

    public function edit($id)
    {
        $caseStudy = CaseStudy::findOrFail($id);
        $services = ServiceList::all();
        $subServices = SubServiceList::get();
        $subSubServices = SubSubServiceList::get();
        return view('admin.case-study.edit', compact('caseStudy', 'services', 'subServices', 'subSubServices'));
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
        // Fetch the existing case study
        $caseStudy = CaseStudy::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'service_slug' => 'nullable',
            'sub_service_slug' => 'nullable',
            'sub_sub_service_slug' => 'nullable',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'banner_title' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', Rule::unique('case_studies')->ignore($caseStudy->id)],
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // 'body_content' => 'required|string',

            'client_title' => 'nullable',
            'client_description' => 'nullable',
            'client_req_title' => 'nullable',
            'client_req_desc' => 'nullable',
            'business_title' => 'nullable',
            'business_desc' => 'nullable',
            'business_items' => 'nullable|array',
            'business_items.*' => 'nullable',
            'our_solution_title' => 'nullable',
            'our_solution_desc' => 'nullable',
            'the_results_title' => 'nullable',
            'the_results_desc' => 'nullable',
            'out_source_title' => 'nullable',
            'out_source_desc' => 'nullable',
            'code_snippet' => 'nullable|string'
        ]);


        // Generate slug from meta title
        $slug = Str::slug($validatedData['slug']);

        // Add the slug to the validated data
        $validatedData['slug'] = $slug;

        // Handle file upload if a new file is provided
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');

            // Get the original filename
            $filename = $file->getClientOriginalName();

            // Move the uploaded file to the specified directory
            $file->move(public_path('storage/banner_images'), $filename);

            // Store the filename in the validated data
            $validatedData['banner_image'] = $filename;

            // If there's an old image, you might want to delete it
            if ($caseStudy->banner_image) {
                $oldImagePath = public_path('storage/banner_images/' . $caseStudy->banner_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update the case study with the new image name
            $caseStudy->banner_image = $filename;
        }

         // Handle file upload if a new file is provided
         if ($request->hasFile('feature_image')) {
            $file = $request->file('feature_image');

            // Get the original filename
            $filename = $file->getClientOriginalName();

            // Move the uploaded file to the specified directory
            $file->move(public_path('storage/feature_images'), $filename);

            // Store the filename in the validated data
            $validatedData['feature_image'] = $filename;

            // If there's an old image, you might want to delete it
            if ($caseStudy->feature_image) {
                $oldImagePath = public_path('storage/feature_images/' . $caseStudy->feature_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update the case study with the new image name
            $caseStudy->feature_image = $filename;
        }

        $pageLink = $this->getPageLinks($validatedData);
        
        // Update the case study with the validated data
        $caseStudy->update([
            'meta_title' => $validatedData['meta_title'],
            'service_slug' => $validatedData['service_slug'] ?? $caseStudy->service_slug,
            'sub_service_slug' => $validatedData['sub_service_slug'] ?? $caseStudy->sub_service_slug,
            'sub_sub_service_slug' => $validatedData['sub_sub_service_slug'] ?? $caseStudy->sub_sub_service_slug,
            'meta_description' => $validatedData['meta_description'],
            'meta_keywords' => $validatedData['meta_keywords'] ?? null,
            'banner_title' => $validatedData['banner_title'],
            'page_link' => $pageLink,
            'slug' => $validatedData['slug'],

            'client_title' => $validatedData['client_title'] ?? $caseStudy->client_title,
            'client_description' => $validatedData['client_description'] ?? $caseStudy->client_description,
            'client_req_title' => $validatedData['client_req_title'] ?? $caseStudy->client_req_title,
            'client_req_desc' => $validatedData['client_req_desc'] ?? $caseStudy->client_req_desc,
            'business_title' => $validatedData['business_title'] ?? $caseStudy->business_title,
            'business_desc' => $validatedData['business_desc'] ?? $caseStudy->business_desc,
            'business_items' => isset($validatedData['business_items']) ? json_encode($validatedData['business_items']) : $caseStudy->business_items,
            'our_solution_title' => $validatedData['our_solution_title'] ?? $caseStudy->our_solution_title,
            'our_solution_desc' => $validatedData['our_solution_desc'] ?? $caseStudy->our_solution_desc,
            'the_results_title' => $validatedData['the_results_title'] ?? $caseStudy->the_results_title,
            'the_results_desc' => $validatedData['the_results_desc'] ?? $caseStudy->the_results_desc,
            'out_source_title' => $validatedData['out_source_title'] ?? $caseStudy->out_source_title,
            'out_source_desc' => $validatedData['out_source_desc'] ?? $caseStudy->out_source_desc,
            'code_snippet' => $validatedData['code_snippet'] ?? $caseStudy->code_snippet,
            
        ]);

        $action = $request->input('action');

        if ($action == 'save') {
            return redirect()->route('admin.case-study.index')->with('success', 'Case Study Page Updated Successfully');
        } else if ($action == 'close') {
            return redirect()->route('admin.case-study.index');
        } else {
            return redirect()->route('admin.case-study.publish', ['id' => $id]);
        }

    }


    public function delete($id)
    {
        CaseStudy::where('id', $id)->delete();
        return redirect()->route('admin.case-study.index')->with('success', 'Case Study Page Deleted Successfully');
    }

    public function publish($id)
    {
        $caseStudy = CaseStudy::findOrFail($id);
        CaseStudy::where('id', $id)->update(['published' => 1]);
        $services = ServiceList::all();
        $subServices = SubServiceList::get();
        $subSubServices = SubSubServiceList::get();

        return view('admin.case-study.publish', compact('caseStudy', 'services', 'subServices', 'subSubServices'));
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
}
