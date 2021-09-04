<header class="page-topbar" id="header">
      <div class="navbar navbar-fixed"> 
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow">
          <div class="nav-wrapper">
            <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
              <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Explore Materialize" data-search="template-list">
              <ul class="search-list collection display-none"></ul>
            </div>
            <ul class="navbar-list right">

             
              <li class="hide-on-large-only search-input-wrapper"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
              
              <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="{{asset('asset/admin/app-assets/images/avatar/avatar-7.png')}}" alt="avatar"><i></i></span></a></li>
              
            </ul>
            <!-- translation-button-->
        
            <!-- notifications-dropdown-->
         
            <!-- profile-dropdown-->
            <ul class="dropdown-content" id="profile-dropdown">

              <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li>
              
              <li><a class="grey-text text-darken-1" href="#" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();"><i class="material-icons">keyboard_tab</i> Logout</a>
                  <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                  </form>
              </li>
            </ul>
          </div>
          <nav class="display-none search-sm">
            <div class="nav-wrapper">
              <form id="navbarForm">
                <div class="input-field search-input-sm">
                  <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">
                  <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                  <ul class="search-list collection search-list-sm display-none"></ul>
                </div>
              </form>
            </div>
          </nav>
        </nav>
      </div>
    </header>
    <!-- END: Header-->
 
    <ul class="display-none" id="search-not-found">
      <li class="auto-suggestion"><a class="collection-item display-flex align-items-center" href="#"><span class="material-icons">error_outline</span><span class="member-info">No results found.</span></a></li>
    </ul>



    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down" src="{{asset('asset/admin/app-assets/images/logo/materialize-logo-color.png')}}" alt="materialize logo"/><img class="show-on-medium-and-down hide-on-med-and-up" src="{{asset('asset/admin/app-assets/images/logo/materialize-logo.png')}}" alt="materialize logo"/><span class="logo-text hide-on-med-and-down">Materialize</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="active bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
          <div class="collapsible-body">
          
          </div>
        </li>
       
       
        </li>
      

        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">content_paste</i><span class="menu-title" data-i18n="Pages">Category</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{route('admin.category.create')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Contact">Add Category</span></a>
              </li>
              <li><a href="{{route('admin.category.index')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Blog">Category List</span></a>
              </li>
          
            
            </ul>
          </div>
        </li>
             <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">content_paste</i><span class="menu-title" data-i18n="Pages">Brands</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{route('admin.brand.create')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Contact">Add Category</span></a>
              </li>
              <li><a href="{{route('admin.brand.index')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Blog">Category List</span></a>
              </li>

             
            
            </ul>
          </div>
        </li>
          <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">content_paste</i><span class="menu-title" data-i18n="Pages">Tags</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{route('admin.tag.create')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Contact">Add Tag</span></a>
              </li>
              <li><a href="{{route('admin.tag.index')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Blog">Tag List</span></a>
              </li>
          </ul>
        </div>
       
              <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">content_paste</i><span class="menu-title" data-i18n="Pages">Products</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{route('admin.product.create')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Contact">Add Product</span></a>
              </li>
              <li><a href="{{route('admin.product.index')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Blog">Product List</span></a>
              </li>

             
            
            </ul>
          </div>
        </li>
    
     
       
          </div>
        </li>
         <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">content_paste</i><span class="menu-title" data-i18n="Pages">Attributes</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{route('admin.attributes.create')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Contact">Add Attribiutes</span></a>
              </li>
              <li><a href="{{route('admin.attributes.index')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Blog">Product List</span></a>
              </li>

             
            
            </ul>
          </div>
        </li>
    
     
       
          </div>
        </li>
    
  
   


     

      </ul>
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
       
        <div class="col s12">
          <div class="container">
            <div class="section">