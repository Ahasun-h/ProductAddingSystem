@extends('backend.master')

@section('title', 'Add Products')

@push('custom_css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush


@section('content')


        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
              <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Form Basic</h4>
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
            <div class="row justify-content-center align-items-center">
              <div class="col-md-8">
                <div class="card">
                  <form class="form-horizontal" action="{{ route('store.product') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <h4 class="card-title text-center">Product Add</h4>
                      <hr>
                      <div class="form-group row">
                        <label for="product_name" class="col-sm-3 text-end control-label col-form-label">
                            Product Name
                        </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" placeholder="Name" name="product_name" />
                        
                          @error('product_name')
                          <div class="invalid-feedback" style="display: block;padding: 4px 11px;background: #ca727254;">
                            {{ $message }}
                          </div>
                          @enderror
                      

                          
                        
                        </div>
                      </div>
                     
                    

                      <div class="form-group row">
                        <label for="short_description" class="col-sm-3 text-end control-label col-form-label">
                            Short Description
                        </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('short_description') is-invalid @enderror" id="short_description" placeholder="Example " name="short_description" />
                        
                          @error('short_description')
                          <div class="invalid-feedback" style="display: block;padding: 4px 11px;background: #ca727254;">
                            {{ $message }}
                          </div>
                          @enderror
                        
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="product_description" class="col-sm-3 text-end control-label col-form-label">
                            Description
                        </label>
                        <div class="col-sm-9">
                            <textarea id="product_description" class="form-control product_description @error('product_description') is-invalid @enderror" name="product_description"></textarea>
                        
                            @error('product_description')
                            <div class="invalid-feedback " style="display: block;padding: 4px 11px;background: #ca727254;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="product_sku" class="col-sm-3 text-end control-label col-form-label">
                            Product SKU
                        </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('product_sku') is-invalid @enderror" id="product_sku" placeholder="Example " name="product_sku" />
                        
                          @error('product_sku')
                          <div class="invalid-feedback " style="display: block;padding: 4px 11px;background: #ca727254;">
                              {{ $message }}
                          </div>
                          @enderror
                        
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="product_image" class="col-sm-3 text-end control-label col-form-label">
                            Product Image
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="custom-file-input @error('product_image') is-invalid @enderror" id="product_image" required="" accept=".png, .jpg, .jpeg" name="product_image">
                            
                            @error('product_image')
                            <div class="invalid-feedback " style="display: block;padding: 4px 11px;background: #ca727254;">
                                {{ $message }}
                            </div>
                            @enderror
                       
                       
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="variant" class="col-sm-3 text-end control-label col-form-label">
                            Variant
                        </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control @error('variant') is-invalid @enderror" id="variant" placeholder="Example " name="variant" />
                        
                          @error('variant')
                          <div class="invalid-feedback " style="display: block;padding: 4px 11px;background: #ca727254;">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group mt-4">
                        <h5 class="text-center">Product Info</h5>
                        <!-- Add Course Module -->
                        <table class="table-editable form-group col-12">
                          <thead>
                            <tr>
                                  <th>Variant Type</th>
                                  <th>Price</th>
                                  <th>Quantity</th>
                                  <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr data-repeater-list="modules" class="mb-2">
                                  <td>
                                      <input class="form-control variant_type" id="variant_type" type="text" name="variant_type[]" required>
                                      <div class="valid-feedback">Looks good!</div>
                                      <div class="invalid-feedback">Please enter variant type.</div>
                                  </td>
                                  <td>
                                      <input class="form-control price" id="price" type="text" name="price[]" required>
                                      <div class="valid-feedback">Looks good!</div>
                                      <div class="invalid-feedback">Please enter price.</div>
                                  </td>
                                  <td>
                                      <input class="form-control quantity" id="quantity" type="number"  name="quantity[]" required>
                                      <div class="valid-feedback">Looks good!</div>
                                      <div class="invalid-feedback">Please enter quantity.</div>
                                  </td>
                                  <td>
                                      <button class="jDeleteRow form-control btn btn-danger btn-icon waves-effect waves-light" type="button" disabled>&times;</button>
                                  </td>
                            </tr>
                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="4">
                                  <button type="button" class="jAddRow btn btn-success variantStore waves-effect waves-float waves-light">
                                      <i class="fa fa-plus"></i>
                                      Add Variant
                                  </button>
                              </td>
                            </tr>
                          </tfoot>
                        </table>     
                    </div>




                    </div>

                    

                    




                    <div class="border-top">
                      <div class="card-body">
                        <button type="submit" class="btn btn-primary">
                          Submit
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
               
               
              </div>
             
            </div>
            
           
          </div>
          <!-- ============================================================== -->
          <!-- End Container fluid  -->



@endsection

@push('custom_script')

{{-- Summernote Editor for Product Description --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    
    // Summernote
    $(document).ready(function() {

      $('.product_description').summernote();

    });

    // Product variant input row remove
    $(".jDeleteRow").click(function() {
        var rowCount = $(this).closest('table').find('tbody').length;
        if (rowCount > 1) {
            $(this).closest('tbody').remove();
        }
    });
    $(".jAddRow").click(function() {
        var lastRow = $(this).closest('table').find('tbody').last();
        var newRow = lastRow.clone(true, true); //use true to copy event bindings with rows.  Doesn't always work with 3rd party plugins.
        newRow.find('input').val('');
        newRow.find('.jDeleteRow').removeAttr("disabled");
        newRow.insertAfter(lastRow);
    });




</script>
@endpush