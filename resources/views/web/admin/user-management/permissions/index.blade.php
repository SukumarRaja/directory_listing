@extends('t1.layouts.admin')

@section('title', __('Permissions'))

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-md-between mb-4">
                            <h4 class="card-title">{{ __('Permissions List') }} ({{ $permissionGroups->count() }})</h4>
                            @role('Super Admin')
                            <a href="{{ route('admin.permissions.create') }}" class="btn btn-sm btn-primary btn-icon-text">
                                <i class="ti-plus btn-icon-prepend"></i>
                                {{ __('Add New') }}
                            </a>
                            @endrole
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('Id') }}</th>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Created At') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($permissionGroups->count())
                                    @foreach ($permissionGroups as $permissionGroup)
                                    <tr>
                                        <td>{{ $permissionGroup->id }}</td>
                                        <td>{{ $permissionGroup->name }}</td>
                                        <td>{{ $permissionGroup->created_at }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="text-center">
                                        <td colspan="3">{{ __('No permission groups found.') }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection