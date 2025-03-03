<header>
    <nav>
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('manage-products') }}">Manage Products</a></li>
            <li><a href="{{ route('manage-orders') }}">Manage Orders</a></li>
            <li><a href="{{ route('reports') }}">Reports</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
</header>
