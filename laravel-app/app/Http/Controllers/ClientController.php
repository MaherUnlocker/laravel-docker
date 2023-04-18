<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        var_dump($clients);
        die();
        return view('clients.index', compact('clients'));
        // -> resources/views/clients/index.blade.php
      }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client([
            'npr' => $request->input('npr'),
            'adresse' => $request->input('adresse'),
            'email' => $request->input('email'),
            ]);
            $client->save();
            return redirect('/clients')->with('success', 'Client saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);
        return view('clients.show', compact('client'));
        
        // -> resources/views/clients/edit.blade.php
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
        // -> resources/views/clients/edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        $client->update($request->all());
        return redirect('/clients')->with('success', 'Client updated.');
        // -> resources/views/clients/index.blade.php
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('/clients')->with('success', 'Client removed.');
        // -> resources/views/clients/index.blade.php
    }
}
