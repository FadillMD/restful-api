<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function countSopr(){
        $client = new Client();
        $url = "http://localhost:8000/api/soprs";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = count($contentArray['data']);
        return view('dashboard',['data'=>$data]);
    }
}
