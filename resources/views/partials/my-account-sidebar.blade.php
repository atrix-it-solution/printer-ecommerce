<div class="col-lg-3 my-2">
    <div class="account_sidebar">
        <div class="user_info mb-3 d-flex gap-2">
            <div class="user_img">
                 @php
                    // Use Auth facade to get user data
                    $user = Auth::user();
                    // Use display_name if available, otherwise use name
                    $displayName = $user->display_name ?? $user->name;
                    // Get initials from display name
                    $names = explode(' ', $displayName);
                    $initials = '';
                    if(count($names) >= 2) {
                        $initials = strtoupper(substr($names[0], 0, 1) . substr($names[count($names)-1], 0, 1));
                    } else {
                        $initials = strtoupper(substr($displayName, 0, 2));
                    }
                @endphp
                <span>{{ $initials }}</span>
                <!-- <img src="{{ asset('assets/frontend/images/dummy.jpg') }}" alt="User Name" class="img-fluid"/> -->
            </div>
            <div class="user_info_r">
                <h4>{{ ucwords(strtolower($displayName)) }}</h4>
                <div class="email">{{ $user->email }}</div>
            </div>
        </div>
        <ul class="account-menu list-unstyled">
            <li><a href="/my-account" class="{{ request()->is('my-account') ? 'active' : '' }}"><i class="fa-solid fa-grip"></i> <span>Dashboard</span></a></li>
            <li><a href="/orders" class="{{ request()->is('orders') ? 'active' : '' }}"><i class="fa-solid fa-bag-shopping"></i> <span>My Orders</span></a></li>
            <li><a href="/wishlist" class="{{ request()->is('wishlist') ? 'active' : '' }}"><i class="fa-solid fa-heart"></i> <span>My Wishlist</span></a></li>
             <li><a href="{{ route('address.index') }}" class="{{ request()->routeIs('address.*') ? 'active' : '' }}"><i class="fa-solid fa-address-card"></i> <span>Address</span></a></li>
            <li><a href="/edit-account" class="{{ request()->is('edit-account') ? 'active' : '' }}"><i class="fa-solid fa-user"></i> <span>Account Details</span></a></li>
            
            <li>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="dropdown-item border-0 bg-transparent text-start w-100">
                        <i class="fa-solid fa-sign-out"></i> 
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>