@extends('admin.layouts.master')

@section('content')

<div class="container">
	<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title">Brands List
          </h4>
          <div class="row">
            <div class="col s12">
              <div id="multi-select_wrapper" class="dataTables_wrapper">
              	<div class="dataTables_length" id="multi-select_length">
              		<label>
              		 <select name="multi-select_length" aria-controls="multi-select" class="">
              		 	<option value="10">10</option>
              		 	<option value="25">25</option>
              		 	<option value="50">50</option>
              		 	<option value="100">100</option>
              		 </select></label>
              		</div>
              	<table id="multi-select" class="display dataTable dtr-inline" role="grid" style="width: 665px;">
                <thead>
                  <tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 69px;">
                      <label>
                        <input type="checkbox" class="select-all">
                        <span></span>
                      </label>
                    </th>
                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 121px;">Brand
                    </th>
                     <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 121px;">Image
                    </th>
                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 69px;">Action</th>
                   
                </tr>
                </thead>
                <tbody>
                  @foreach($brands as $brand)
                <tr role="row" class="odd">
                    <td tabindex="0">
                      <label>
                        <input type="checkbox">
                        <span></span>
                      </label>
                    </td>
                    <td>{{$brand->brand}}</td>
                    
                    <td>{{$brand->image}}</td>
                    <td><button data-id="{{$brand->id}}" id="dltCategory" class=" btn waves-effect waves-light red lightrn-1">Delete</button>|<a  href="{{route('admin.brand.edit',$brand->id)}}" id="editCategory" class="btn waves-effect waves-light green lightrn-1">Edit</a></td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                  </tr> 
                  @endforeach                 
              </tbody>
                <tfoot>
                  <tr><th rowspan="1" colspan="1"></th><th rowspan="1" colspan="1">Brand</th><th rowspan="1" colspan="1">Action</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                </tfoot>
              </table>
              <div class="dataTables_paginate paging_simple_numbers" id="multi-select_paginate"></div>
            </div>
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
   $("#dltCategory").on('click',function(e){
    e.preventDefault();
    var id = $(this).data("id");
      $.ajax({
        type: 'Delete',
        url: "/admin/brand/"+id,
        data: {
          "id": id,
               
        },

        dataType: 'json',
        success:function(data){
           if($.isEmptyObject(data.error)){
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