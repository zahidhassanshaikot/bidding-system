<aside class="left-panel">
    <nav class="navbar">
      <ul class="navbar-nav">

        <li class="nav-item dropdown active">
        <a class="nav-link" href="{{ route('dashboard') }}">
             <i class="fa fa-tachometer"></i><span class="menu-title">Dashboard</span>
          </a>
        </li>

        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('add-product')}}" role="button">
            <i class="fa fa-plus"></i> <span class="menu-title">Add Product</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('all-product')}}" role="button">
            <i class="fa fa-list"></i> <span class="menu-title">All Product</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('all-order')}}" role="button">
            <i class="fa fa-list"></i> <span class="menu-title">All Orders</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" href="{{route('monthly-sell-product')}}" role="button">
            <i class="fa fa-calendar"></i> <span class="menu-title">Monthly Sell Product</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link"href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" role="button">
            <i class="fa fa-power-off"></i> <span class="menu-title">Logout</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </li>

      </ul>
    </nav>
  </aside>