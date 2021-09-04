 <form action="{{route('place.order')}}" method="post" id="payment-form">
             @csrf
            <div class="col m6 s12 pull-m6">
              <h4 class="indigo-text">Checkout</h4>
             
            </div>
            <div class="row">
              <div class="col m12">
                <div class="col m6">
                  <input type="text" name="f-name" placeholder="First Name">
                </div>
                <div class="col m6">
                  <input type="text" name="l-name" placeholder="Last Name">
                </div>
                
              </div>

            </div>
          </div>
          <!-- invoice address and contact -->
          <div class="row mb-3">
            <div class="col  s12">
             
              <div class="input-field">
                <input type="text" name="email" placeholder="Email Address">
              </div>
              <div class="input-field">
                <textarea class="materialize-textarea" name="address" rows="4" placeholder="Address"></textarea>
              </div>
             <div class="col s12">
              <div class="col s6">
                <input type="text" name="" placeholder="state">
              </div>
              <div class="col s6">
                <input type="text" name="" placeholder="city">
              </div>
              <div class="col s4">
              
              </div>
             </div>
               
            
               <div class="">
                
           
  <input type="text" name="" placeholder="phone" id="phone-code" name="phone">
              
        
              </div>
               <div class="">
           
           
              </div>
              <div class="input-field">
                <input type="text" name="zipcode" placeholder="Zipcode">
              </div>
            </div>
          </div>
          <!-- product details table-->
          <div class="invoice-product-details mb-3">
           <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <a type="submit" class="waves-effect btn">Submit Payment</a>

            </form>