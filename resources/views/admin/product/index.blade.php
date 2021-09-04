@extends('admin.layouts.master')

@section('content')
 <div class="row">
    <div class="col s12 m12 l12">
      <div id="button-trigger" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Products List</h4>
          <div class="row">
      
            <div class="col s12">
              <table id="data-table-simple" class="display">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Slug</th>
                    <th>Categories</th>
                    <th>brand</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
      @if($products->count() > 0)
      @foreach($products as $product)
                  <tr>
                     <td>{{$product->name}}</td>
                       <td><img src="{{asset('uploads/'.$product->image)}}" alt="{{$product->title}}" class="img-responsive" height="50"/></td>
                     <td>${{$product->price}}</td>
                    <td>{{$product->slug}}</td>
                     <td>
          @if($product->categories()->count() > 0)
          @foreach($product->categories as $children)
          {{$children->category}},
          @endforeach
          @else
          <strong>{{"product"}}</strong>
          @endif
        </td>
        <td>
          
          {{$product->brand->brand}}
         
        </td>
        
              <td><a type="button" id="dltProduct" data-id="{{$product->id}}" class="btn-floating mb-1 waves-effect waves-light red ">
                      <i class="material-icons">delete</i>
                </a>  
          <a class="btn-floating mb-1 waves-effect waves-light green " href="{{route('admin.product.edit',$product->id)}}" id="editProduct">
            <i class="material-icons">edit</i>
          </a></td>
                  </tr>
       @endforeach
      @else
      <tr>
        <td colspan="7" class="alert alert-info">No products Found..</td>
      </tr>
      @endif

                </tbody>
                <tfoot>
                  <tr>
                     <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Slug</th>
                    <th>Categories</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
              {{$products->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('scripts')
<script type="text/javascript">
      $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
$(document).ready(function(){
   $("#dltProduct").on('click',function(e){
    e.preventDefault();
    var id = $(this).data("id");
    alert(id);
      $.ajax({
        type: 'Delete',
        url: "/admin/product/"+id,
        data: {
          "id": id,
               
        },

        dataType: 'json',
        success:function(data){
           if($.isEmptyObject(data.id)){
                         swal({
                         title: data.success,
                          icon: 'success'
                        })
                    }else{
                         swal({
                         title: data.error,
                          icon: 'error'
                        })
                    }
                    
        }
      });

    });
   function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
});
</script>
@endsection