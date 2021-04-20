<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-primary">
      <img src="{{ url('img/favicon2.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">EOS</span>
    </a>

    <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item {{ request()->is('admin') ? 'menu-open' : '' }}">
            <a href="/admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p style="font-size: 16px">
                Dashboard
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/role*') || request()->is('admin/user*') || request()->is('admin/officeprofile*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p style="font-size: 16px">
                Setup
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.officeprofile.index') }}" class="nav-link {{ request()->is('admin/officeprofile*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 16px">Office Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.role.index') }}" class="nav-link {{ request()->is('admin/role*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 16px">Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 16px">User</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
    </div>
</aside>