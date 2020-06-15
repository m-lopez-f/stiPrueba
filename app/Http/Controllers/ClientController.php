<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Utils\Utils;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients');
    }

    public function list()
    {
        $clients = \App\Client::get();
        return $clients;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
    public function imports(Request $request)
    {
        $fileContent = Utils::readFile();
        $posibleClients = Utils::extractData($fileContent);
        $clients = [];
        foreach ($posibleClients as $key => $posibleClient) {
            if (strpos($posibleClient, '00') === false) {
                $splitClient = preg_split("/[\t]/", $posibleClient);
                Log::debug($splitClient );
                $client = Client::create([
                    'nombres' => $splitClient[1],
                    'apellidos' => $splitClient[2],
                    'telefono' => $splitClient[3],
                    'saldo' => $splitClient[4],
                ]);
                array_push($clients, $client);
            }
        }
        return $clients;
    }
}
