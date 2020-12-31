@extends('admin.layouts.master')

@section('content')
<div class="container">
	<div class="row">
  <div class="col s12">
    <div id="input-fields" class="card card-tabs">
      <div class="card-content">
        <div class="card-title">
          <div class="row">
            <div class="col s12 m6 l10">

            @if(isset($category))
              <h4 class="card-title">Update Category</h4>
            @endif
           
              <h4 class="card-title">Create Category</h4>
              
                <a class="waves-effect waves-light  btn" href="{{route('admin.category.index')}}">Categories</a>
          
               <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

              <form id="categoryForm" class="row" >
                @csrf

                <div class="col s12">
                  <div class="input-field col s12">
                    <input placeholder="Categor Name" id="name" name="category" type="text" value="@if(isset($category)){{$category->category}}@endif" class="validate" oninput="genSlug()">
                    <label for="first_name1" class="active">Name</label>
                  </div>
                    <div class="input-field col s12">
                    <p class="small">{{config('app.url')}}/<span id="url">{{@$category->slug}}</span></p>
                    <input id="string"  name="slug" type="hidden" value="{{@$category->slug}}" class="validate">
                    
                  </div>
               <div class="input-field col s12">

              <div class="select-wrapper">

                @php 
               $ids = (isset($category->parents) && $category->parents->count() > 0 ) ? 

               array_pluck($category->parents, 'id') : null
               @endphp
                <select name="parent_id[]" class="select2 browser-default" multiple="multiple">

                  @if(isset($categories))
                  <option value="0">Top Level</option>
                @foreach($categories as $cat)
                <option value="{{$cat->id}}" @if(!is_null($ids) && in_array($cat->id, $ids)) {{'selected'}} @endif>{{$cat->category}}</option>
                @endforeach
                @endif
    
              

           
              </select></div>
              <label>Parent Category</label>
            </div>

                </div>
                <div class="input-field col s12">
                 
                @if(isset($category))
                <button id="update_btn" data-id="{{$category->id}}"  class="waves-effect waves-light btn mb-1 mr-1" type="">Update</button>
             

              
              @else
                  <button id="add_btn"  class="waves-effect waves-light btn mb-1 mr-1" type="">Add</button>
               @endif
                  
                </div>
                
             
              </form>
            </div>
         
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
  function genSlug(){

    var string = document.getElementById('name').value;
    var converted = string.toLowerCase();
    var result = converted.replace(/ /g, "-");
  
    document.getElementById('url').innerHTML = result;

    document.getElementById('string').value = result;
  



  }
</script>
<script type="text/javascript">
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
})
$(document).ready(function(){
      
    $("#add_btn").on('click',function(e){
      e.preventDefault();
      var data = $("#categoryForm").serialize();

      $.ajax({
        type: 'POST',
        url: "{{route('admin.category.store')}}",
        data: data,

        dataType: 'json',
        success:function(data){
           if($.isEmptyObject(data.error)){
                       swal({
                           title: 'Record Added',
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
      
      var data = $("#categoryForm").serialize();
      var id = $(this).data("id");
      
      $.ajax({
        type: 'POST',
        url: "/admin/category/update/"+id,
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
                          icon: 'success'
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