<nav class="navbar sticky-top shadow" style="background-color: white" >
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/images/logo/logo-text.png') }}" alt="SMKN 69" width="300" height="80">
      </a>

      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/profile') }}">Profiles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/discussion') }}">Discussions</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ url('/disscussion') }}">About Us</a>
        </li> --}}

        @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      {{-- @if (Auth::user()->profile)
                      <a class="dropdown-item" href="{{ route('profile.show',Auth::user()->profile->id) }}">Profile</a>
                      @else
                      <a class="dropdown-item" href="{{ route('profile.create') }}">Profile</a>
                      @endif --}}
                      
                      <a class="dropdown-item" href="{{ route('account.show', Auth::user()->id) }}">My Account</a>
                      
                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
      </ul>
    </div>
</nav>

  