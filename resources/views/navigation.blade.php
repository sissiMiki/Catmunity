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

    </ul>
</div>
