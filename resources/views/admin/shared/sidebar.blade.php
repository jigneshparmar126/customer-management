<div class="left-side-menu">
    <div id="sidebar-menu">
        <ul id="side-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ (request()->is('dashboard*')) ? 'active' : '' }}">
                    <i class="mdi mdi-view-dashboard-outline"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            <li class="{{ (request()->is('customer*') || request()->is('customer/payment/*')) ? 'menuitem-active' : '' }}">
                {{-- {{ dd((request()->is('customer*')) || (request()->is('customer/payment/*')) ? 'active' : '') }} --}}

                <a href="{{ route('customer') }}">
                    <i class="fa fa-users"></i>
                    <span> Customers </span>
                </a>
            </li>
            <li class="{{ (request()->is('sale*')) ? 'menuitem-active' : '' }}">
                <a href="{{ route('sale') }}">
                    <i class="fas fa-poll"></i>
                    <span> Sales </span>
                </a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>