<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // get all teams
    public function index()
    {
        $teams = Team::paginate(10);
        return view('admin.team.index', compact('teams'));
    }

    // create new team
    public function create()
    {
        return view('admin.team.form');
    }

    // edit team
    public function edit(Team $team)
    {
        return view('admin.team.form', compact('team'));
    }

    // update or create team
    public function update_create(Request $request, Team $team = null)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'photo' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('team_photo')) {
            $photo = $request->file('team_photo');
            $photo = $photo->store('teams');
            $request->merge(['photo' => $photo]);
        } else {
            $photo_name = $team->photo;
        }

        if ($team) {
            $team->update($request->all());
        } else {
            Team::create($request->all());
        }

        return redirect()->route('admin.team.index');
    }

    // delete team
    public function delete(Team $team)
    {
        $team->delete();
        return redirect()->route('admin.team.index');
    }
}
