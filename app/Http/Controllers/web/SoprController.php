<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SoprController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://localhost:8000/api/soprs";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = $contentArray['data'];
        return view('sopr.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sopr.add_sopr');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $no_sopr = $request->no_sopr;
        $no_po = $request->no_po;
        $customer = $request->customer;
        $date = $request->order_date;

        $parameter = [
            'no_sopr' =>$no_sopr,
            'no_po' =>$no_po,
            'customer' =>$customer,
            'order_date' => $date,
        ];

        $client = new Client();
        $url = "http://localhost:8000/api/soprs";
        $response = $client->request('POST', $url,[
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($parameter),
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if($contentArray['success']!=true){
            $error = $contentArray['data'];
            return redirect()->to('soprs/add')->withErrors($error)->withInput();
        }else{
            return redirect()->to('soprs')->with('success', 'berhasil menambahkan data!');
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
        $no_sopr = $request->no_sopr;
        $no_po = $request->no_po;
        $customer = $request->customer;
        $date = $request->order_date;

        $parameter = [
            'no_sopr' =>$no_sopr,
            'no_po' =>$no_po,
            'customer' =>$customer,
            'order_date' => $date,
        ];

        $client = new Client();
        $url = "http://localhost:8000/api/soprs/$id";
        $response = $client->request('PUT', $url,[
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($parameter),
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if($contentArray['success']!=true){
            $error = $contentArray['data'];
            return redirect()->to('soprs/add')->withErrors($error)->withInput();
        }else{
            return redirect()->to('soprs')->with('success', 'berhasil melakukan update data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = "http://localhost:8000/api/soprs/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if($contentArray['success']!=true){
            $error = $contentArray['data'];
            return redirect()->to('soprs')->withErrors($error);
        }else{            
            return redirect()->to('soprs')->with('success', 'Berhasil melakukan Hapus data!');
        }
    }
}
