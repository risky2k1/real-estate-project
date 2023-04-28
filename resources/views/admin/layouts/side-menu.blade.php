<ul class="metismenu side-nav">
    <li class="side-nav-title side-nav-item">Navigation</li>

    <li class="side-nav-item">
        <a href="{{route('admin.dashboard')}}" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span> Dashboards </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="#" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> User Management </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level">
            <li class="side-nav-item">
                <a href="#" aria-expanded="false">Users
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-third-level">
                    <li>
                        <a href="{{route('admin.users.index')}}">All users</a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">Item 2</a>
                    </li>
                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);">Roles and Permissions
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-third-level">
                    <li>
                        <a href="{{route('admin.roles.index')}}">Roles</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="side-nav-item">
        <a href="javascript: void(0);" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span> Posts </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{route('admin.properties.index')}}" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span> Properties </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="#" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Plans Management </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level">
            <li class="side-nav-item">
                <a href="#" aria-expanded="false">Plans
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-third-level">
                    <li>
                        <a href="#">All plans</a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">Item 2</a>
                    </li>
                </ul>
            </li>

        </ul>
    </li>
</ul>

