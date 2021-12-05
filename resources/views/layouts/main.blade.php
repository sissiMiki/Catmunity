<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle',config('app.name'.'Catmunity'))</title>
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="/js/toastr/build/toastr.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>


    @php( $blade_currentRouteName = Route::currentRouteName() )

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Catmunity</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              @guest
              <li class="nav-item">
                <a class="nav-link {{ Str::startsWith($blade_currentRouteName, 'profile') ? 'active' : '' }}" aria-current="page" href="{{ route('/') }}">profile</a>
              </li>
              @endguest

              @auth
              @can('usergate')

              <li class="nav-item">
                <a class="nav-link {{ Str::startsWith($blade_currentRouteName, 'search') ? 'active' : '' }}" aria-current="page" href="{{ route('/') }}">search</a>
              </li>

                <li class="nav-item">
                  <a class="nav-link {{ Str::startsWith($blade_currentRouteName, 'cat') ? 'active' : '' }}" aria-current="page" href="{{ route('/') }}">cat</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link {{ Str::startsWith($blade_currentRouteName, 'services') ? 'active' : '' }}" href="{{ route('mitarbeiter.index') }}">services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Str::startsWith($blade_currentRouteName, 'about us') ? 'active' : '' }}" href="{{ route('/') }}">about us</a>
                </li>
              @endcan
              @can('admingate')
                <li class="nav-item">
                  <a class="nav-link {{ Str::startsWith($blade_currentRouteName, 'user') ? 'active' : '' }}" href="{{ route('user.index') }}">User</a>
                </li>
              @endcan
              @can('admingate')
                <li class="nav-item">
                  <a class="nav-link {{ Str::startsWith($blade_currentRouteName, 'role') ? 'active' : '' }}" href="{{ route('role.index') }}">Rolle</a>
                </li>
              @endcan
              @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
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
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('user.edit')}}">{{ Auth::user()->name }}</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </div>
    </nav>
    <div id="wrapper" class="container-fluid">
        @yield('content')
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="deleteModalBody"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">abbrechen</button>
            <button type="button" class="btn btn-danger">löschen</button>
          </div>
        </div>
      </div>
    </div>

    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/toastr/build/toastr.min.js"></script>
    <script src="/js/script.js"></script>
    <script>
      "use strict";
      (function($){
        $(document).ready(function(){
            @yield('javascript','')
        });
      })(jQuery);
    </script>
</body>
</html>
