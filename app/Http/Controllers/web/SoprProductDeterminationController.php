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
            return view('order.get',['data'=>$data]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = new Client();
        $url = "http://localhost:8000/api/soprs";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = $contentArray['data'];

        $url1 = "http://localhost:8000/api/product-determinations";
        $response1 = $client->request('GET', $url1);
        $content1 = $response1->getBody()->getContents();
        $contentArray1 = json_decode($content1,true);
        $data1 = $contentArray1['data'];
        return view('order.add_order',['data'=>$data],['data1'=>$data1]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $code_number = $request->code_number;
        $id_sopr = $request->id_sopr;
        $id_product_determination = $request->id_product_determination;
        $qty_order = $request->qty_order;
        $delivery_req = $request->delivery_req;
        $notes = $request->notes;

        $parameter = [
            'code_number' =>$code_number,
            'id_sopr' =>$id_sopr,
            'id_product_determination' =>$id_product_determination,
            'qty_order' => $qty_order,
            'delivery_req' =>$delivery_req, //date('Y/m/d',strtotime($delivery_req)),
            'notes' => $notes,
        ];
        $client = new Client();
        $url = "http://localhost:8000/api/sopr-product-determinations";
        $response = $client->request('POST', $url,[
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($parameter),
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if($contentArray['success']!=true){
            $error = $contentArray['data'];
            return redirect()->to('orders/add')->withErrors($error)->withInput();
        }else{
            return redirect()->to('orders')->with('success', 'berhasil menambahkan data!');
        }
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
            $url = "http://localhost:8000/api/soprs/$id";
            $response = $client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray1 = json_decode($content,true);
            $data = $contentArray1['data'];
            return view('order.show_id',['data'=>$data])->with('kosong','tidak ada data order');
            // return redirect()->to('orders/add')->withErrors()->withInput();
        }else{
            $data = $contentArray['data'];
            return view('order.show_id',['data'=>$data]);
            // return redirect()->to('orders')->with('success', 'berhasil menambahkan data!');
        }
        // $data = $contentArray['data'];
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
