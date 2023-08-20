@extends('t1.layouts.admin')

@section('title', __('Roles'))

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-md-between mb-4">
                            <h4 class="card-title">{{ __('Edit Role') }}</h4>
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-sm btn-light btn-icon-text">
                                <i class="ti-arrow-left btn-icon-prepend"></i>
                                {{ __('Back') }}
                            </a>
                        </div>
                        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}" autocomplete="off">
                            @method('PUT')
                            @csrf

                            <div class="row gx-5">
                                <div class="col-12">
                                    <div class="form-group row mb-4">
                                        <label for="roleName" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Role Name') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('roleName') is-invalid @enderror" id="roleName" name="roleName" placeholder="{{ __('Enter role name') }}" value="{{ old('roleName', $role->name) }}" autofocus>
                                            @error('roleName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="rolePermissions">{{ __('Role Permissions') }}</label>
                                    <div class="table-responsive @error('permissionIds') is-invalid @enderror">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="py-2">
                                                        {{ __('Administrator Access') }}
                                                    </td>
                                                    <td class="py-2">
                                                        <div class="form-check col">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" id="selectAll">
                                                                {{ __('Select all') }}
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @if($permissionGroups->count())
                                                @foreach ($permissionGroups as $permissionGroup)
                                                <tr>
                                                    <td class="py-2">{{ $permissionGroup->name }}</td>
                                                    <td class="py-2">
                                                        <div class="row px-3">
                                                            @if($permissionGroup->permissions->count())
                                                            @foreach ($permissionGroup->permissions as $permission)
                                                            @if ($permission != null)
                                                            <div class="form-check col @error('permissionIds') form-check-danger @enderror">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissionIds[]"@if((old('_token') && (is_array(old('permissionIds')) ? in_array($permission->id, old('permissionIds')) : '') != null) || (old('_token') == null && in_array($permission->id, $role->permissions->pluck('id')->toArray()) != null)) checked @endif>
                                                                    {{ $permission->name }}
                                                                </label>
                                                            </div>
                                                            @endif
                                                            @endforeach
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    @error('permissionIds')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('Update Role') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts-bottom')
<script>
    $('#selectAll').click(function(e) {
        var table = $(e.target).closest('table');
        $('td input:checkbox', table).prop('checked', this.checked);
    });
</script>
@endpush