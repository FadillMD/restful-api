<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SoprProductDeterminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://localhost:8000/api/sopr-product-determinations";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['success']!=true) {
            $error = $contentArray['data'];
            return redirect()->to('sopr.index')->withErrors($error);
        } else {
            $data = $contentArray['data'];
            return view('order.index',['data'=>$data]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = new Client();
        $url = "http://localhost:8000/api/sopr-product-determinations/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if($contentArray['success']!=true){
            $error = $contentArray['message'];
            return redirect()->to('order.index')->withErrors($error);
        } else{
        $data = $contentArray['data'];
        return view('order.index',['data'=>$data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
