<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link bg-primary">
      <img src="{{ url('img/favicon2.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">EOS | TLX</span>
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

          <li class="nav-item {{ request()->is('admin/bagpackage*') || request()->is('admin/city*') || request()->is('admin/courier*') || request()->is('admin/country*') || request()->is('admin/partner*') || request()->is('admin/packagetype*') || request()->is('admin/postalcode*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p style="font-size: 16px">
                Master
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.bagpackage.index') }}" class="nav-link {{ request()->is('admin/bagpackage*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 16px">Bag Number</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.city.index') }}" class="nav-link {{ request()->is('admin/city*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 16px">City</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.country.index') }}" class="nav-link {{ request()->is('admin/country*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 16px">Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.courier.index') }}" class="nav-link {{ request()->is('admin/courier*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 16px">Courier Domestik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.packagetype.index') }}" class="nav-link {{ request()->is('admin/packagetype*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 16px">Package Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.partner.index') }}" class="nav-link {{ request()->is('admin/partner*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 16px">Partner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.postalcode.index') }}" class="nav-link {{ request()->is('admin/postalcode*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 16px">Postal Code</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ request()->is('admin/customer*') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.customer.index') }}" class="nav-link {{ request()->is('admin/customer*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p style="font-size: 16px">
                Customer
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/dropship*') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.dropship.index') }}" class="nav-link {{ request()->is('admin/dropship*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-truck-loading"></i>
            <p style="font-size: 16px">
                Dropship
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/finance*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/finance*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-money-bill-wave"></i>
            <p style="font-size: 16px">
                Finance
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/kpi*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/kpi*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-archive"></i>
            <p style="font-size: 16px">
                KPI
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/manifest*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/manifest*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-file-archive"></i>
            <p style="font-size: 16px">
                Manifest
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/shipment*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/shipment*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-plane-departure"></i>
            <p style="font-size: 16px">
                Shipment
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/role*') || request()->is('admin/user*') || request()->is('admin/officeprofile*') || request()->is('admin/counter*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p style="font-size: 16px">
                Setup
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.counter.index') }}" class="nav-link {{ request()->is('admin/counter*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 16px">Counter</p>
                </a>
              </li>
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

          <li class="nav-item {{ request()->is('admin/support*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/support*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-question"></i>
            <p style="font-size: 16px">
                Support
                <span class="right badge badge-danger">PDF</span>
            </p>
            </a>
          </li>

        </ul>
      </nav>
    </div>
</aside>