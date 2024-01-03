<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SoprProductDeterminationResource;
use App\Models\SoprProductDetermination;
//import Facade "Validator"
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SoprProductDeterminationController extends Controller
{
    public function index()
    {
        //get all posts
        $soprproductdeterminations = SoprProductDetermination::all();

        //return collection of posts as a resource
        return new SoprProductDeterminationResource(true, 'List Data Product Determination', $soprproductdeterminations);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'code_number' => 'required|string|max:255',
            'id_sopr' => 'required|string',
            'id_product_determination' => 'required|string',
            'qty_order' => 'required|string',
            'delivery_req' => 'required|date',
            'notes' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        $soprproductdeterminations = SoprProductDetermination::create([
            'code_number' => $request->code_number,
            'id_sopr' => $request->id_sopr,
            'id_product_determination' => $request->id_product_determination,
            'qty_order' => $request->qty_order,
            'delivery_req' => $request->delivery_req,
            'notes' => $request->notes,
        ]);

        return new SoprProductDeterminationResource(true, 'Data Product Determination Berhasil Ditambahkan!', $soprproductdeterminations);
    }

    public function show($id_sopr)
    {
        //find post by ID
        $soprproductdeterminations = SoprProductDetermination::with(['sopr', 'productDetermination'])
        ->where('id_sopr', $id_sopr)
        ->get();

        //return single post as a resource
        return new SoprProductDeterminationResource(true, 'Detail Data Product Determination!', $soprproductdeterminations);
    }
}
