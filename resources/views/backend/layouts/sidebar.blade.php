<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @can('isAdmin')
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Pannel</span>
    </a>
    @endcan

    @can('isUser')
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">User Pannel</span>
    </a>
    @endcan

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset("uploads/user_imgs/".auth()->user()->image) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('user/personalaccount/'.auth()->user()->id.'/show') }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ url('user/personalaccount/'.auth()->user()->id.'/show') }}" class="nav-link">
                            <i class="fas fa-id-badge"></i>
                            <p>My Profile</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('user/mywishlist') }}" class="nav-link">
                            <i class="fas fa-heart"></i>
                            <p>My Wishlist</p>
                        </a>
                    </li>

                    @can('isUser')
                    <li class="nav-item">
                        <a href="{{ url('user/product') }}" class="nav-link">
                            <i class="fas fa-align-justify"></i>
                            <p>View All Products</p>
                        </a>
                    </li>
                    @endcan
        {{----------------------------- My user Product Start --------------------------}}
        <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link ">
                    <i class="fas fa-car"></i>
                    <p>My Product</p>
                    <i class="right fas fa-angle-left"></i>

            </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('user/personalproducts') }}" class="nav-link ">
                <i class="fas fa-eye nav-icon"></i>
                <p>Personal product</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('user/personalproduct/create') }}" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Create product</p>
                </a>
            </li>

        </ul>
        </li>
      {{--------------------------- My User Product End ------------------------------}}


        @can('isAdmin')
        {{----------------------------- My Admin Product Start --------------------------}}
        <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link ">
                    <i class="fas fa-car"></i>
                    <p>All Products</p>
                    <i class="right fas fa-angle-left"></i>

            </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url("admin/post") }}" class="nav-link ">
                <i class="fas fa-eye nav-icon"></i>
                <p>View all product</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url("admin/post/create") }}" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Create product</p>
                </a>
            </li>

        </ul>
        </li>
      {{--------------------------- My Admin Product End ------------------------------}}

      {{-- -------------------------City start ---------------------------------}}
      <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link ">
                    <i class="fas fa-city"></i>
                    <p>City</p>
                    <i class="right fas fa-angle-left"></i>

            </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url("admin/city") }}" class="nav-link ">
                <i class="fas fa-eye nav-icon"></i>
                <p>View all city</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url("admin/city/create") }}" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Create city</p>
                </a>
            </li>

        </ul>
        </li>
      {{-- --------------------------City end -------------------------------}}

      {{-- -------------------------Category start ---------------------------------}}
      <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link ">
                <i class="fas fa-bars"></i>
                <p>Categories</p>
                <i class="right fas fa-angle-left"></i>

            </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url("admin/category") }}" class="nav-link ">
                <i class="fas fa-eye nav-icon"></i>
                <p>View all categories</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url("admin/category/create") }}" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Create category</p>
                </a>
            </li>

        </ul>
        </li>
      {{-- --------------------------Category end -------------------------------}}


        <li class="nav-item">
            <a href="{{ url('admin/user') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                <p>View all users</p>
            </a>
        </li>
        @endcan


        <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="fas fa-home nav-icon"></i>
                    <p>Home</p>
                </a>
        </li>

        <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link">
                    <i class="fas fa-power-off nav-icon"></i>
                    <p>Logout</p>
                </a>
        </li>


    </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
