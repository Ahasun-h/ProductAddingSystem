<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ProductVariant;

class Product extends Model
{
    //
    protected $fillable = [
        'product_name',
        'short_description',
        'product_description',
        'product_sku',
        'product_image',
        'variant',
        'stock_status'
    ];

    public function productVariant(){
        return $this->belongsTo(ProductVariant::class,'id');
    }

}
