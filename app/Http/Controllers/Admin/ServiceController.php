<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    // get all services
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.service.index', compact('services'));
    }

    // create new service
    public function create()
    {
        return view('admin.service.form');
    }
    
    // edit service
    public function edit(Service $service)
    {
        return view('admin.service.form', compact('service'));
    }

    // update or create service
    public function update_create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $service = Service::find($request->id);

        if ($request->hasFile('service_logo')) {
            $logo = $request->file('service_logo');
            $logo = $logo->store('services');
            $request->merge(['logo' => $logo]);
        } else {
            $logo_name = $service->logo;
        }

        if ($request->id) {
            $service->update($request->all());
        } else {
            Service::create($request->all());
        }

        return redirect()->route('admin.service.index');
    }

    // delete service
    public function delete(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index');
    }
}
