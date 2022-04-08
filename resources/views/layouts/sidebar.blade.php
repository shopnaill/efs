<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <div class="d-flex sidebar-profile">
                <div class="sidebar-profile-image">
                    <img src="{{ asset('images/10.jpg') }}" alt="image">
                    <span class="sidebar-status-indicator"></span>
                </div>
                <div class="sidebar-profile-name">
                    <p class="sidebar-name">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="sidebar-designation">
                        Admin
                    </p>
                </div>
            </div>
 
            <p class="sidebar-menu-title">Dash menu</p>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.client.index')}}">
                <i class="typcn typcn-user menu-icon"></i>
                <span class="menu-title">Clients</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.service.index')}}">
                <i class="typcn typcn-lightbulb menu-icon"></i>
                <span class="menu-title">Services</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.team.index')}}">
                <i class="typcn typcn-group-outline menu-icon"></i>
                <span class="menu-title">Team</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.about.index')}}">
                <i class="typcn typcn-info-large-outline menu-icon"></i>
                <span class="menu-title">About</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.manager.index')}}">
                <i class="typcn typcn-user-add menu-icon"></i>
                <span class="menu-title">Managers</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.slider.index')}}">
                <i class="typcn typcn-image menu-icon"></i>
                <span class="menu-title">Slider</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.work.index')}}">
                <i class="typcn typcn-image menu-icon"></i>
                <span class="menu-title">Work</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.roles.index')}}">
                <i class="typcn typcn-key menu-icon"></i>
                <span class="menu-title">Roles</span>
            </a>
        </li>


    </ul>
 
</nav>
