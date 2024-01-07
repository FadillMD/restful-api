<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProductDeterminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://localhost:8000/api/product-determinations";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = $contentArray['data'];
        return view('product_determination.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_determination.add_pd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $no_pd = $request->no_pd;
        $type = $request->type;
        $marking = $request->marking;

        $parameter = [
            'no_pd' =>$no_pd,
            'type' =>$type,
            'marking' =>$marking,
        ];

        $client = new Client();
        $url = "http://localhost:8000/api/product-determinations";
        $response = $client->request('POST', $url,[
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($parameter),
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if($contentArray['success']!=true){
            $error = $contentArray['data'];
            return redirect()->to('product-determinations/add')->withErrors($error)->withInput();
        }else{
            return redirect()->to('product-determinations')->with('success', 'berhasil menambahkan data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $url = "http://localhost:8000/api/soprs/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = $contentArray['data'];
        return view('sopr.edit',['data'=>$data]);
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
