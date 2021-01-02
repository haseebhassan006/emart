@extends('admin.layouts.master')

@section('content')

<div class="col s12 m12 l12">
      <div id="Form-advance" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Update Product</h4>
          <form id="productForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="productId" value="{{$product->id}}" name="id">
               <div class="row">
                <div class="input-field col m6 s12">
                   <input oninput="genSlug()" name="name" id="name" type="text" value="{{$product->name}}">
                    <label for="first_name01">Product Name</label>
                       <p class="small">{{config('app.url')}}/<span id="url">{{$product->slug}}</span></p>
                    <input id="string"  name="slug" type="hidden" value="{{$product->slug}}" class="validate">

                </div>
                <?php
               $id = array_pluck($product->categories->toArray(), 'id');
              
               ?>
                <div class="input-field col m6 s12">
        
                   <select name="category_id[]" class="select2 browser-default" multiple="multiple">
                   
                      @foreach($categories as $category)
                    
                             <option value="{{$category->id}}">{{$category->category}}</option>
                      @endforeach
 
                    </select>
                    <label>Category</label>
                </div>
               </div>
                <div class="row">
                   <div class="col s12">
                     <input type="text" name="description" value="{{$product->description}}">
                <label>Description</label>
                   </div>
                </div>

                <div class="row">
                   <div class="input-field col m6 s12">
                               <select name="brand_id" class="select2 browser-default">
                    @foreach($brands as $brand)
    <option value="{{$brand->id}}">{{$brand->brand}}</option>
     @endforeach
 
  </select>
    <label>Brand</label>
                   </div>
                   <div class="input-field col m6 s12">
                       <select name="tag_id" class="select2 browser-default" multiple="multiple">
                    @foreach($tags as $tag)
                             <option value="{{$tag->id}}">{{$tag->name}}</option>
                         @endforeach     
                          
                    </select>
                    <label>Tag</label>
                   </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                     <input  name="price" id="price" type="number" value="{{$product->price}}">
                <label for="first_name01">Price</label>
                  </div>
                    <div class="input-field col m6 s12">
                <input name="discount_percent" id="percent" oninput="calculate_percent()" type="number" value="{{$product->discount_percent}}">
                <label for="">Discount Percent</label>
              </div>
                </div>
                <div class="row">
                   <div class="input-field col m6 s12">
                <input name="discount" id="dis_amount" type="text" readonly>
                <label for="">Discount In Rs</label>
              </div>
                <div class="input-field col m6 s12">
                <input name="" id="total_amount" type="text" readonly>
                <label for="">Price After Discount</label>
              </div>
                </div>
                 <div class="row">
                    <div class="input-field col m6 s12">
                <input name="quantity" id="first_name01" value="{{$product->quantity}}" type="text">
                <label for="first_name01">Quantity</label>
              </div>
              <div class="input-field col m6 s12">
                           <select name="status" class="select2 browser-default">
    <option value="0">pendding</option>
    <option value="1">approved</option>
   
  </select>
              </div>
            
              </div>
                 </div>
                 <div class="row">
                   <div class="col s12 m4 l3">
       <label>Upload Image</label>
      </div>
      <div class="col s12 m8 l9">
        <input type="file" name="thumbnail">

        <img src="{{asset('uploads/'.$product->image)}}" alt="{{$product->title}}" class="img-responsive" height="50"/>
   
 
         </div>
                 </div>
                 <div class="row">
                <div class="input-field col s12">
                     <button id="add_btn" class="btn cyan waves-effect waves-light right" >Submit
                    <i class="material-icons right">send</i>
                  </button>
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

   id = $("#productId").val();

    $.ajax({
      type: 'POST',
       url: "/admin/product/"+id+"/update",
      data: formData,
      processData: false,
contentType: false,
      dataType: 'json',
      success:function(data){
        console.log(data);
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