<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opc extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_opc',
        'id_sopr_product_determination',
        'notes',
    ];

    public function soprProductDetermination()
    {
        return $this->belongsTo(SoprProductDetermination::class, 'id_sopr_product_determination');
    }

    public function sopr()
    {
        return $this->belongsTo(Sopr::class, 'id_sopr');
    }

    public function productDetermination()
    {
        return $this->belongsTo(ProductDetermination::class, 'id_product_determination');
    }
}
