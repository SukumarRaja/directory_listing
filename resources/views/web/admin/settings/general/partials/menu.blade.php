<div class="col-md-2 mb-4">
    <ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ request()->routeIs('admin.settings.general.editBasicInformation') ? 'active' : '' }}" href="{{ (request()->routeIs('admin.settings.general.editBasicInformation')) ? '#' : route('admin.settings.general.editBasicInformation') }}">
                {{ __('Basic Information') }}
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link {{ request()->routeIs('admin.settings.general.editWorkingHours') ? 'active' : '' }}" href="{{ (request()->routeIs('admin.settings.general.editWorkingHours')) ? '#' : route('admin.settings.general.editWorkingHours') }}">
                {{ __('Working Hours') }}
            </a>
        </li>
    </ul>
</div>