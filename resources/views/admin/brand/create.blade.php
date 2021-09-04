@extends('admin.layouts.master')

@section('content')
<div class="col s12 m12 l12">
      <div id="Form-advance" class="card card card-default scrollspy">
        <div class="card-content">
          @if(isset($brand))
          <h4 class="card-title">Update Brand</h4>
          @else
          <h4 class="card-title">Add Brand</h4>
          @endif
          <form id="brandForm" enctype="multipart/form-data">
           @csrf
           @if(isset($brand))
           <input type="hidden" name="id" value="{{$brand->id}}">
           @endif
            <div class="row">
              <div class="input-field col s12">
                <input id="brand" type="text" name="brand" @if(isset($brand)) value="{{$brand->brand}}"@endif>

                <label for="brand">Brand</label>
              </div>
            </div>
             <div class="row">
              <div class="input-field col s12">
                <input  type="file" name="image">
                <span id="image-input-error"></span>

                <label for="brand">Upload Image</label>
              </div>
            </div>
            <div class="row">
             @if(isset($brand))
              <button id="update_btn" type="submit" data-id="{{$brand->id}}"   class="waves-effect waves-light btn mb-1 mr-1" >Update</button>
             @else
            <button id="add_btn"  class="waves-effect waves-light btn mb-1 mr-1" >Add</button>
            @endif
           
            </div>
          
           
           
          </form>
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
});

$(document).ready(function(){
	$("#brandForm").on('submit',function(e){
		e.preventDefault();
		let formData = new FormData(this);
    
   
		$.ajax({
			type: 'POST',
			url: "{{route('admin.brand.store')}}",
			data: formData,
      processData: false,
      contentType: false,
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
  $("#update_btn").on('click',function(e){
    e.preventDefault();
   
    
    var data = $("#brandForm").serialize();
     var id = $(this).data("id");
    $.ajax({
      type: 'PUT',

      url: "/admin/brand/"+id+"/update",
      data: data,
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