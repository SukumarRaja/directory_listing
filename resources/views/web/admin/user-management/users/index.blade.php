@extends('t1.layouts.admin')

@section('title', __('Users'))

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-md-between mb-4">
                            <h4 class="card-title">{{ __('Users List') }} ({{ $users->count() }})</h4>
                            @can('Create-user')
                            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary btn-icon-text">
                                <i class="ti-plus btn-icon-prepend"></i>
                                {{ __('Add New') }}
                            </a>
                            @endcan
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped align-middle mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('Id') }}</th>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Email') }}</th>
                                        <th scope="col">{{ __('Role') }}</th>
                                        <th scope="col">{{ __('Registered At') }}</th>
                                        @if (auth()->user()->can('Update-user') || auth()->user()->can('Delete-user'))
                                        <th scope="col">{{ __('Action') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->count())
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            <img src="{{ $user->avatar_url }}" alt="User Image" class="rounded-circle mr-2">
                                            <a href="javascript: void(0);" class="text-body">
                                                {{ $user->full_name }}
                                            </a>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                @if ($user->roles->count())
                                                @foreach ($user->roles as $role)
                                                @if ($role->name == "Super Admin")
                                                <a href="javascript: void(0);" class="badge badge-danger">
                                                    {{ $role->name }}
                                                </a>
                                                @else
                                                <a href="javascript: void(0);" class="badge badge-primary">
                                                    {{ $role->name }}
                                                </a>
                                                @endif
                                                @endforeach
                                                @else
                                                <a href="javascript: void(0);" class="badge badge-warning">
                                                    {{ __('Not Assigned') }}
                                                </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        @if (auth()->user()->can('Update-user') || auth()->user()->can('Delete-user'))
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-link text-muted shadow-none py-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </button>
                                                <div class="dropdown-menu p-0">
                                                    @can('Update-user')
                                                    <a class="dropdown-item py-2 h6 m-0" href="{{ route('admin.users.edit', $user->id) }}">
                                                        <i class="mdi mdi-pencil align-middle text-success"></i>
                                                        {{ __('Edit') }}
                                                    </a>
                                                    @endcan
                                                    @can('Delete-user')
                                                    <button type="button" class="dropdown-item py-2 h6 m-0" id="deleteUser" data-bs-toggle="modal" data-bs-target="#userDeleteModal" data-url="{{ route('admin.users.delete', $user->id) }}" data-name="{{ $user->first_name }} {{ $user->last_name }}">
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
                                        <td colspan="6">{{ __('No users found.') }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@can('Delete-user')
<div class="modal fade" id="userDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title mb-3">{{ __('Are you sure you want to delete?') }}</h5>
                <p class="mb-0">{{ __('The user') }} <strong id="username">User</strong> {{ __('will be deleted permanently and you can\'t undo this action.') }}</p>
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
    $(document).on("click", "#deleteUser", function() {
        var deleteUrl = $(this).data('url');
        var userName = $(this).data('name');
        $('.modal-body #username').text('"' + userName + '"');
        $('.modal-footer form').attr('action', deleteUrl);
    });
</script>
@endpush