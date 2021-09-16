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
            <p style="font-size: 14px">
                Dashboard
            </p>
            </a>
          </li>

          <hr style="width: 100%; border: solid 1px white;">

          <a href="{{ route('admin.shipment.create') }}" class="btn bg-warning"><b>Create Connote</b></a>
          <li class="nav-header">Menu</li>
          <li class="nav-item {{ request()->is('admin/bagpackage*') || request()->is('admin/city*') || request()->is('admin/courier*') || request()->is('admin/country*') || request()->is('admin/partner*') || request()->is('admin/packagetype*') || request()->is('admin/postalcode*') || request()->is('admin/pickupuser*') || request()->is('admin/ongkir*') || request()->is('admin/tracking_status*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p style="font-size: 14px">
                Master
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.bagpackage.index') }}" class="nav-link {{ request()->is('admin/bagpackage*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Bag Number</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.city.index') }}" class="nav-link {{ request()->is('admin/city*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">City</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.country.index') }}" class="nav-link {{ request()->is('admin/country*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.courier.index') }}" class="nav-link {{ request()->is('admin/courier*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Courier Domestik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.ongkir.index') }}" class="nav-link {{ request()->is('admin/ongkir*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Ongkir</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.packagetype.index') }}" class="nav-link {{ request()->is('admin/packagetype*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Package Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.partner.index') }}" class="nav-link {{ request()->is('admin/partner*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Partner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.pickupuser.index') }}" class="nav-link {{ request()->is('admin/pickupuser*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Pickup User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.postalcode.index') }}" class="nav-link {{ request()->is('admin/postalcode*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Postal Code</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.tracking_status.index') }}" class="nav-link {{ request()->is('admin/tracking_status*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Tracking Status</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- <li class="nav-item {{ request()->is('admin/bagshipment*') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.bagshipment.index') }}" class="nav-link {{ request()->is('admin/bagshipment*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-briefcase"></i>
            <p style="font-size: 14px">
                Bag Shipment
            </p>
            </a>
          </li> --}}

          <li class="nav-item {{ request()->is('admin/customer*') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.customer.index') }}" class="nav-link {{ request()->is('admin/customer*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p style="font-size: 14px">
                Customer
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/dropship*') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.dropship.index') }}" class="nav-link {{ request()->is('admin/dropship*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-truck-loading"></i>
            <p style="font-size: 14px">
                Dropship
            </p>
            </a>
          </li>

          {{-- <li class="nav-item {{ request()->is('admin/finance*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/finance*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-money-bill-wave"></i>
            <p style="font-size: 14px">
                Finance
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/kpi*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/kpi*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-archive"></i>
            <p style="font-size: 14px">
                KPI
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/manifest*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/manifest*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-plane-departure"></i>
            <p style="font-size: 14px">
                Manifest
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/pickuplist*') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.pickuplist.index') }}" class="nav-link {{ request()->is('admin/pickuplist*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-motorcycle"></i>
            <p style="font-size: 14px">
                Pickup List
            </p>
            </a>
          </li> --}}

          <li class="nav-item {{ request()->is('admin/shipment*') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.shipment.index') }}" class="nav-link {{ request()->is('admin/shipment*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-truck"></i>
            <p style="font-size: 14px">
                Shipment
            </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/role*') || request()->is('admin/user*') || request()->is('admin/officeprofile*') || request()->is('admin/counter*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p style="font-size: 14px">
                Setup
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.officeprofile.index') }}" class="nav-link {{ request()->is('admin/officeprofile*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Office Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('admin/profile*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.role.index') }}" class="nav-link {{ request()->is('admin/role*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size: 14px">User</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- <li class="nav-item {{ request()->is('admin/tracking_shipment*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/tracking_shipment*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-map-marked-alt"></i>
            <p style="font-size: 14px">
                Tracking Shipment
            </p>
            </a>
          </li>

          <li class="nav-header"></li>

          <li class="nav-item {{ request()->is('admin/support*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/support*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-question"></i>
            <p style="font-size: 14px">
                Support
                <span class="right badge badge-danger">PDF</span>
            </p>
            </a>
          </li> --}}
          
        </ul>
      </nav>
    </div>
</aside>