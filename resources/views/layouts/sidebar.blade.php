<aside class="main-sidebar hidden-print bg-primary">
    <section class="sidebar " id="sidebar-scroll">
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu bg-primary">
            <li class="nav-level text-center">
                <h4>{{ Auth::user()->name }}</h4>
            </li>

            <li class="treeview">
                <a class="waves-effect bg-primary" href="profile">
                    <i class="icon-user"></i><span> Profile</span>
                </a>
            </li>

            <li class="treeview">
                <a class="waves-effect  bg-primary" href="{{ route('customers.index') }}">
                    <i class="icon-settings"></i><span> Customers</span>
                </a>
            </li>

            <li class="treeview">
                <a class="waves-effect  bg-primary" href="{{ route('transactions.index') }}">
                    <i class="icon-action-redo"></i><span> Transactions</span>
                </a>
            </li>

            <li class="treeview">
                <a class="waves-effect  bg-primary" href="{{ route('segment.index') }}">
                    <i class="icon-anchor"></i><span> Segmentation</span>
                </a>
            </li>

            <li class="treeview">
                <a class="waves-effect  bg-primary" href="{{ route('results.index') }}">
                    <i class="icon-arrow-up"></i><span> Results Analysis</span>
                </a>
            </li>

        </ul>

    </section>
</aside>
