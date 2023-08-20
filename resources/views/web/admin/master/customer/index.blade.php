@extends('t1.layouts.admin')

@section('title', __('Customers'))

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-md-between mb-4">
                            <h4 class="card-title">{{ __('Customers') }} ({{ $customers->count() }})</h4>
                            @can('Create-customer')
                            <button type="button" class="btn btn-sm btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#customerCreateModal">
                                <i class="ti-plus btn-icon-prepend"></i>
                                {{ __('Add New') }}
                            </button>
                            @endcan
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped align-middle mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Email') }}</th>
                                        <th scope="col">{{ __('Mobile') }}</th>
                                        <th scope="col">{{ __('Type') }}</th>
                                        @if (auth()->user()->can('Update-customer') || auth()->user()->can('Delete-customer'))
                                        <th scope="col">{{ __('Action') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($customers->count())
                                    @foreach ($customers as $customer)
                                    <tr>
                                        <td>
                                            <img src="{{ $customer->avatar_url }}" alt="Customer Image" class="rounded-circle mr-2">
                                            <a href="javascript: void(0);" class="text-body">
                                                {{ $customer->name }}
                                            </a>
                                        </td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->mobile }}</td>
                                        <td>{{ $customer->customer_type }}</td>
                                        @if (auth()->user()->can('Update-customer') || auth()->user()->can('Delete-customer'))
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-link text-muted shadow-none py-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal"></i>
                                                </button>
                                                <div class="dropdown-menu p-0">
                                                    @can('Update-customer')
                                                    <button type="button" class="dropdown-item py-2 h6 m-0" id="editCustomer" data-url="{{ route('admin.customers.update', $customer->id) }}" data-name="{{ $customer->name }}" data-email="{{ $customer->email }}" data-mobile="{{ $customer->mobile }}">
                                                        <i class="mdi mdi-pencil align-middle text-success"></i>
                                                        {{ __('Edit') }}
                                                    </button>
                                                    @endcan
                                                    @can('Delete-customer')
                                                    <button type="button" class="dropdown-item py-2 h6 m-0" id="deleteCustomer" data-bs-target="#customerDeleteModal" data-url="{{ route('admin.customers.destroy', $customer->id) }}" data-name="{{ $customer->name }}">
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
                                        <td colspan="5">{{ __('No customers found.') }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@can('Create-customer')
<!-- Customer creation modal -->
<div class="modal fade" id="customerCreateModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="customerCreateModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="bg-light d-flex justify-content-between p-3">
                    <h4 class="card-title mb-0">{{ __('Add New Customer') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.customers.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row mb-3">
                                    <label for="name" class="col-sm-4 form-label mb-0 d-flex align-items-center text-left">
                                        {{ __('Customer Name') }} <span class="text-danger ml-1">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Enter name') }}" value="{{ old('name') }}" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row mb-3">
                                    <label for="email" class="col-sm-4 form-label mb-0 d-flex align-items-center text-left">
                                        {{ __('Email Address') }}
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('Enter email') }}" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row mb-3">
                                    <label for="mobile" class="col-sm-4 form-label mb-0 d-flex align-items-center text-left">
                                        {{ __('Contact Number') }}
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="{{ __('Enter number') }}" value="{{ old('mobile') }}">
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary mr-1">{{ __('Save') }}</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endcan

@can('Update-customer')
<!-- Customer updation modal -->
<div class="modal fade" id="customerEditModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="customerEditModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="bg-light d-flex justify-content-between p-3">
                    <h4 class="card-title mb-0">{{ __('Edit Customer') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row mb-3">
                                    <label for="name" class="col-sm-4 form-label mb-0 d-flex align-items-center text-left">
                                        {{ __('Customer Name') }} <span class="text-danger ml-1">*</span>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Enter name') }}" value="{{ old('name') }}" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row mb-3">
                                    <label for="email" class="col-sm-4 form-label mb-0 d-flex align-items-center text-left">
                                        {{ __('Email Address') }}
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('Enter email') }}" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row mb-3">
                                    <label for="mobile" class="col-sm-4 form-label mb-0 d-flex align-items-center text-left">
                                        {{ __('Contact Number') }}
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="{{ __('Enter number') }}" value="{{ old('mobile') }}">
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endcan

@can('Delete-customer')
<!-- Customer deletion modal -->
<div class="modal fade" id="customerDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title mb-3">{{ __('Delete Customer') }}</h5>
                <p class="mb-0">{{ __('Sure you want to remove') }} <strong id="name">User</strong>{{ __('? All of their appointments will be deleted as well.') }}</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger mr-1">{{ __('Delete') }}</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan

@endsection

@push('scripts-bottom')

@can('Update-customer')
<script>
    // Edit customer
    $(document).on("click", "#editCustomer", function() {
        var editUrl = $(this).data('url');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var mobile = $(this).data('mobile');

        $('#customerEditModal #name').val(name);
        $('#customerEditModal #email').val(email);
        $('#customerEditModal #mobile').val(mobile);
        $('#customerEditModal form').attr('action', editUrl);

        $('#customerEditModal').modal('show');
    });
</script>
@endcan

@can('Delete-customer')
<script>
    // Delete customer
    $(document).on("click", "#deleteCustomer", function() {
        var deleteUrl = $(this).data('url');
        var name = $(this).data('name');

        $('#customerDeleteModal #name').text(name);
        $('#customerDeleteModal form').attr('action', deleteUrl);

        $('#customerDeleteModal').modal('show');
    });
</script>
@endcan

@if (session('target'))
<script>
    $('#{{ session("target") }}').modal('show');
</script>
@endif

@endpush