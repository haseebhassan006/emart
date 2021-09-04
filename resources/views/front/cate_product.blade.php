@extends('front.layout')
@section('content') 

  
@include('front.partials.slider')

@include('front.partials.sidebar')

<div class="col s12 m12 l9 pr-0">

@foreach($category as $value)
   @foreach($value->products as $product)
      <div class="col s12 m4 l4">
        <div class="card animate fadeLeft">
          <div class="card-badge"><a class="white-text"> <b>{{$product->discount_percent}}</b> </a></div>
          <div class="card-content">
            <p>{{$product->name}}</p>
            <span class="card-title text-ellipsis">{{$product->discription}}</span>
            <img src="{{asset('asset/admin/app-assets/images/cards/watch-2.png')}}" class="responsive-img" alt="">
            <div class="display-flex flex-wrap justify-content-center">
              <h5 class="mt-3">${{$product->price}}</h5>
              <a class="mt-2 waves-effect waves-light gradient-45deg-deep-purple-blue btn btn-block modal-trigger z-depth-4"
                href="#modal{{$product->id}}">View</a>
            </div>
          </div>
        </div>
        <!-- Modal Structure -->
      
      </div>
      @endforeach
  @endforeach
     <!-- <div class="col s12 m4 l4">
        <div class="card animate fadeUp">
          <div class="card-content">
            <p>Headphone</p>
            <span class="card-title text-ellipsis">Purple Solo 2 Wireless</span>
            <img src="{{asset('asset/admin/app-assets/images/cards/headphone.png')}}" class="responsive-img" alt="">
            <div class="display-flex flex-wrap justify-content-center">
              <h5 class="mt-3">$249.00</h5>
              <a class="mt-2 waves-effect waves-light gradient-45deg-deep-purple-blue btn btn-block modal-trigger z-depth-4"
                href="#modal2">View</a>
            </div>
          </div>
        </div>-->

        <!-- Modal Structure -->
      
      </div>
      <!--<div class="col s12 m4 l4">
        <div class="card animate fadeRight">
          <div class="card-content">
            <p>Smartphone</p>
            <span class="card-title">iPhone x</span>
            <img src="{{asset('asset/admin/app-assets/images/cards/iphone-x.png')}}" class="responsive-img" alt="">
            <div class="display-flex flex-wrap justify-content-center">
              <h5 class="mt-3">$899.00</h5>
              <a class="mt-2 waves-effect waves-light gradient-45deg-deep-purple-blue btn btn-block modal-trigger z-depth-4"
                href="#modal3">View</a>
            </div>
          </div>
        </div>-->
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
          <div class="modal-content pt-2">
            <div class="row" id="product-one">
              <div class="col s12">
                <a class="modal-close right"><i class="material-icons">close</i></a>
              </div>
              <div class="col m6 s12">
                <img src="{{asset('asset/admin/app-assets/images/cards/watch-2.png')}}" class="responsive-img" alt="">
              </div>
              <div class="col m6 s12">
                <p>Smartwatches</p>
                <h5>Smartwatch 2.0 LTE Wifi</h5>
                <span class="new badge left ml-0 mr-2" data-badge-caption="">4.2 Star</span>
                <p>Availability: <span class="green-text">36 Item Available</span></p>
                <hr class="mb-5">
                <span class="vertical-align-top mr-4"><i class="material-icons mr-3">favorite_border</i>Wishlist</span>
                <ul class="list-bullet">
                  <li class="list-item-bullet">Accept SIM card and call</li>
                  <li class="list-item-bullet">Make calling instead of mobile phone</li>
                  <li class="list-item-bullet">Sync music play and sync control music</li>
                  <li class="list-item-bullet">Sync Facebook,Twiter,emailand calendar</li>
                </ul>
                <h5>$<span>399.00</span></h5>
                <a class="waves-effect waves-light btn gradient-45deg-deep-purple-blue mt-2 mr-2 btnAdd">ADD TO CART</a>
                <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange mt-2">BUY NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
          <!--<div id="modal2" class="modal">
          <div class="modal-content">
            <a class="modal-close right"><i class="material-icons">close</i></a>
            <div class="row" id="product-two">
              <div class="col m6 s12">
                <img src="../../../app-assets/images/cards/headphone.png" class="responsive-img" alt="">
              </div>
              <div class="col m6 s12">
                <p>Headphone</p>
                <h5>Purple Solo 2 Wireless</h5>
                <span class="new badge left ml-0 mr-2" data-badge-caption="">4.2 Star</span>
                <p>Availability: <span class="red-text">Out of stock</span></p>
                <hr class="mb-5">
                <span class="vertical-align-top mr-4"><i class="material-icons mr-3">favorite_border</i>Wishlist</span>
                <ul class="list-bullet">
                  <li class="list-item-bullet">Fine-tuned acoustics for clarity</li>
                  <li class="list-item-bullet">Streamlined design for a custom-fit</li>
                  <li class="list-item-bullet">Durable and foldable so you can take them on-the-go</li>
                  <li class="list-item-bullet">ake calls and control music with RemoteTalk cable</li>
                </ul>
                <h5>$<span>249.00</span></h5>
                <a class="waves-effect waves-light btn gradient-45deg-deep-purple-blue mt-2 mr-2 btnAdd">ADD TO CART</a>
                <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange mt-2">BUY NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>-->
       <!-- Modal Structure -->
       <!-- <div id="modal3" class="modal">
          <div class="modal-content">
            <a class="modal-close right"><i class="material-icons">close</i></a>
            <div class="row" id="product-three">
              <div class="col m6 s12">
                <img src="../../../app-assets/images/cards/iphone-x.png" class="responsive-img" alt="">
              </div>
              <div class="col m6 s12">
                <p>Smartphone</p>
                <h5>iPhone x</h5>
                <span class="new badge left ml-0 mr-2" data-badge-caption="">4.2 Star</span>
                <p>Availability: <span class="green-text">Available</span></p>
                <hr class="mb-5">
                <span class="vertical-align-top mr-4"><i class="material-icons mr-3">favorite_border</i>Wishlist</span>
                <ul class="list-bullet">
                  <li class="list-item-bullet">Accept SIM card and call</li>
                  <li class="list-item-bullet">Take photos</li>
                  <li class="list-item-bullet">Make calling instead of mobile phone</li>
                  <li class="list-item-bullet">Sync music play and sync control music</li>
                  <li class="list-item-bullet">Sync Facebook,Twiter,emailand calendar</li>
                </ul>
                <h5>$<span>899.00</span></h5>
                <a class="waves-effect waves-light btn gradient-45deg-deep-purple-blue mt-2 mr-2 btnAdd">ADD TO CART</a>
                <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange mt-2">BUY NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>-->

     
    
        
      
      
        
      </div>
      <!-- Pagination -->
      <div class="col s12 center">
        <ul class="pagination">
          <li class="disabled">
            <a href="#!">
              <i class="material-icons">chevron_left</i>
            </a>
          </li>
          <li class="active"><a href="#!">1</a>
          </li>
          <li class="waves-effect"><a href="#!">2</a>
          </li>
          <li class="waves-effect"><a href="#!">3</a>
          </li>
          <li class="waves-effect"><a href="#!">4</a>
          </li>
          <li class="waves-effect"><a href="#!">5</a>
          </li>
          <li class="waves-effect">
            <a href="#!">
              <i class="material-icons">chevron_right</i>
            </a>
          </li>
        </ul>
      </div>
    </div>
