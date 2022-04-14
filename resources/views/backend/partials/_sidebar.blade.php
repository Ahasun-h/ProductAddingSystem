@php
$prefix = Request::route()->getPrefix();
$route  = Route::current()->getName();
@endphp

<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4">

       
        {{-- Dashboard --}}
        <li class="sidebar-item {{ request()->is('dashboard')?'selected':'' }} ">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false" >
            <i class="mdi mdi-view-dashboard"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        {{-- Product --}}
        <li class="sidebar-item {{ request()->is('add-product') || request()->is('products') ?'active':'' }}">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Forms </span></a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item {{ request()->is('add-product')?'selected':'' }}">
              <a href="{{  route('add.product') }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add </span></a>
            </li>
            <li class="sidebar-item {{ request()->is('products')?'selected':'' }}">
              <a href="{{ route ('all.product') }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> All </span></a>
            </li>
          </ul>
        </li>


        
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>