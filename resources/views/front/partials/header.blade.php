  <ul id="dropdown1" class="dropdown-content">

  <li><a href="{{route('user.profile')}}">profile</a></li>
  <li><a href="#!">wishlist</a></li>

  <li class="divider"></li>
  <li>
    <a href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">logout</a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
  </li>
</ul>
    <nav class="black" style="background-color:black; padding:0px 10px;  z-index: 9999" >
  <div class="nav-wrapper">
    <a href="#" class="brand-logo"><img src="">Web Zone</a>

    <a href="#" class="sidenav-trigger" data-target="mobile-nav">
      <i class="material-icons">menu</i>
    </a>

    <ul class="right hide-on-med-and-down"  >
           <li><a class=" modal-trigger" href="#modalCart"><i class="material-icons">add_shopping_cart</i><small id="count">0</small></a>
            </li>
             @if (Route::has('login'))
        @auth
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::guard('web')->user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
      @else
      <li><a href="#modalLogin" class=" modal-trigger" >Sign</a></li>
      @if (Route::has('register'))
      <li><a href="#modalRegister" class="modal-trigger">SignUp</a></li>
      @endif

     @endauth
     @endif
    </ul>
  </div>
</nav>


<ul class="sidenav" id="mobile-nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">Video</a></li>
      <li><a href="#">Service</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
</ul>
<div id="modalCart" class="modal" style="top: 20%">
    <div class="modal-content">
      <h4>Your Shopping Detail</h4>
      <table id="cartTable"></table>
      <h6 id="grandTotal"></h6>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
  <div id="modalLogin" class="modal" style="top: 20%">
    <div class="modal-content">
      <h4>Login</h4>
     
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-radius: 16px;">
                <div class="card-header" style="    padding-left: 13px;padding-top: 13px;">{{ __('Login') }}</div>

                <div class="card-body" style="padding: 9px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

  @include('front.partials.registerModal')


   <!-- <ul id="dropdown1" class="dropdown-content">

  <li><a href="#!">profile</a></li>
  <li><a href="#!">wishlist</a></li>

  <li class="divider"></li>
  <li>
    <a href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">logout</a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
  </li>
</ul>
<nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">Logo</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="sass.html"><i class="material-icons">add_shopping_cart</i></a></li>
       @if (Route::has('login'))
        @auth
       <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::guard('web')->user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
       @else
      <li><a href="{{ route('login') }}">SignIn</a></li>
      @if (Route::has('register'))
      <li><a href="{{ route('register') }}">SignUp</a></</li>
       @endif
     @endauth
     @endif
     
      
    </ul>
  </div>
</nav>-->