<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\ProductVariant;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Add Product 
    public function addProduct()
    {
        return view('backend.layout.product.add');
    }

    // Store Product
    public function storeProduct(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_name'        => 'required|string',
            'short_description'   => 'required|string',
            'product_description' => 'required',
            'product_sku'         => 'required|string',
            'product_image'       => 'required|mimes:jpeg,png,jpg',
            'variant'             => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // For Product Image
        $productImageUploaded = request()->file('product_image');
        $productImageName = $request->product_name.'-'.time().'.'.$productImageUploaded->getClientOriginalExtension() ;
        $productImagePath = public_path('/storage/product_image/');
        $productImageUploaded ->move($productImagePath,$productImageName);

        // Store
        $product = Product::create([
            'product_name'        => $request->product_name,
            'short_description'   => $request->short_description,
            'product_description' => $request->product_description,
            'product_sku'         => $request->product_sku,
            'product_image'       => $productImageName,    
            'variant'             => $request->variant,
        ]);


        // Store Product variant 
        $count = count($request->variant_type);

        for ($i=0; $i < $count; $i++) {

            if( $request->variant_type[$i] !== null && $request->price[$i] !== null && $request->quantity[$i] !== null ){
                $productVariant               = new ProductVariant();
                $productVariant->product_id   = $product->id;
                $productVariant->variant_type = $request->variant_type[$i];
                $productVariant->price        = $request->price[$i];
                $productVariant->quantity     = $request->quantity[$i];
                $productVariant->save();
            } 
        }

        return redirect('products')->with('success','Product added successfully!');
    }

    // Get All Products
    public function allProducts()
    {
        $products = Product::select('*')->orderBy('id', 'desc')->get();
        return view('backend.layout.product.all',compact('products'));
    }

    // Delete Product
    public function deleteProducts($id)
    {
        $product = Product::where('id',$id)->first();

        $countProductVariant = count(ProductVariant::where('product_id',$id)->get());

        // Delete product variant items
        for ($i=0; $i < $countProductVariant; $i++) {
            ProductVariant::where('product_id',$id)->first()->delete();
        }

        // delete old product Image
        if (file_exists('storage/product_image/' . $product->product_image)) {
            Storage::delete('product_image/' . $product->product_image);
        }
        
        $product->delete();

        return redirect('products')->with('danger','Product deleted successfully!');
    }

}
