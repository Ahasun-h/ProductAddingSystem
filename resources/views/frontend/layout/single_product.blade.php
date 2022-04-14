@extends('frontend.master')

@section('title', 'Home')

@section('content')

<div class="container">
    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="index.html" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="category.html" itemprop="url"><span itemprop="title">Electronics</span></a></li>
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="product.html" itemprop="url"><span itemprop="title">Laptop Silver black</span></a></li>
    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
   
      <!--Middle Part Start-->
      <div id="content" class="col-sm-12">
        <div itemscope itemtype="http://schema.org/Product">
          <h1 class="title" itemprop="name">{{ $product->product_name }}</h1>
          <div class="row product-info">
            <div class="col-sm-6">
                <div class="image">
                  <img class="img-responsive" itemprop="image" id="zoom_01" src="{{ asset('storage/product_image/'.$product->product_image) }}" title="{{ $product->product_name }}" alt="{{ $product->product_name }}" data-zoom-image="{{ asset('storage/product_image/'.$product->product_image) }}" /> 
                </div>
                <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> Click image for Gallery</span></div>
              
            </div>
            <div class="col-sm-6">
              <ul class="list-unstyled description">
                <li><b>Availability:</b> 
                    @if ($product->stock_status == '1')
                    <span class="instock">In Stock</span>
                    @elseif ($product->stock_status == '0')
                    <span class="instock">Out Of Stock</span>   
                    @endif
                </li>
              </ul>
              <ul class="price-box">
                <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span id="product_price" itemprop="price">${{ $productVariants[0]->price }} </span>
                    <span itemprop="availability" content="In Stock"></span>
                </li>

              
              </ul>
              <div id="product">
                <h3 class="subtitle">Available Options</h3>
                <div class="form-group required">
                  <label class="control-label">{{ $product->variant }}</label>
                  <select class="form-control" id="productVariant" >

                    @foreach ($productVariants as $productVariant)
                    <option value="{{ $productVariant->id }}">{{ $productVariant->variant_type }} </option>
                    @endforeach
                  </select>
                </div>
                <div class="cart">
                  <div>
                    <div class="qty">
                      <label class="control-label" for="input-quantity">Qty</label>
                      <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                      <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                      <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                      <div class="clear"></div>
                    </div>
                    <button type="button" id="button-cart" class="btn btn-primary btn-lg">Add to Cart</button>
                  </div>
                  <div>
                    <button type="button" class="wishlist" onClick=""><i class="fa fa-heart"></i> Add to Wish List</button>
                    <br />
                    <button type="button" class="wishlist" onClick=""><i class="fa fa-exchange"></i> Compare this Product</button>
                  </div>
                </div>
              </div>
              <div class="rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                <meta itemprop="ratingValue" content="0" />
                <p><span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href=""><span itemprop="reviewCount">1 reviews</span></a> / <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">Write a review</a></p>
              </div>
              <hr>
              <!-- AddThis Button BEGIN -->
              <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
              <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>
              <!-- AddThis Button END -->
            </div>
          </div>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
           
          </ul>
          <div class="tab-content">
            <div itemprop="description" id="tab-description" class="tab-pane active">
              <div>
               {!! $product->product_description !!} 
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
      <!--Middle Part End -->
      
    </div>
  </div>

@endsection


@push('custom_script')
<script type="text/javascript">
        
    // Get Selected User Data
    $(document).on("change", "#productVariant", function(e) {
            e.preventDefault();

            var productVariantID = document.getElementById("productVariant");
            var productVariantVlaue = productVariantID.options[productVariantID.selectedIndex].value;

            $.ajax({
                type: "GET",
                url: "/product/variant",
                data: { variantID: productVariantVlaue },
                success: function(resp) {  
                    document.getElementById("product_price").textContent=resp.price;
                },
                error: function() {
                    console.log("Error");
                }
            });  
    });

</script>
@endpush