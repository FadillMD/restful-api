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
        $soprproductdeterminations = SoprProductDetermination::with(['sopr', 'productDetermination'])
        ->get();

        //return collection of posts as a resource
        return new SoprProductDeterminationResource(true, 'List Data SOPR Order', $soprproductdeterminations);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'code_number' => 'required|string|max:255|unique:sopr_product_determinations',
            'id_sopr' => 'required|string',
            'id_product_determination' => 'required|string',
            'qty_order' => 'required|string',
            'delivery_req' => 'required|date',
            'notes' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return new SoprProductDeterminationResource(false, 'Validasi Gagal', $validator->errors());
         
        }
    
        $soprproductdeterminations = SoprProductDetermination::create([
            'code_number' => $request->code_number,
            'id_sopr' => $request->id_sopr,
            'id_product_determination' => $request->id_product_determination,
            'qty_order' => $request->qty_order,
            'delivery_req' => $request->delivery_req,
            'notes' => $request->notes,
        ]);

        return new SoprProductDeterminationResource(true, 'Data SOPR Order Berhasil Ditambahkan!', $soprproductdeterminations);
    }

    public function show($id)
    {
        //find post by ID
        $soprproductdeterminations = SoprProductDetermination::with(['sopr', 'productDetermination'])
        ->where('id_sopr', $id)
        ->get();
        // Check if data is found
    if ($soprproductdeterminations->isEmpty()) {
        return new SoprProductDeterminationResource(false, 'No Data Found!', []);
    }
        //return single post as a resource
        return new SoprProductDeterminationResource(true, 'Detail Data SOPR Order!', $soprproductdeterminations);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'code_number' => 'required',
            'id_sopr' => 'required',
            'id_product_determination' => 'required',
            'qty_order' => 'required',
            'delivery_req' => 'required',
            'notes' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $soprproductdeterminations = SoprProductDetermination::find($id);

        //update post without image
        $soprproductdeterminations->update([
            'code_number' => $request->code_number,
            'id_sopr' => $request->id_sopr,
            'id_product_determination' => $request->id_product_determination,
            'qty_order' => $request->qty_order,
            'delivery_req' => $request->delivery_req,
            'notes' => $request->notes,
        ]);

        //return response
        return new SoprProductDeterminationResource(true, 'Data SOPR Order Berhasil Diubah!', $soprproductdeterminations);
    }

    public function destroy($id)
    {

        //find post by ID
        $soprproductdeterminations = SoprProductDetermination::find($id);

        //delete post
        $soprproductdeterminations->delete();

        //return response
        return new SoprProductDeterminationResource(true, 'Data SOPR Order Berhasil Dihapus!', null);
    }

}
