      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          @if (Auth::user()->role == 'admin')
          <a class="sidebar-brand my-3 d-flex align-items-center justify-content-center" href="index.html">
              <div class="sidebar-brand-icon rotate-n-15">
                  {{-- Sales Icon --}}
                  <i class="fas fa-shopping-cart"></i>
              </div>
              <div class="sidebar-brand-text mx-3">
                  @yield('title', 'POS Management')
              </div>
          </a>
          @elseif (Auth::user()->role == 'sales')
          <a class="sidebar-brand my-3 d-flex align-items-center justify-content-center" href="index.html">
              <div class="sidebar-brand-icon rotate-n-15">
                  {{-- Sales Icon --}}
                  <i class="fas fa-shopping-cart"></i>
              </div>
              <div class="sidebar-brand-text mx-3">
                  @yield('title', 'POS Management')
              </div>
          </a>
          @elseif (Auth::user()->role == 'customer')
          <a class="sidebar-brand my-3 d-flex align-items-center justify-content-center" href="{{ route('customer') }}">
              <div class="sidebar-brand-icon rotate-n-15">
                  {{-- Sales Icon --}}
                  <i class="fas fa-shopping-cart"></i>
              </div>
              <div class="sidebar-brand-text mx-3">
                  @yield('title', 'POS Management')
              </div>
          </a>
          @endif


          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
              @if (Auth::user()->role == 'admin')
              <a class="nav-link" href="{{ route('admin') }}">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span></a>
              @elseif (Auth::user()->role == 'sales')
              <a class="nav-link" href="{{ route('salesdashboard') }}">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span></a>
              @elseif (Auth::user()->role == 'customer')
              <a class="nav-link" href="{{ route('customer') }}">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span></a>
              @endif
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              Data
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
              @if (Auth::user()->role == 'admin')
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <span>Data Master</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <a class="collapse-item" href="{{ route('products') }}">Produk</a>
                      <a class="collapse-item" href="{{ route('categories') }}">Kategori</a>
                  </div>
              </div>
              @elseif (Auth::user()->role == 'sales')
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <span>Data Master</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <a class="collapse-item" href="{{ route('salesproducts') }}">Produk</a>
                      <a class="collapse-item" href="{{ route('salescategories') }}">Kategori</a>
                  </div>
              </div>
              @elseif (Auth::user()->role == 'customer')
              <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Master</span>
          </a> -->

              <a class="nav-link" href="{{ route('products') }}">
                  <i class="fas fa-fw fa-chart-area"></i>
                  <span>Produk</span>
              </a>

              <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('products') }}">Produk</a>
              <a class="collapse-item" href="{{ route('categories') }}">Kategori</a>
            </div>
          </div> -->
              @endif
          </li>

          <!-- Manajemen Pengguna -->
          <li class="nav-item">
              @if (Auth::user()->role == 'admin')
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                  <i class="fas fa-fw fa-user"></i>
                  <span>Data Pengguna</span>
              </a>
              <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <!-- <a class="collapse-item" href="utilities-color.html">Administrator</a> -->
                      <a class="collapse-item" href="{{ route('sales') }}">Sales</a>
                      <a class="collapse-item" href="{{ route('customers') }}">Customers</a>
                  </div>
              </div>
              @elseif (Auth::user()->role == 'sales')
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                  <i class="fas fa-fw fa-user"></i>
                  <span>Data Pengguna</span>
              </a>
              <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <!-- <a class="collapse-item" href="utilities-color.html">Administrator</a> -->
                      <a class="collapse-item" href="{{ route('salessales') }}">Sales</a>
                      <a class="collapse-item" href="{{ route('customer') }}">Customers</a>
                  </div>
              </div>
              @elseif (Auth::user()->role == 'customer')
              <!-- none -->
              @endif

          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
              Laporan
          </div>

          <!-- Nav Item - Report -->
          <li class="nav-item">
              @if (Auth::user()->role == 'admin')
              <a class="nav-link" href="charts.html">
                  <i class="fas fa-fw fa-table"></i>
                  <span>Penjualan</span></a>
              @elseif (Auth::user()->role == 'sales')
              <a class="nav-link" href="charts.html">
                  <i class="fas fa-fw fa-table"></i>
                  <span>Penjualan</span></a>
              @elseif (Auth::user()->role == 'customer')
              <a class="nav-link" href="{{ route('keranjang2') }}">
                  <i class="fas fa-shopping-cart"></i>
                  <span>Keranjang</span>
              </a>
              <a class="nav-link" href="{{ route('transaksi') }}">
                  <i class="fas fa-list"></i>
                  <span>Transaksi</span>
              </a>
              @endif
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
      </ul>