</div>


        
@endsection
@section('scripts')
<script type="text/javascript">
  
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems, options);
  });

</script>
<script type="text/javascript">
  var btnAdd = document.getElementsByClassName('btnAdd');
   console.log(btnAdd)
    let items = [];

  for(let i=0; i<btnAdd.length;i++){

    btnAdd[i].addEventListener('click',function(e){
    
    
   
  if (typeof(Storage) !== 'undefined') {
              
        let item = {
          id:i+1,
          name:e.target.parentElement.children[0].textContent,
          price:e.target.parentElement.children[7].children[0].textContent,
          quantity:1,
        };
       
               if (JSON.parse(localStorage.getItem("items")) === null) {
                items.push(item)

                localStorage.setItem("items",JSON.stringify(items))
                window.location.reload();
              
               }else{

                var localItems = JSON.parse(localStorage.getItem("items"));

                console.log(localItems)
                localItems.map(data=>{
                  if (item.id == data.id) {
                    item.quantity = data.quantity+1;
                    
                  }else{
                    items.push(data)
                  }
                })
                items.push(item);
                localStorage.setItem("items",JSON.stringify(items));
                window.location.reload()


               
               }
        


      }
      

  

  })


    const cartCount = document.getElementById('count');

    let quantity = 0;
    let t_price = 0
    JSON.parse(localStorage.getItem('items')).map(data=>{
      quantity = +quantity+data.quantity;
    });

    cartCount.innerHTML = quantity;


    const cartBox = document.getElementById('cartTable');
    var grandTotal = document.getElementById('grandTotal');
    let tableData = ''
    tableData += '<tr><th>Name</th><th>Price</th><th>T.Price</th><th>Quantity</th><th>Action</th></tr>';
    if (JSON.parse(localStorage.getItem('items')) === null) {
      tableData += '<tr><td>No Product Added To Cart</td></tr>'
    }else{
      JSON.parse(localStorage.getItem('items')).map(data=>{
        tableData += '<tr><td>'+data.name+'</td><td>'+data.price+'</td><td class="total_price">'+parseInt(data.price)*parseInt(data.quantity)+'</td><td>'+data.quantity+'</td><td><a class="btn red"><i class="material-icons">delete</i></a></td></tr>'
        grandTotal.innerHTML = parseInt(t_price + data.price);
      })
    }
    cartBox.innerHTML = tableData;

   
}
</script>
@endsection
