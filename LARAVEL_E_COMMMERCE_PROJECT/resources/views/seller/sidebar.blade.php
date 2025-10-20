<ul
    class="navbar-nav sidebar sidebar-dark accordion"
    id="accordionSidebar"
    style="
        background: linear-gradient(145deg, #e5ba91, #3f3f3b);
        width: 280px !important;
        min-width: 280px !important;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        border-radius: 0 20px 20px 0;
        box-shadow: 6px 0 20px rgba(0, 0, 0, 0.45);
        padding: 15px 0;
        transition: all 0.3s ease-in-out;
    "
>

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mb-3" href="{{ route('seller.seller_dashboard') }}"
        style="background-color: rgba(255, 255, 255, 0.1); padding: 15px 0; text-shadow: 1px 1px 3px rgba(0,0,0,0.6); border-bottom: 1px solid rgba(255,255,255,0.2);">
        <div class="sidebar-brand-text mx-3" style="font-size: 20px; font-weight: bold;">SellerHub</div>
    </a>

    <hr class="sidebar-divider my-0" style="border-top: 1px solid rgba(255,255,255,0.2);">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('seller.seller_dashboard') }}" style="padding: 12px 20px; display: flex; align-items: center; color: #fff;"
            onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='transparent'">
            <i class="fas fa-tachometer-alt mr-2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Products -->
    <li class="nav-item">
        <a class="nav-link" href="#" style="padding: 12px 20px; display: flex; align-items: center; color: #fff;"
            onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='transparent'">
            <i class="fas fa-cube mr-2"></i>
            <span>Products</span>
        </a>
    </li>

    <!-- Orders -->
    <li class="nav-item">
        <a class="nav-link" href="#" style="padding: 12px 20px; display: flex; align-items: center; color: #fff;"
            onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='transparent'">
            <i class="fas fa-shopping-cart mr-2"></i>
            <span>Orders</span>
        </a>
    </li>

    <!-- Customers -->
    <li class="nav-item">
        <a class="nav-link" href="#" style="padding: 12px 20px; display: flex; align-items: center; color: #fff;"
            onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='transparent'">
            <i class="fas fa-users mr-2"></i>
            <span>Customers</span>
        </a>
    </li>

    <!-- Analytics -->
    <li class="nav-item">
        <a class="nav-link" href="#" style="padding: 12px 20px; display: flex; align-items: center; color: #fff;"
            onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='transparent'">
            <i class="fas fa-chart-line mr-2"></i>
            <span>Analytics</span>
        </a>
    </li>

    <!-- Settings -->
    <li class="nav-item">
        <a class="nav-link" href="#" style="padding: 12px 20px; display: flex; align-items: center; color: #fff;"
            onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='transparent'">
            <i class="fas fa-cog mr-2"></i>
            <span>Settings</span>
        </a>
    </li>

    <hr class="sidebar-divider" style="border-top: 1px solid rgba(255,255,255,0.2);">

    <!-- Profile -->
    <li class="nav-item mt-auto">
        <a class="nav-link" href="{{ route('profile.show') }}" style="padding: 12px 20px; display: flex; align-items: center; color: #fff;"
            onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='transparent'">
            <i class="fas fa-user mr-2"></i>
            <span>{{ ucfirst(Auth::user()->user_type) }}</span>
        </a>
    </li>

    <!-- Hidden Logout Form -->
    <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <hr class="sidebar-divider d-none d-md-block" style="border-top: 1px solid rgba(255,255,255,0.2);">
</ul>
