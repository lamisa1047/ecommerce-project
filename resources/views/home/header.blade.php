<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand" href="index.html">
      <span>Giftos</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.html">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="why.html">Why Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="testimonial.html">Testimonial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact Us</a>
        </li>
      </ul>

      @if(Route::has('login'))
      <div class="user_option">
        @auth
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-dropdown-link>
        </form>
        <a href="">
          <i class="fa fa-shopping-bag" aria-hidden="true"><sup>{{$count}}</sup></i>
        </a>
        @else
        <a href="{{ url('/login') }}">
          <i class="fa fa-user" aria-hidden="true"></i>
          <span>Login</span>
        </a>
        <a href="{{ url('/register') }}">
          <i class="fa fa-user" aria-hidden="true"></i>
          <span>Register</span>
        </a>
        @endauth
      </div>
      @endif
    </div>
  </nav>
</header>