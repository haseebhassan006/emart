@extends('admin.layouts.master')

@section('content')



 <div class="row">
      <div class="col s12">
         <ul class="collapsible collapsible-accordion">
            <li>
               <div class="collapsible-header"><i class="material-icons">adjust</i> Add Country</div>
               <div class="collapsible-body">
                  <p>
                      <div class="row">
    <div class="col s12">
      <div id="basic-form" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Add Country</h4>
          <form id="countryForm">
          	{{csrf_field()}}
            <div class="row">
              <div class="input-field col s12">
                <input name="country" type="text" id="fn">
                <label for="fn">Name</label>
              </div>
            </div>
           
         
            <div class="row">
             
              <div class="row">
                <div class="input-field col s12">
                  <button id="countryBtn" class="btn cyan waves-effect waves-light right" type="button">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
                  </p>
               </div>
            </li>
            <li>
               <div class="collapsible-header"><i class="material-icons">adjust</i> Add State</div>
               <div class="collapsible-body">
                  <p>
                               <div class="row">
    <div class="col s12">
      <div id="basic-form" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Add Country</h4>
          <form id="stateForm">
          	{{csrf_field()}}
            <div class="row">
              <div class="input-field col s12">
                <input name="state" type="text" id="fn">
                <label for="fn">State</label>
              </div>
            </div>
             <div class="row">
              <div class="input-field col s12">
              	 <select name="country_id">
                <option value="" disabled selected>Choose your country</option>
                @if(isset($country))
                @foreach($country as $country)
                <option value="{{$country->id}}">{{$country->country}}</option>
                @endforeach
                @endif
             
              </select>
              <label>Country</label>
               </div>
            </div>
           
         
            <div class="row">
             
              <div class="row">
                <div class="input-field col s12">
                  <button id="stateBtn" class="btn cyan waves-effect waves-light right" type="button">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
                  </p>
               </div>
            </li>
            <li>
               <div class="collapsible-header"><i class="material-icons">adjust</i> Add City</div>
               <div class="collapsible-body">
                  <p>
                                       <div class="row">
    <div class="col s12">
      <div id="basic-form" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Add City</h4>
          <form id="cityForm">
            {{csrf_field()}}
            <div class="row">
              <div class="input-field col s12">
                <input name="city" type="text" id="fn">
                <label for="fn">Name</label>
              </div>
            </div>
           
         
            <div class="row">
                  <div class="input-field col s12">
                 <select name="state_id">
                <option value="" disabled selected>Choose your state</option>
                @if(isset($state))
                @foreach($state as $state)
                <option value="{{$country->id}}">{{$state->state}}</option>
                @endforeach
                @endif
             
              </select>
              <label>Country</label>
               </div>
             
              <div class="row">
                <div class="input-field col s12">
                  <button id="cityBtn" class="btn cyan waves-effect waves-light right" type="button">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
                  </p>
               </div>
            </li>
             <li>
               <div class="collapsible-header"><i class="material-icons">adjust</i> Add Color</div>
               <div class="collapsible-body">
                  <p>
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                     et
                     dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                     aliquip
                     ex ea commodo consequat.
                  </p>
               </div>
            </li>
             <li>
               <div class="collapsible-header"><i class="material-icons">adjust</i> Add Size</div>
               <div class="collapsible-body">
                  <p>
                                         <div class="row">
    <div class="col s12">
      <div id="basic-form" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Add Size</h4>
          <form id="sizeForm">
            {{csrf_field()}}
        
           
         
            <div class="row">
              <select name="size">
                <option value="" disabled selected>Choose your state</option>
               
               
                <option value="XL">XL</option>
                <option value="L">L</option>
                <option value="M">M</option>
                <option value="SM">SM</option>
                <option value="XS">XS</option>
             
              </select>
              <label>Country</label>
             
              <div class="row">
                <div class="input-field col s12">
                  <button id="sizeBtn" class="btn cyan waves-effect waves-light right" type="button">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
           
                  </p>
               </div>
            </li>
         </ul>
      </div>
   </div>


@endsection
@section('scripts')
<script>

        $(document).ready(function(){
          $('.collapsible').collapsible({
            accordion:true
          });
        });
</script>
<script type="text/javascript">
	
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function(){
	$("#countryBtn").on('click',function(e){
		e.preventDefault();
		var data = $("#countryForm").serialize();
		$.ajax({
			type: 'POST',
			url: "{{route('admin.attributes.add.country')}}",
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

	$("#stateBtn").on('click',function(e){

		e.preventDefault();
		var data = $("#stateForm").serialize();
   
		$.ajax({
			type: 'POST',
			url: "{{route('admin.attributes.add.state')}}",
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

  $("#cityBtn").on('click',function(e){

    e.preventDefault();
    var data = $("#cityForm").serialize();
   
    $.ajax({
      type: 'POST',
      url: "{{route('admin.attributes.add.city')}}",
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

  $("#sizeBtn").on('click',function(e){

    e.preventDefault();
    var data = $("#sizeForm").serialize();
   
    $.ajax({
      type: 'POST',
      url: "{{route('admin.attributes.add.size')}}",
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
});
</script>
@endsection