<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDeterminationResource;
use App\Models\ProductDetermination;
//import Facade "Validator"
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductDeterminationController extends Controller
{
    public function index()
    {
        //get all posts
        $productdeterminations = ProductDetermination::all();

        //return collection of posts as a resource
        return new ProductDeterminationResource(true, 'List Data Product Determination', $productdeterminations);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'no_pd' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'marking' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        $productdeterminations = ProductDetermination::create([
            'no_pd' => $request->no_pd,
            'type' => $request->type,
            'marking' => $request->marking,
        ]);

        return new ProductDeterminationResource(true, 'Data Product Determination Berhasil Ditambahkan!', $productdeterminations);
    }

    public function show($id)
    {
        //find post by ID
        $productdeterminations = ProductDetermination::find($id);
        if($productdeterminations){
            return new ProductDeterminationResource(true, 'Detail Data Product Determination!', $productdeterminations);
        } else{
            return new ProductDeterminationResource(false, 'Data tidak ditemukan!', null);

        }
        //return single post as a resource
          }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'no_pd' => 'required',
            'type' => 'required',
            'marking' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $productdeterminations = ProductDetermination::find($id);

        //update post without image
        $productdeterminations->update([
            'no_pd' => $request->no_pd,
            'type' => $request->type,
            'marking' => $request->marking,
        ]);

        //return response
        return new ProductDeterminationResource(true, 'Data Product Determination Berhasil Diubah!', $productdeterminations);
    }

    public function destroy($id)
    {

        //find post by ID
        $productdeterminations = ProductDetermination::find($id);

        //delete post
        $productdeterminations->delete();

        //return response
        return new ProductDeterminationResource(true, 'Data Product Determination Berhasil Dihapus!', null);
    }
}
