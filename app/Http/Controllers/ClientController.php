<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Controllers\Controller;
// use App\Http\Requests\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;

class ClientController extends Controller
{ 
    /**
     * @var Client
     */
    protected $client;
    /**
     * @var ResponseFactory
     */
    private $responseFactory;
    /**
     * Constructor.
     *
     * @param Client $client
     * @param ResponseFactory $responseFactory
     */
    public function __construct(Client $client, ResponseFactory $responseFactory)
    {
        $this->client = $client;
        $this->responseFactory = $responseFactory;
    }
    /**
     * Display a listing of clients.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $clients = $this->client->all();
        return $this->responseFactory->json($clients);
    }
    /**
     * Store a newly created client.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $client = $this->client->create($request->all());
        return $this->responseFactory->json($client);
    }
    /**
     * Display the specified client.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $client = $this->client->findOrFail($id);
        return $this->responseFactory->json($client);
    }
    /**
     * Update the specified client.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $client = $this->client->findOrFail($id);
        $client->update($request->all());
        return $this->responseFactory->json($client);
    }
    /**
     * Delete the specified client.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->client->findOrFail($id)->delete();
    }
}