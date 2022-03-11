<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">AUTH NAME</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('index') }}"
                   class="nav-link @if(request()->route()->getName() === 'index') active @endif">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Homepage
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                   class="nav-link @if(request()->route()->getName() === 'users.index') active @endif">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Users
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href=""
                   class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Users API
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fa fa-lock"></i>
                    <p>
                        Safe Exit
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
