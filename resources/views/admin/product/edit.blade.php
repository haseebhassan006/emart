@extends('admin.layouts.master')

@section('content')

<div class="col s12 m12 l12">
      <div id="Form-advance" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Update Product</h4>
          <form id="productForm" enctype="multipart/form-data">
            @csrf
               <div class="row">
                <div class="input-field col m6 s12">
                   <input oninput="genSlug()" name="name" id="name" type="text" value="{{$product->name}}">
                    <label for="first_name01">Product Name</label>
                       <p class="small">{{config('app.url')}}/<span id="url">{{$product->slug}}</span></p>
                    <input id="string"  name="slug" type="hidden" value="" class="validate">

                </div>
                <?php
               $id = array_pluck($product->categories->toArray(), 'id');
              
               ?>
                <div class="input-field col m6 s12">
        
                   <select name="category_id[]" class="select2 browser-default" multiple="multiple">
                   
                         
 
                    </select>
                    <label>Category</label>
                </div>
               </div>
              
                              
                
                 

          </form>
          </div>
        </div>
      </div>
@endsection
@section('scripts')

<script type="text/javascript">
  $(".select2").select2({
    dropdownAutoWidth: true,
    width: '100%'
});






function calculate_percent(){
  var price = document.getElementById('price').value;


  var percentage = document.getElementById('percent').value;

   var percent_amount = (percentage/100)*price;
   var Total_amount = price - percent_amount ;

   document.getElementById('dis_amount').value = percent_amount;
   document.getElementById('total_amount').value = Total_amount;
 
 


 }

  function genSlug(){

    var string = document.getElementById('name').value;
    var result = string.replace(/ /g, "-");
  
    document.getElementById('url').innerHTML = result;

    document.getElementById('string').value = result;
  



  }





</script>
<script type="text/javascript">
      $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function(){
    $("#productForm").on('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
   

    $.ajax({
      type: 'POST',
      url: "{{route('admin.product.store')}}",
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

});
</script>
@endsection