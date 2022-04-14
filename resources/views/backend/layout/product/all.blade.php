@extends('backend.master')

@section('title', 'Products')

@push('custom_css')

<link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }} " rel="stylesheet" />
@endpush


@section('content')

@if(session()->has('error'))
<div class="demo-spacing-0" style="margin-bottom: 14px">
    <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
        <div class="alert-body">
            <i data-feather="info" class="mr-50 align-middle"></i>
            <span>{{ session('error') }}</span>
        </div>
    </div>
</div>
@elseif (session()->has('success'))
<div class="demo-spacing-0" style="margin-bottom: 14px;margin-top: 14px,">
<div class="alert alert-success mt-1 alert-validation-msg" role="alert">
    <div class="alert-body">
        <i data-feather="check-circle" class="mr-50 align-middle"></i>
        <span>{{ session('success') }}</span>
    </div>
</div>
</div>
@endif

         <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
              <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tables</h4>
                <div class="ms-auto text-end">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Library
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Container fluid  -->
          <!-- ============================================================== -->
          <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <div class="table-responsive">
                      <table id="zero_config" class="table table-striped table-bordered" >
                        <thead>
                          <tr>
                            
                            <th>Product Name</th>
                            <th>Short Description</th>
                            <th>SKU</th>
                            <th>Stock</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $product)
                          <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->short_description }}</td>
                            <td>{{ $product->product_sku }}</td>
                            <td>
                                @if ($product->stock_status == '1')
                                In Stock
                                @else
                                Out Of Stock
                                @endif
                            </td>
                            <td>
                                <button type="button" id="' . $data->id . '" title="Edit" class="editProduct btn btn-success m-1" data-toggle="modal" data-target="#userUpdateModal"><i class="bx bx-edit"></i></button>
                                <a href="{{ route('delete.product',$product->id) }}" type="button" id="deleteProduct" title="Delete" class="deleteProduct btn btn-danger m-1"><i class="bx bx-trash"></i></a>
                            </td>
                          </tr>
                          @endforeach
                         
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Product Name</th>
                            <th>Short Description</th>
                            <th>SKU</th>
                            <th>Stock</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
          </div>
          <!-- ============================================================== -->
          <!-- End Container fluid  -->
          <!-- ============================================================== -->



@endsection

@push('custom_script')

    <script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js') }} "></script>
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>

@endpush