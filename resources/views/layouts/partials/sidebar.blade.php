<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-{{config('settings.sidebar_bg')}}-{{config('settings.sidebar_fg')}} elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tv"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if(auth()->user()->isAdmin)
                    <hr class="dropdown-divider">
                    <li class="nav-item">
                        <small class="text-muted">Management</small>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('products.index') }}" class="nav-link {{ activeSegment('products') }}">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('users.index') }}" class="nav-link {{ activeSegment('users') }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Employee</p>
                        </a>
                    </li>
                @endif

                <hr class="dropdown-divider">
                <li class="nav-item">
                    <small class="text-muted">Sale</small>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('pos') }}" class="nav-link {{ activeSegment('pos') }}">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>POS</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('orders.index') }}" class="nav-link {{ activeSegment('orders') }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Orders</p>
                    </a>
                </li>

                @if(auth()->user()->isAdmin)
                    <hr class="dropdown-divider">
                    <li class="nav-item">
                        <small class="text-muted">Settings</small>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('settings.index') }}" class="nav-link {{ activeSegment('settings') }}">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>App Settings</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
