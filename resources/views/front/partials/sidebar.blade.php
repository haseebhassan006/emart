<div class="row" id="ecommerce-products">
    <div class="col s12 m3 l3 pr-0 hide-on-med-and-down animate fadeLeft" style="margin-top:65px;">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Categories</span>
          <hr class="p-0 mb-10">
          <ul class="collapsible categories-collapsible">
            @foreach($categories as $category)
            <li>
              <div class="collapsible-header" tabindex="0"><a href="{{route('category.wise.product',$category->id)}}">{{$category->category}}</a> <i class="material-icons"> keyboard_arrow_right </i></div>
              <div class="collapsible-body">
                @foreach($category->children as $child)
                <p><a href="">{{$child->category}}</a></p>
                @endforeach
              
              </div>
            </li>
           <!-- <li>
              <div class="collapsible-header" tabindex="0">Tablets <i class="material-icons"> keyboard_arrow_right </i></div>
              <div class="collapsible-body">
                <p>Apple</p>
                <p>Samsung</p>
                <p>Lenovo</p>
              </div>
            </li>
            <li>
              <div class="collapsible-header" tabindex="0">Laptops <i class="material-icons"> keyboard_arrow_right </i></div>
              <div class="collapsible-body">
                <p>Apple</p>
                <p>Samsung</p>
                <p>Lenovo</p>
                <p>HP</p>
                <p>Dell</p>
              </div>
            </li>
            <li>
              <div class="collapsible-header" tabindex="0">Phone <i class="material-icons"> keyboard_arrow_right </i></div>
              <div class="collapsible-body">
                <p>Apple</p>
                <p>Samsung</p>
                <p>Lenovo</p>
                <p>Mi</p>
                <p>Nokia</p>
              </div>-->
            </li>
            @endforeach
          </ul>
          <span class="card-title mt-10">Price</span>
          <hr class="p-0 mb-10">
          <div id="price-slider" class="noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-origin" style="left: 20%;"><div class="noUi-handle noUi-handle-lower" data-handle="0" style="z-index: 5;"><div class="noUi-handle-touch-area"></div><div class="noUi-tooltip"><span>20</span></div></div></div><div class="noUi-connect" style="left: 20%; right: 20%;"></div><div class="noUi-origin" style="left: 80%;"><div class="noUi-handle noUi-handle-upper" data-handle="1" style="z-index: 4;"><div class="noUi-handle-touch-area"></div><div class="noUi-tooltip"><span>80</span></div></div></div></div></div>
          
       
          </form>
          <span class="card-title mt-10">Brand</span>
          <hr class="p-0 mb-10">
          <form action="#" class="display-grid">
            <label>
              <input type="checkbox">
              <span>Apple</span>
            </label>
            <label>
              <input type="checkbox">
              <span>Samsung</span>
            </label>
            <label>
              <input type="checkbox">
              <span>Dell</span>
            </label>
            <label>
              <input type="checkbox">
              <span>Sony</span>
            </label>
            <label>
              <input type="checkbox">
              <span>Nokia</span>
            </label>
            <label>
              <input type="checkbox">
              <span>JBL</span>
            </label>
            <label>
              <input type="checkbox">
              <span>Philips</span>
            </label>
          </form>
        
        <!--  <span class="card-title mt-10">Customer Ratings</span>
          <hr class="p-0 mb-10">
          <form action="#" class="display-grid">
            <label>
              <input type="checkbox">
              <span>
                <i class="material-icons amber-text"> star </i>
                <i class="material-icons amber-text"> star </i>
                <i class="material-icons amber-text"> star </i>
                <i class="material-icons amber-text"> star </i>
                <i class="material-icons amber-text"> star </i>
              </span>
            </label>
            <label>
              <input type="checkbox">
              <span>
                <i class="material-icons amber-text"> star </i>
                <i class="material-icons amber-text"> star </i>
                <i class="material-icons amber-text"> star </i>
                <i class="material-icons amber-text"> star </i>
              </span>
            </label>
            <label>
              <input type="checkbox">
              <span>
                <i class="material-icons amber-text"> star </i>
                <i class="material-icons amber-text"> star </i>
                <i class="material-icons amber-text"> star </i>
              </span>
            </label>
            <label>
              <input type="checkbox">
              <span>
                <i class="material-icons amber-text"> star </i>
                <i class="material-icons amber-text"> star </i>
              </span>
            </label>
            <label>
              <input type="checkbox">
              <span>
                <i class="material-icons amber-text"> star </i>
              </span>-->
            </label>
          </form>
        </div>
      </div>
    </div>