<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Retrieve and display a list of all clients.
     *
     * @return \Illuminate\View\View
     */
    public function getAllClient()
    {
        return view('allclients', ['clients' => Client::orderBy('created_at', 'desc')->get()]);
    }

    /**
     * Delete a client.
     *
     * @param Client $client
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Client $client)
    {
        return response()->json(
            $client->delete(),
            Response::HTTP_NO_CONTENT
        );
    }

    /**
     * Display the form to create a new client.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('createclient');
    }

    /**
     * Display the form to edit an existing client.
     *
     * @param Client $client
     *
     * @return \Illuminate\View\View
     */
    public function edit(Client $client)
    {
        return view('editclient', ['client' => $client]);
    }

    /**
     * Store a new client in the database.
     *
     * @param ClientRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClientRequest $request)
    {
        Client::create($request->all());
        return redirect('all-clients');
    }

    /**
     * Update an existing client in the database.
     *
     * @param Client $client
     * @param ClientRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Client $client, ClientRequest $request)
    {
        $client->update($request->all());
        return redirect('client/' . $client->id . '/edit')
            ->with('editedclient', 'Client has updated successfully!');
    }
}
