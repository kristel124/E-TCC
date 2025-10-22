<!-- Seller Sidebar - Neutral Beige Theme -->
<ul
    class="navbar-nav sidebar accordion"
    id="accordionSidebar"
    style="
        background: #f2dac5ff; 
        width: 280px !important;
        min-width: 280px !important;
        color: #1b1b18;
        font-size: 15px;
        font-weight: 600;
        border-radius: 0 20px 20px 0;
        box-shadow: 6px 0 20px rgba(155, 121, 87, 0.25);
        padding: 15px 0;
        transition: all 0.3s ease-in-out;
    "
>

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
        href="{{ route('seller.seller_dashboard') }}"
        style="padding: 20px 0; text-decoration: none; color: #1b1b18;">
        <div class="sidebar-brand-icon">
            <i class="fas fa-store fa-lg" style="color: #975519;"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Seller Panel</div>
    </a>

    <hr class="sidebar-divider my-2" style="border-top-color: #e3e3e0;">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('seller.seller_dashboard') }}">
            <i class="fas fa-tachometer-alt" style="color: #975519;"></i>
            <span class="ml-2">Dashboard</span>
        </a>
    </li>

    <!-- Products -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
           aria-expanded="false" aria-controls="collapseProducts">
            <i class="fas fa-cube" style="color: #975519;"></i>
            <span class="ml-2">Products</span>
        </a>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
           aria-expanded="false" aria-controls="collapseProducts">
            <i class="fas fa-cube" style="color: #975519;"></i>
            <span class="ml-2">Categories</span>
        </a>
    </li>

    <!-- Orders -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
           aria-expanded="false" aria-controls="collapseOrders">
            <i class="fas fa-shopping-cart" style="color: #975519;"></i>
            <span class="ml-2">Orders</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders" data-parent="#accordionSidebar">
            <div class="collapse-inner">
                <a class="collapse-item" href="#">All Orders</a>
                <a class="collapse-item" href="#">Pending</a>
                <a class="collapse-item" href="#">Completed</a>
            </div>
        </div>
    </li>

    <!-- Customers -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-users" style="color: #975519;"></i>
            <span class="ml-2">Customers</span>
        </a>
    </li>

    <!-- Analytics -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-chart-line" style="color: #975519;"></i>
            <span class="ml-2">Analytics</span>
        </a>
    </li>

    <!-- Settings -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-cog" style="color: #975519;"></i>
            <span class="ml-2">Settings</span>
        </a>
    </li>

    <hr class="sidebar-divider" style="border-top-color: #e3e3e0;">

    <!-- Profile -->
    <li class="nav-item mt-auto">
        <a class="nav-link" href="#">
            <i class="fas fa-user" style="color: #975519;"></i>
            <span class="ml-2">Profile</span>
        </a>
    </li>

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt" style="color: #975519;"></i>
            <span class="ml-2">Logout</span>
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
</ul>

<!-- ✅ Sidebar Beige Theme CSS -->
<style>
/* === Neutral Beige Sidebar Theme === */
.sidebar a {
    color: #3f3f3b !important;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

.sidebar a:hover {
    background-color: #f8ede3 !important;
    color: #975519 !important;
    border-radius: 10px;
    padding-left: 20px !important;
}

.sidebar .sidebar-brand {
    color: #1b1b18 !important;
    font-weight: 700 !important;
    letter-spacing: 0.5px;
}

.sidebar .sidebar-brand i {
    color: #975519 !important;
}

.sidebar .nav-item i {
    color: #975519 !important;
    width: 22px;
}

.sidebar hr.sidebar-divider {
    border-top: 1px solid #e3e3e0 !important;
    margin: 0.75rem 1rem;
}

.sidebar .collapse-inner {
    background-color: #fdfdfc !important;
    border: 1px solid #e3e3e0 !important;
    border-radius: 10px;
    padding: 0.5rem 0.75rem;
}

.sidebar .collapse-item {
    color: #3f3f3b !important;
    font-weight: 500;
    display: block;
    padding: 6px 14px;
    border-radius: 6px;
}

.sidebar .collapse-item:hover {
    background-color: #f3e3d5 !important;
    color: #975519 !important;
    border-radius: 6px;
}

/* Active link style */
.sidebar .nav-link.active {
    background-color: #e5ba91 !important;
    color: #1b1b18 !important;
    border-radius: 10px;
    box-shadow: inset 0 0 8px rgba(155, 121, 87, 0.25);
}

/* Profile & Logout spacing */
.sidebar .nav-item.mt-auto {
    margin-top: auto !important;
}

.sidebar .nav-link span {
    font-weight: 500;
}
</style>
