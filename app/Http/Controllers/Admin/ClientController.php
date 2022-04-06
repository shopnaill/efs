<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // get all clients
    public function index()
    {
        $clients = Client::paginate(10);
        return view('admin.client.index', compact('clients'));
    }

    // create new client
    public function create()
    {
        return view('admin.client.form');
    }

    // edit client
    public function edit(Client $client)
    {
        return view('admin.client.form', compact('client'));
    }

    // update or create client
    public function update_create(Request $request, Client $client = null)
    {

         $this->validate($request, [
            'name' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('client_logo')) {
            $logo = $request->file('client_logo');
            $logo = $logo->store('clients');
            $request->merge(['logo' => $logo]);

        } else {
            $logo_name = $client->logo;
        }

        if ($client) {
            $client->update($request->all());
        } else {
            Client::create($request->all());
        }

        return redirect()->route('client.index');
    }

    // delete client
    public function delete(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index');
    }
}
