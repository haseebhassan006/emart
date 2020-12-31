      <footer class="page-footer" style="background-color: black; ">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Contact</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright" style>
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
   <script src="{{asset('asset/admin/app-assets/js/vendors.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('asset/admin/app-assets/vendors/noUiSlider/nouislider.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{asset('asset/admin/app-assets/js/plugins.js')}}"></script>
    <script src="{{asset('asset/admin/app-assets/js/search.js')}}"></script>
    <script src="{{asset('asset/admin/app-assets/js/custom/custom-script.js')}}"></script>
    <script src="{{asset('asset/admin/app-assets/js/scripts/customizer.js')}}"></script>
    <!-- END THEME  JS-->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/admin/app-assets/css/pages/eCommerce-products-page.css')}}">
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('asset/admin/app-assets/js/scripts/advance-ui-modals.js')}}"></script>
    <script src="{{asset('asset/admin/app-assets/js/scripts/eCommerce-products-page.js')}}"></script>
    <script src="{{asset('asset/admin/app-assets/js/scripts/advance-ui-carousel.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
    $('.carousel').carousel();
  });

        $(document).ready(function(){
    $('.sidenav').sidenav();
  });
    </script>
    @yield('scripts')