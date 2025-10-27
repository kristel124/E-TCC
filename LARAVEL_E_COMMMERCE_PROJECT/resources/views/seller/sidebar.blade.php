<ul class="sidebar navbar-nav accordion" id="accordionSidebar">
    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-store fa-lg"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Seller Panel</div>
    </a>

    <hr class="sidebar-divider my-2">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('seller.seller_dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('seller.categories.index') }}">
            <i class="fas fa-cube"></i>
            <span>Categories</span>
        </a>
    </li>

    <!-- Products -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('seller.products.index') }}">
            <i class="fas fa-cube"></i>
            <span>Products</span>
        </a>
    </li>

    <!-- Orders -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrders">
            <i class="fas fa-shopping-cart"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrders" class="collapse" data-bs-parent="#accordionSidebar">
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
            <i class="fas fa-users"></i>
            <span>Customers</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item mt-auto">
        <a class="nav-link d-flex align-items-center" href="#">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="rounded-full object-cover me-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" style="width:32px; height:32px;">
            @endif
            <span>{{ Auth::user()->name }}</span>
        </a>
    </li>

    <!-- Logout Link -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
</ul>

<style>
.sidebar {
    background: #f2dac5;
    width: 280px;
    min-width: 280px;
    font-size: 15px;
    font-weight: 600;
    border-radius: 0 20px 20px 0;
    box-shadow: 6px 0 20px rgba(155, 121, 87, 0.25);
    padding: 15px 0;
    transition: all 0.3s ease-in-out;
}

.sidebar a {
    color: #3f3f3b;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

.sidebar a:hover {
    background-color: #f8ede3;
    color: #975519;
    border-radius: 10px;
    padding-left: 20px;
}

.sidebar .nav-link.active {
    background-color: #e5ba91;
    color: #1b1b18;
    border-radius: 10px;
    box-shadow: inset 0 0 8px rgba(155, 121, 87, 0.25);
}

.sidebar .collapse-inner {
    background-color: #fdfdfc;
    border: 1px solid #e3e3e0;
    border-radius: 10px;
    padding: 0.5rem 0.75rem;
}

.sidebar .collapse-item {
    color: #3f3f3b;
    font-weight: 500;
    padding: 6px 14px;
    border-radius: 6px;
}

.sidebar .collapse-item:hover {
    background-color: #f3e3d5;
    color: #975519;
}
</style>
