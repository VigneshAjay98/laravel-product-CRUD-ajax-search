@extends('layouts.app')

@section('content')

<style>
     .view-btn1 {
    background-color: rgba(81, 190, 120, 0.1);
    border-color: rgba(81, 190, 120, 0.3);
    color: #51be78;
}
</style>
<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">

    @include('layouts.components.side_menu')

    <div class="dashboard-content-wrap">

        <div class="container-fluid">
            @include('layouts.components.alert')

            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="card-box-shared">
                        @if(Auth()->user()->role == 'admin')
                        <div class="card-box-shared-title d-flex justify-content-between">
                            <h3 class="widget-title">Products</h3>
                            <button class="theme-btn view-btn create_btn"><i class="la la-plus mr-2 font-size-16"></i>Create</button>
                        </div>

                        <div class="container create_filters" style="display: none;">
                        <form method="post" id="create_product" enctype="multipart/form-data" action="{{url ('/products')}}">
                            @csrf
                            <div class="row">
                            <!-- Product creation -->
                                <div class="col-lg-3">
                                    <div class="input-box">
                                        <label class="label-text">Product Name<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="product_name" placeholder="Product" value="{{old('product_name')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-box">
                                        <label class="label-text">Short Description<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <textarea class="form-control" type="text" name="short_description" placeholder="Short Description" value="{{old('short_description')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-box">
                                        <label class="label-text">Description<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <textarea class="form-control" type="text" name="description" placeholder="Description" value="{{old('description')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-box">
                                        <label class="label-text">Category<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="category" name="category" placeholder="Category" value="{{old('category')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-box">
                                        <label class="label-text">Price<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="price" value="{{old('price')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for="files" class="label-text">Images<span class="primary-color-2 ml-1">*</span></label>
                                    <div class="upload-btn-box">
                                      <input type='file' id="files" name="files[]" multiple="multiple">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-box">
                                        <label class="label-text">Status<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <div class="sort-ordering user-form-short">
                                                <select class="sort-ordering-select" name="status">
                                                    <option value="">--- Select ---</option>
                                                    <option value="Active">Active</option>
                                                    <option value="InActive">InActive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 d-flex align-items-center">
                                    <button class="theme-btn" type="submit">Save</button>
                                </div>
                            
                            </div>
                            </form>
                            <!-- Product creation form ends here -->
                        </div>
                        
                        @else
                        <div class="card-box-shared-title">
                            <h3 class="widget-title">My Products</h3>
                        </div>
                        @endif
                        <div class="container">
                            <div class="my-course-content-wrap">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active show" id="all-courses">
                                    <div class="my-course-content-body">
                                        <div class="lecture-overview-item">
                                            <div class="question-overview-filter-wrap my-course-filter-wrap d-flex align-items-center justify-content-center">
                                                
                                                <div class="my-course-search-content">
                                                    <div class="question-overview-filter-item">
                                                        <span class="badge font-size-14 font-weight-semi-bold">Search</span>
                                                        <div class="contact-form-action mt-2">
                                                            <!-- <form method="post"> -->
                                                                <div class="input-box">
                                                                    <div class="form-group mb-0">
                                                                        <input class="form-control" type="text" id="search" name="search" placeholder="Eg: product name, category, description">
                                                                        <span class="la la-search search-icon"></span>
                                                                    </div>
                                                                </div><!-- end input-box -->
                                                            <!-- </form> -->
                                                        </div><!-- end contact-form-action -->
                                                    </div><!-- end question-overview-filter-item -->
                                                </div><!-- end my-course-search-content -->
                                            </div>
                                        </div><!-- end lecture-overview-item -->
                                        <div class="my-course-container">


                                            <div class="row container">
                            <div class="col-lg-12">
                                <table class="table">
                                  <thead style="border-top: 1px solid #dee2e6;">
                                    <tr>
                                      <th scope="col">SL No</th>
                                      <th scope="col">Product Name</th>
                                      <th scope="col">Category</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if(@$products)
                                    <?php $i=1; ?>
                                        @foreach($products as $product)
                                    <tr>
                                      <th scope="row">{{ $i++ }}</th>
                                      <td>{{ $product->name }}</td>
                                      <td>{{ $product->category }}</td>
                                      <td>{{ $product->short_description }}</td>
                                      <td>
                                        @if(@$product->status == 'Active')
                                            <a data="{{$product->status}}" data-id="{{$product->id}}" class="btn-primary active" style="padding: 3px 10px;">Active</a>
                                        @else
                                            <a data="{{$product->status}}" data-id="{{$product->id}}" class="btn-danger inactive" style="padding: 3px 10px;">InActive</a>
                                        @endif
                                      </td>
                                      <td><a href="{{ url('products/'.$product->id) }}"><i class="la la-eye mr-1 font-size-16"></i></a></td>
                                    </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td align="center" colspan="5">No Records Found!</td>
                                        </tr>
                                    @endif
                                  </tbody>
                                </table>
                            </div>
                        </div>


                                        </div>
                                    </div>
                                </div><!-- end tab-pane -->
                            </div>
                        </div>
                </div>

                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
            @include('layouts.components.footer')
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-content-wrap -->
</section><!-- end dashboard-area -->
<!-- ================================
    END DASHBOARD AREA
================================= -->

<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<script>
    
    $(document).on('click', '.create_btn', function(){
        $('.create_filters').show();
    });

    // Product creation validation

    $("#create_product").validate({
    errorElement: "div",
    rules: {
        product_name: {
            required: true,
        },
        short_description: {
            required: true,
        },
        description: {
            required: true,
        },
        category: {
            required: true,
        },
        price: {
            required: true,
        },
        files: {
            required: true,
        },
        status: {
            required: true,
        }
        
    },
    messages: {
        product_name: {
            required: "Please enter product name.",
        },
        short_description: {
            required: "Please enter short description.",
        },
        description: {
            required: "Please enter description.",
        },
        category: {
            required: "Please enter category.",
        },
        price: {
            required: "Please enter price.",
        },
        files: {
            required: "Please upload images.",
        },
        status: {
            required: "This field is required",
        }
    },
    // submitHandler: function (form) {
    //     form.submit();
    // }
});

    $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      console.log(query);
      $.ajax({
           url:"{{ url('/live_search') }}",
           method:'GET',
           data:{query:query},
           dataType:'json',
           success:function(data)
           {
            $('tbody').html(data.table_data);
            $('#total_records').text(data.total_data);
           }
          });
     });

    $( "#category" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:"{{url('category')}}",
            type: 'get',
            dataType: "json",
            data: {
               _token: '{{ csrf_token() }}',
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#category').val(ui.item.label);
           return false;
        }
      });

</script>

@endsection