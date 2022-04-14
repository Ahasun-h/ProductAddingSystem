<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class ProductVariant extends Model
{
    //
    protected $fillable = [
        'product_id',
        'variant_type',
        'price',
        'quantity'  
    ];

    // Relation with Product table 
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
