<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoprProductDetermination extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_number',
        'id_sopr',
        'id_product_determination',
        'qty_order',
        'delivery_req',
        'notes',
    ];

    public function sopr()
    {
        return $this->belongsTo(Sopr::class, 'id_sopr');
    }

    public function productDetermination()
    {
        return $this->belongsTo(ProductDetermination::class, 'id_product_determination');
    }

    public function opc()
    {
        return $this->hasMany(Opc::class, 'id_opc');
    }
}
