<?php

namespace App\Http\Controllers;

use App\Models\ServiceList;
use App\Models\SubServiceList;
use App\Models\SubSubServiceList;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceListController extends Controller
{
    public function index()
    {
        $services = ServiceList::get() ?? [];

        return view('admin.serviceList.index', compact('services'));
    }

    public function create()
    {
        return view('admin.serviceList.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255|unique:services_list,name',
            'status' => 'required|integer|in:0,1',
        ]);

        $insertData = array(
            'name' => $validatedData['name'],
            'status' => $validatedData['status'],
            'slug' => Str::slug($validatedData['name'])
        );

        ServiceList::create($insertData);

        return redirect()->route('admin.service-list.index')->with('success', 'Service list has been created successfully');
    }

    public function edit($id)
    {
        $serviceDetail = ServiceList::find($id);

        return view('admin.serviceList.edit', compact('serviceDetail'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('services_list', 'name')->ignore($request->id),
            ],
            'status' => 'required|integer|in:0,1',
        ]);

        ServiceList::where('id', $validatedData['id'])->update(['name' => $validatedData['name'], 'status' => $validatedData['status']]);

        return redirect()->route('admin.service-list.index')->with('success', 'Service list has been updated successfully');
    }

    public function delete($id)
    {
        ServiceList::where('id', $id)->delete();

        return redirect()->route('admin.service-list.index')->with('success', 'Service list has been deleted successfully');
    }

    public function indexSub()
    {
        $services = SubServiceList::with('service')->get() ?? [];
        return view('admin.subServiceList.index', compact('services'));
    }

    public function createSub(Request $request)
    {
        $services = ServiceList::get() ?? [];
        return view('admin.subServiceList.create', compact('services'));
    }

    public function storeSub(Request $request)
    {
        $validatedData = $request->validate([
            'services_list_id' => 'required|integer',
            'name' => 'required|string|min:3|max:255|unique:sub_services_list,name',
            'status' => 'required|integer|in:0,1',
        ]);

        $insertData = array(
            'services_list_id' => $validatedData['services_list_id'],
            'name' => $validatedData['name'],
            'status' => $validatedData['status'],
            'slug' => Str::slug($validatedData['name'])
        );

        SubServiceList::create($insertData);

        return redirect()->route('admin.sub-service-list.index')->with('success', 'Sub service list has been created successfully');
    }

    public function editSub($id)
    {
        $services = ServiceList::get() ?? [];
        $serviceDetail = SubServiceList::with('service')->where('id', $id)->first();

        return view('admin.subServiceList.edit', compact('serviceDetail', 'services'));
    }

    public function updateSub(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('sub_services_list', 'name')->ignore($request->id),
            ],
            'status' => 'required|integer|in:0,1',
            'id' => 'required|integer',
            'services_list_id' => 'required|integer',
        ]);

        SubServiceList::where('id', $validatedData['id'])->update(['name' => $validatedData['name'], 'services_list_id' => $validatedData['services_list_id'], 'status' => $validatedData['status']]);

        return redirect()->route('admin.sub-service-list.index')->with('success', 'Sub service list has been updated successfully');
    }

    public function deleteSub($id)
    {
        SubServiceList::where('id', $id)->delete();

        return redirect()->route('admin.sub-service-list.index')->with('success', 'Sub service list has been deleted successfully');
    }

    public function indexSubSub()
    {
        $services = SubSubServiceList::with('subService','service')->get() ?? [];
        return view('admin.subSubServiceList.index', compact('services'));
    }

    public function createSubSub(Request $request)
    {
        $services = ServiceList::get() ?? [];
        $subServices = SubServiceList::get() ?? [];

        return view('admin.subSubServiceList.create', compact('services', 'subServices'));
    }

    public function storeSubSub(Request $request)
    {
        $validatedData = $request->validate([
            'services_list_id' => 'required|integer',
            'sub_services_list_id' => 'required|integer',
            'name' => 'required|string|min:3|max:255|unique:sub_sub_services_list,name',
            'status' => 'required|integer|in:0,1',
        ]);

        $insertData = array(
            'services_list_id' => $validatedData['services_list_id'],
            'sub_services_list_id' => $validatedData['sub_services_list_id'],
            'name' => $validatedData['name'],
            'status' => $validatedData['status'],
            'slug' => Str::slug($validatedData['name'])
        );

        SubSubServiceList::create($insertData);

        return redirect()->route('admin.sub-sub-service-list.index')->with('success', 'Sub service list has been created successfully');
    }

    public function editSubSub($id)
    {
        $services = ServiceList::get() ?? [];
        $subServices = SubServiceList::get() ?? [];
        $subSubServices = SubSubServiceList::with('subService.service')->find($id) ?? [];

        return view('admin.subSubServiceList.edit', compact('services', 'subServices', 'subSubServices'));
    }

    public function updateSubSub(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('sub_sub_services_list', 'name')->ignore($request->id),
            ],
            'status' => 'required|integer|in:0,1',
            'id' => 'required|integer',
            'services_list_id' => 'required|integer',
            'sub_services_list_id' => 'required|integer',
        ]);

        SubSubServiceList::where('id', $validatedData['id'])->update(
            [
                'name' => $validatedData['name'], 
                'services_list_id' => $validatedData['services_list_id'], 
                'sub_services_list_id' => $validatedData['sub_services_list_id'], 
                'status' => $validatedData['status']
            ]);

        return redirect()->route('admin.sub-sub-service-list.index')->with('success', 'Sub sub service list has been updated successfully');
    }

    public function deleteSubSub($id)
    {
        SubSubServiceList::where('id', $id)->delete();

        return redirect()->route('admin.sub-sub-service-list.index')->with('success', 'Sub Sub service list has been deleted successfully');
    }
}
