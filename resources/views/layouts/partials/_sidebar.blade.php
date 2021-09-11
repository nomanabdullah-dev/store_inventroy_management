
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{ route('dashboard') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Menus
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active':'' }}">
                  <i class="fa fa-home nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('user*') ? 'active':'' }}">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link {{ request()->is('category*') ? 'active':'' }}">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('brand.index') }}" class="nav-link {{ request()->is('brand*') ? 'active':'' }}">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('size.index') }}" class="nav-link {{ request()->is('size*') ? 'active':'' }}">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Size</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link {{ request()->is('product*') ? 'active':'' }}">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('stock') }}" class="nav-link {{ request()->is('stock') ? 'active':'' }}">
                  <i class="fa fa-cart-plus nav-icon"></i>
                  <p>Stock</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('stockHistory') }}" class="nav-link {{ request()->is('stocks/history*') ? 'active':'' }}">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Stock History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('returnProduct') }}" class="nav-link {{ request()->is('return-product') ? 'active':'' }}">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Return Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('returnProductkHistory') }}" class="nav-link {{ request()->is('return-product/history*') ? 'active':'' }}">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Return Product History</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{ route('logout') }}" class="nav-link"
                         onclick="event.preventDefault();
                                this.closest('form').submit();">
                   <i class="nav-icon fas fa-power-off"></i> {{ __('Log Out') }}
                </a>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
