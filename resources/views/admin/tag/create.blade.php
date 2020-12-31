@extends('admin.layouts.master')

@section('content')
<div class="col s12 m12 l12">
      <div id="Form-advance" class="card card card-default scrollspy">
        <div class="card-content">
        
          @if(isset($tag))
          <h4 class="card-title">Update Tag</h4>
          @else
          <h4 class="card-title">Add Tag</h4>
          @endif
          <form id="tagForm">
           @csrf
           @if(isset($tag))
           <input type="hidden" name="id" value="{{$tag->id}}">
           @endif
            <div class="row">
              <div class="input-field col s12">
                <input id="tag" type="text" name="tag" @if(isset($tag)) value="{{$tag->name}}"@endif>

                <label for="tag">Enter Tag</label>
              </div>
            </div>
            <div class="row">
             @if(isset($tag))
              <button id="update_btn" data-id="{{$tag->id}}"   class="waves-effect waves-light btn mb-1 mr-1" >Update</button>
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
	$("#add_btn").on('click',function(e){
		e.preventDefault();
		var data = $("#tagForm").serialize();
		$.ajax({
			type: 'POST',
			url: "{{route('admin.tag.store')}}",
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
  $("#update_btn").on('click',function(e){
    e.preventDefault();
   
    
    var data = $("#tagForm").serialize();
     var id = $(this).data("id");
    $.ajax({
      type: 'PUT',

      url: "/admin/tag/"+id+"/update",
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