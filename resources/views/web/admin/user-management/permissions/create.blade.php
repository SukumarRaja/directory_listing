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
                            <h4 class="card-title">{{ __('Create New Permission') }}</h4>
                            <a href="{{ route('admin.permissions.index') }}" class="btn btn-sm btn-light btn-icon-text">
                                <i class="ti-arrow-left btn-icon-prepend"></i>
                                {{ __('Back') }}
                            </a>
                        </div>

                        <div class="alert alert-warning mb-4" role="alert">
                            <strong>{{ __('Warning!') }}</strong> {{ __('Be aware of creating permission, you might break the system permissions functionality. Please ensure you\'re absolutely certain before proceeding.') }}
                        </div>

                        <form method="POST" action="{{ route('admin.permissions.store') }}" autocomplete="off">
                            @csrf

                            <div class="row gx-5">
                                <div class="col-12">
                                    <div class="form-group row mb-4">
                                        <label for="permissionGroupName" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Permission Group Name') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('permissionGroupName') is-invalid @enderror" id="permissionGroupName" name="permissionGroupName" placeholder="{{ __('Enter permission group name') }}" value="{{ old('permissionGroupName') }}" required autofocus>
                                            @error('permissionGroupName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-4">
                                        <label for="permissionSuffix" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Permission Suffix') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('permissionSuffix') is-invalid @enderror" id="permissionSuffix" name="permissionSuffix" placeholder="{{ __('Enter permission suffix') }}" value="{{ old('permissionSuffix') }}" required>
                                            @error('permissionSuffix')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-4">
                                        <label for="permissions" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Permissions') }}</label>
                                        <div class="col-sm-9">
                                            <div class="row px-3 @error('permissions') is-invalid @enderror">
                                                <div class="form-check col @error('permissions') form-check-danger @enderror">
                                                    <label class="form-check-label" for="create">
                                                        <input class="form-check-input" type="checkbox" id="create" value="Create" name="permissions[]" @if(is_array(old('permissions')) && in_array('Create', old('permissions'))) checked @endif>
                                                        {{ __('Create') }}
                                                    </label>
                                                </div>
                                                <div class="form-check col @error('permissions') form-check-danger @enderror">
                                                    <label class="form-check-label" for="read">
                                                        <input class="form-check-input" type="checkbox" id="read" value="Read" name="permissions[]" @if(is_array(old('permissions')) && in_array('Read', old('permissions'))) checked @endif>
                                                        {{ __('Read') }}
                                                    </label>
                                                </div>
                                                <div class="form-check col @error('permissions') form-check-danger @enderror">
                                                    <label class="form-check-label" for="update">
                                                        <input class="form-check-input" type="checkbox" id="update" value="Update" name="permissions[]" @if(is_array(old('permissions')) && in_array('Update', old('permissions'))) checked @endif>
                                                        {{ __('Update') }}
                                                    </label>
                                                </div>
                                                <div class="form-check col @error('permissions') form-check-danger @enderror">
                                                    <label class="form-check-label" for="delete">
                                                        <input class="form-check-input" type="checkbox" id="delete" value="Delete" name="permissions[]" @if(is_array(old('permissions')) && in_array('Delete', old('permissions'))) checked @endif>
                                                        {{ __('Delete') }}
                                                    </label>
                                                </div>
                                            </div>
                                            @error('permissions')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('Create Permission') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection