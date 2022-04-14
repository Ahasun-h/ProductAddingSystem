<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="{{ asset('fontend/image/favicon.png') }}" rel="icon" />
<title>{{ config('app.name') }} | @yield('title')</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
@include('frontend.partials._style')
<!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
    {{-- Header --}}
    @include('frontend.partials._header')
    {{-- Header --}}

    <div id="container">
        @yield('content')
    </div>

    <!--Footer Start-->
    @include('frontend.partials._footer')
    <!--Footer End-->

  
  
 
</div>
<!-- JS Part Start-->
@include('frontend.partials._script')
<!-- JS Part End-->
</body>
</html>