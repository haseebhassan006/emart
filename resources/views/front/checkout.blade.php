@extends('front.layout')
@section('content') 
<section class="invoice-edit-wrapper section">
  <div class="row">
    <!-- invoice view page -->
    <div class="col xl9 m8 s12">
      <div class="card">
        <div class="card-content px-36">
          <!-- header section -->
        
          <!-- logo and title -->
          <div class="row mb-3">
            <div class="col m6 s12 invoice-logo display-flex pt-1 push-m6">
           
            </div>
            <form action="{{route('place.order')}}" method="post" id="payment-form">
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
             <div class=" col sm4">
               
             <input type="text" name="phone" placeholder="phone">
              </div>
               <div class=" col sm4">
                
           <input type="text" name="state" placeholder="state">

              
        
              </div>
               <div class="col sm4">
             <input type="city" name="city" placeholder="city">
           
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
          </div>
          <!-- invoice subtotal -->
          <div class="invoice-subtotal">
         
          </div>
        </div>
      </div>
    </div>
    <!-- invoice action  -->
    <div class="col xl3 m4 s12">
      <div class="card invoice-action-wrapper mb-10">
        <div class="card-content">
      
          <div class="invoice-action-btn">
          <h4>Your Cart <span style="color: #fff; background-color: black; border-radius: 30px;">3</span></h4>

          </div>
          <div class="invoice-payment mb-3">
         <div class="invoice-terms display-flex flex-column">
          <div class="display-flex justify-content-between pb-2">
            <span>Product Number</span>
          <p>3</p>
            </div>
          </div>
           <div class="invoice-terms display-flex flex-column">
          <div class="display-flex justify-content-between pb-2">
            <span>Total Amount</span>
          <p>3</p>
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
    $(document).ready(function(){
      $('.dynamic').change(function(){
        if($(this).val() != ''){
             var select = $(this).attr("id");
             var value = $(this).val();
             var dependent = $(this).data('dependent');
           
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('city.country.state') }}",
              method:"POST",
              data:{select:select, value:value, _token:_token, dependent:dependent},
              success:function(result){
                console.log(result);
                console.log('#'+dependent)
                $('#'+dependent).append(result);
              }
             });
             
        }
      })
       $('#country').change(function(){
  $('#state').val('');
  $('#city').val('');
 });

 $('#state').change(function(){
  $('#city').val('');
 });

    })
  </script>
  <script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_pwVdbz0DIoAlnU90ZjesUGKM00oyOsIOY0');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
  </script>
  @endsection