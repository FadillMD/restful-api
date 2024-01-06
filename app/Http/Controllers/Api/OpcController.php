<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OpcResource;
//import Facade "Validator"
use Illuminate\Support\Facades\Validator;
use App\Models\Opc;
use Illuminate\Http\Request;

class OpcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opcs = Opc::with(['soprProductDetermination.productDetermination','soprProductDetermination.sopr'])
        ->get();

        // Return the result or perform any other necessary operations
        return new OpcResource(true, 'List Data OPC', $opcs);
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
        //Validation
        $validator = Validator::make($request->all(),[
            'no_opc' => 'required|string|max:255|unique:opcs',
            'id_sopr_product_determination' => 'required|string|max:255',
            'notes' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return new OpcResource(false, 'Validasi Gagal', $validator->errors());
            // return response()->json($validator->errors(), 422);
        }

        $opcs = Opc::create([
            'no_opc' => $request->no_opc,
            'id_sopr_product_determination' => $request->id_sopr_product_determinations,
            'notes' => $request->notes,
        ]);
        
        return new OpcResource(true, 'Data OPC Berhasil Ditambahkan!', $opcs);
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
