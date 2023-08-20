<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">{{ __('Dashboard') }}</span>
            </a>
        </li>

        @can('Read-customer')
        <li class="nav-item {{ request()->routeIs('admin.customers.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.customers.index') }}">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">{{ __('Customers') }}</span>
            </a>
        </li>
        @endcan

        @if (auth()->user()->can('Read-user'))
        <li class="nav-item {{ (request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#user-management" aria-expanded="false" aria-controls="user-management">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">{{ __('User Management') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ (request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') || request()->routeIs('admin.permissions.*')) ? 'show' : '' }}" id="user-management">
                <ul class="nav flex-column sub-menu">
                    @can('Read-user')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                            {{ __('Users') }}
                        </a>
                    </li>
                    @endcan
                    @can('Read-role')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                            {{ __('Roles') }}
                        </a>
                    </li>
                    @endcan
                    @can('Read-permission')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}">
                            {{ __('Permissions') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif

        @if (auth()->user()->can('Read-generalSettings'))
        <li class="nav-item {{ (request()->routeIs('admin.settings.*')) ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">{{ __('Settings') }}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ (request()->routeIs('admin.settings.general.editBasicInformation') || request()->routeIs('admin.settings.general.editWorkingHours')) ? 'show' : '' }}" id="settings">
                <ul class="nav flex-column sub-menu">
                    @can('Read-generalSettings')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.settings.general.editBasicInformation') ? 'active' : '' }}" href="{{ route('admin.settings.general.editBasicInformation') }}">
                            {{ __('General') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif
    </ul>
</nav>