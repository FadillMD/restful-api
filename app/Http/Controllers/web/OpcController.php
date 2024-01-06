<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class OpcController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = "http://localhost:8000/api/opcs";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = $contentArray['data'];
        return view('opc.index',['data'=>$data]);
    }
}