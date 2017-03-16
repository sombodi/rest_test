<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Controllers\Controller; 
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

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

        // FILTER DATA
        $query_parameters = Input::get();
 
        if(count($query_parameters) > 0){
 
            $filtered_collection =  collect([]);

            foreach ($query_parameters as $filter_key => $filter_value) {
                
                 $clients->filter(function ($one_client, $client_key) use ($filter_key, $filter_value, &$filtered_collection){ 
   
                    if($filter_key == 'email'){
                        //search by email
                        if(strpos($one_client->email, $filter_value) !== false){
                            if(!$filtered_collection->contains($one_client)){
                                 $filtered_collection->push($one_client);
                            }
                        }
                    } elseif($filter_key == 'telephone'){
                        // search uncrypted and unhidden telephone
                        $decrypted_telephone = $one_client->fullTelephone;
                        if(strpos($decrypted_telephone, $filter_value) !== false){
                            if(!$filtered_collection->contains($one_client)){
                                 $filtered_collection->push($one_client);
                            }
                        }
                    } else {
                        // search client_data
                        
                        if(array_key_exists($filter_key,$one_client->client_data)){
                            if( strpos($one_client->client_data[$filter_key], $filter_value) !== false){
                                if(!$filtered_collection->contains($one_client)){
                                     $filtered_collection->push($one_client);
                                }
                            }
                            
                        }
                    }
 
                }) ;

           }
        $clients = $filtered_collection;
        }

        // Check if request API of WEB
        if (strpos(Route::getCurrentRoute()->getPrefix(), 'api') !== false) {
            return $this->responseFactory->json($clients);
        }
        return view('home', ['clients' => $clients]);

    }

    /**
     * Store a newly created client.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $rules =  [
            'email' => ["required","regex:/^(\S+)@(\S+)\.(\S+)$/"],
            'telephone' => 'required|phone:gb',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->messages();
        }else{ 
            $client_data = $request->all();
            unset($client_data['_method']);

            if(count($client_data) != 10){
                return 'Payload should have 10 fields';
            }

            unset($client_data['email']);
            unset($client_data['telephone']);

            $payload = [];
            $payload['email'] = $request->email;
            $payload['telephone'] = $request->telephone;
            $payload['client_data'] = $client_data;

            $client = $this->client->create($payload);
            return $this->responseFactory->json($client);
        }
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
        $rules =  [
            'email' => ["required","regex:/^(\S+)@(\S+)\.(\S+)$/"],
            'telephone' => 'required|phone:gb',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->messages();
        }else{ 
            $client = $this->client->findOrFail($id);

            $client_data = $request->all();
            unset($client_data['_method']);

            if(count($client_data) != 10){
                return 'Payload should have 10 fields';
            }
            
            unset($client_data['email']);
            unset($client_data['telephone']);

            $payload = [];
            $payload['email'] = $request->email;
            $payload['telephone'] = $request->telephone;
            $payload['client_data'] = $client_data;

            $client->update($payload);
            return $this->responseFactory->json($client);
        }
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