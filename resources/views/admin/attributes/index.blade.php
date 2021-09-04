 @extends('admin.layouts.master')

@section('content')

 <div class="row">
      <div class="col s12">
         <ul class="collapsible collapsible-accordion">
            <li>
               <div class="collapsible-header"><i class="material-icons">mic_none</i> First Header</div>
               <div class="collapsible-body">
                  <p>
                     <table>
                           <thead>
    <tr>
      <th>Name</th>
      <th>Item Name</th>
      <th>Item Price</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>Alvin</td>
      <td>Eclair</td>
      <td>$0.87</td>
    </tr>
    <tr>
      <td>Alan</td>
      <td>Jellybean</td>
      <td>$3.76</td>
    </tr>
    <tr>
      <td>Jonathan</td>
      <td>Lollipop</td>
      <td>$7.00</td>
    </tr>
    </tbody>
  </table>
  


                  </p>
               </div>
            </li>
            <li>
               <div class="collapsible-header"><i class="material-icons">cloud_queue</i> Second Header</div>
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
               <div class="collapsible-header"><i class="material-icons">adjust</i> Third Header</div>
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
         </ul>
      </div>
   </div>
@endsection