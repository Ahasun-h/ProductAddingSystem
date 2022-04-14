@extends('frontend.master')

@section('title', 'Home')




@section('content')


<div class="container">
    <div class="row">
      <!--Middle Part Start-->
      <div id="content" class="col-xs-12">
        
        <!-- Product Start-->
        <h3 class="subtitle">Products</h3>
        <div class="owl-carousel product_carousel">


          @foreach ($products as $product)

          <div class="product-thumb clearfix">
            <div class="image">
                <a href="{{ route('single.product',$product->id) }}">
                  <img src="{{ asset('storage/product_image/'.$product->product_image) }}" alt="{{ $product->product_sku }}" title="{{ $product->product_name }}" class="img-responsive" />
                </a>
            </div>
            <div class="caption">
              <h4>
                  <a href="{{ route('single.product',$product->id) }}">
                  {{ $product->product_name }}
                </a>
              </h4>
              <p class="price">$ {{ $product->productVariant->price }}  </p>
              
            </div>
            <div class="button-group">
              <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
              <div class="add-to-links">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i></button>
                <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i></button>
              </div>
            </div>
          </div>


            
          @endforeach





        </div>
        
      </div>
      <!--Middle Part End-->
    </div>
  </div>

@endsection