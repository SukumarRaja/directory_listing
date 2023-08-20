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
                            <h4 class="card-title">{{ __('Roles List') }} ({{ $roles->count() }})</h4>
                            @can('Create-role')
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary btn-icon-text">
                                <i class="ti-plus btn-icon-prepend"></i>
                                {{ __('Add New') }}
                            </a>
                            @endcan
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('Id') }}</th>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Created At') }}</th>
                                        @if (auth()->user()->can('Update-role') || auth()->user()->can('Delete-role'))
                                        <th scope="col">{{ __('Action') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($roles->count())
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->created_at }}</td>
                                        @if (auth()->user()->can('Update-role') || auth()->user()->can('Delete-role'))
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-link text-muted shadow-none py-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </button>
                                                <div class="dropdown-menu p-0">
                                                    @can('Update-role')
                                                    <a class="dropdown-item py-2 h6 m-0" href="{{ route('admin.roles.edit', $role->id) }}">
                                                        <i class="mdi mdi-pencil align-middle text-success"></i>
                                                        {{ __('Edit') }}
                                                    </a>
                                                    @endcan
                                                    @can('Delete-role')
                                                    <button type="button" class="dropdown-item py-2 h6 m-0" id="deleteRole" data-bs-toggle="modal" data-bs-target="#roleDeleteModal" data-url="{{ route('admin.roles.delete', $role->id) }}" data-name="{{ $role->name }}">
                                                        <i class="mdi mdi-trash-can align-middle text-danger"></i>
                                                        {{ __('Delete') }}
                                                    </button>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="text-center">
                                        <td colspan="4">{{ __('No roles found.') }}</td>
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

@can('Delete-role')
<div class="modal fade" id="roleDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title mb-3">{{ __('Are you sure you want to delete?') }}</h5>
                <p class="mb-0">{{ __('The role') }} <strong id="rolename">Role</strong> {{ __('will be deleted permanently and you can\'t undo this action.') }}</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="" method="POST">
                    @method('delete')
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection

@push('scripts-bottom')
<script>
    $(document).on("click", "#deleteRole", function() {
        var deleteUrl = $(this).data('url');
        var roleName = $(this).data('name');
        $('.modal-body #rolename').text('"' + roleName + '"');
        $('.modal-footer form').attr('action', deleteUrl);
    });
</script>
@endpush