<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\ProductVariant;

class HomeController extends Controller
{
    // Index function for main  view 
    public function index()
    {
        // Get all stock product 
        $products = Product::where('stock_status','1')->with(
            ['productVariant' => function ($query) {$query->orderBy('id', 'desc')->first();}]
        )->orderBy('id', 'desc')->get();

        return view('frontend.layout.home',compact('products'));
    }


    // single product
    public function singleProduct($id){
       

        // Get selected product 
        $product = Product::where('id',$id)->first();

        // Get selected product Variants
        $productVariants = ProductVariant::where('product_id',$id)->get();

        return view('frontend.layout.single_product',compact('product','productVariants'));
    }

     // Get selected Product Variant
     public function getProductVariant(Request $request)
     {
         if ($request->ajax()) {

           

             $id = intval($request->variantID);
             $productVariantData = productVariants::where('id',$id)->first();
             return response()->json($productVariantData);
         }
     }
}
