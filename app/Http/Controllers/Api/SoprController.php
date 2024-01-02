<?php

namespace App\Http\Controllers\Api;

use App\Models\Sopr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//import Facade "Validator"
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SoprResource;

class SoprController extends Controller
{
    public function index()
    {
        //get all posts
        $soprs = Sopr::latest()->paginate(5);

        //return collection of posts as a resource
        return new SoprResource(true, 'List Data Posts', $soprs);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'no_sopr' => 'required|string|max:255',
            'no_po' => 'required|string|max:255',
            'customer' => 'required|string|max:255',
            'order_date' => 'required|date',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        $soprs = Sopr::create([
            'no_sopr' => $request->no_sopr,
            'no_po' => $request->no_po,
            'customer' => $request->customer,
            'order_date' => $request->order_date,
        ]);

        return new SoprResource(true, 'Data Post Berhasil Ditambahkan!', $soprs);
    }

    public function show($id)
    {
        //find post by ID
        $sopr = Sopr::find($id);

        //return single post as a resource
        return new SoprResource(true, 'Detail Data Post!', $sopr);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'no_sopr' => 'required',
            'no_po' => 'required',
            'customer' => 'required',
            'order_date' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $sopr = Sopr::find($id);

        //update post without image
        $sopr->update([
            'no_sopr' => $request->no_sopr,
            'no_po' => $request->no_po,
            'customer' => $request->customer,
            'order_date' => $request->order_date,
        ]);

        //return response
        return new SoprResource(true, 'Data Post Berhasil Diubah!', $sopr);
    }

    public function destroy($id)
    {

        //find post by ID
        $sopr = Sopr::find($id);

        //delete post
        $sopr->delete();

        //return response
        return new SoprResource(true, 'Data Post Berhasil Dihapus!', null);
    }
    
}
