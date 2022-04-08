<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    // get all works
    public function index()
    {
        $works = Work::paginate(10);
        return view('admin.work.index', compact('works'));
    }

    // create new work
    public function create()
    {
        return view('admin.work.form');
    }

    // edit work
    public function edit(Work $work)
    {
        return view('admin.work.form', compact('work'));
    }

    // update or create work
    public function update_create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('work_photo')) {
             $request->merge(['photo' => $request->file('work_photo')->store('works')]);
        }

        if ($request->has('id')) {
            $work = Work::find($request->id);
            $work->update($request->all());
        } else {
            Work::create($request->all());
        }

        return redirect()->route('admin.work.index');
    }

    // delete work
    public function delete(Work $work)
    {
        $work->delete();
        return redirect()->route('admin.work.index');
    }
}
