<div class="sidebar">
    <div class="sidebar-header p-3">
         @if(isset($setting) && $setting->site_logo)
            <div class="text-center">
                <img src="{{ asset('storage/' . $setting->site_logo) }}" alt="Site Logo" style="max-height: 50px; max-width: 200px;">
            </div>
        @else
            <h4 class="text-center">Print-Ecommerce</h4>
        @endif
        <hr class="text-black">
    </div>
    
    <ul class="nav flex-column">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>

        <!-- Products Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{ request()->routeIs('products*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#productsCollapse" aria-expanded="false">
                <i class="bi bi-box-seam me-2"></i>
                <span class="">Products</span>
                <i class="bi bi-chevron-down ms-auto collapse-icon"></i>
            </a>
            <div class="collapse" id="productsCollapse">
                <ul class="nav flex-column ps-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-grid me-2"></i>All Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-plus-circle me-2"></i>Create Product
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Orders -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('orders') ? 'active' : '' }}" href="{{ route('orders') }}">
                <i class="bi bi-cart-check me-2"></i>
                Orders
            </a>
        </li>

        <!-- Settings -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.settings*') ? 'active' : '' }}" href="{{ route('dashboard.settings.index') }}">
               <i class="bi bi-gear me-2"></i>
                Settings
            </a>
        </li>

        <!-- Logout -->
        <li class="nav-item mt-3">
            <a class="nav-link text-danger" href="#">
                <i class="bi bi-box-arrow-right me-2"></i>
                Logout
            </a>
        </li>
    </ul>
</div>