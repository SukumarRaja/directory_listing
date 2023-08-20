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
                            <h4 class="card-title">{{ __('Create New User') }}</h4>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-light btn-icon-text">
                                <i class="ti-arrow-left btn-icon-prepend"></i>
                                {{ __('Back') }}
                            </a>
                        </div>

                        <form method="POST" action="{{ route('admin.users.store') }}" autocomplete="off">
                            @csrf

                            <h5 class="font-size-14 my-4">
                                <i class="mdi mdi-arrow-right text-primary mr-1"></i>
                                {{ __('Public Information') }}
                            </h5>

                            <div class="row gx-5">
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="firstName" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('First Name') }} <span class="text-danger ml-1">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName" name="firstName" placeholder="{{ __('Enter user first name') }}" value="{{ old('firstName') }}" required>
                                            @error('firstName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="lastName" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Last Name') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName" placeholder="{{ __('Enter user last name') }}" value="{{ old('lastName') }}">
                                            @error('lastName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="username" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Username') }} <span class="text-danger ml-1">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-dark">@</span>
                                                </div>
                                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="{{ __('Enter user username') }}" value="{{ old('username') }}" required>
                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="email" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Email') }} <span class="text-danger ml-1">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('Enter user email address') }}" value="{{ old('email') }}" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="roles" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Roles') }}
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="form-control @error('roles') is-invalid @enderror" name="roles[]" id="roles" multiple>
                                                <option value="" selected disabled>-- Select roles --</option>
                                                @if ($roles->count() > 0)
                                                @foreach ($roles as $role)
                                                <option class="text-dark" value="{{ $role->id }}" @if(is_array(old('role')) && in_array($role->id, old('role'))) selected @endif>{{ $role->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @error('roles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                            <div class="form-check form-check-primary">
                                                <label for="emailVerification" class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="emailVerification" id="emailVerification" value="1" {{ (old('emailVerification') == '1') ? 'checked' : ''  }}>
                                                    {{ __('Email Verification') }}
                                                </label>
                                            </div>
                                        </div>
                                        <label class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                            <div class="form-check form-check-primary">
                                                <label for="isActive" class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="isActive" id="isActive" value="1" {{ (old('isActive') == '1') ? 'checked' : ''  }}>
                                                    {{ __('Is Active') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="password" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">
                                            {{ __('Password') }} <span class="text-danger ml-1">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <div class="input-group @error('password') is-invalid @enderror">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Enter user password') }}" autocomplete="current-password" required>
                                                <div class="input-group-append" id="password-visibility">
                                                    <span class="input-group-text">
                                                        <i class="mdi mdi-eye-outline text-dark"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="font-size-14 my-4">
                                <i class="mdi mdi-arrow-right text-primary mr-1"></i>
                                {{ __('Private Information') }}
                            </h5>

                            <div class="row gx-5">
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="mobile" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Mobile Number') }}</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text text-dark">+91</span>
                                                </div>
                                                <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="{{ __('Enter user mobile number') }}" value="{{ old('mobile') }}">
                                                @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="dob" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Date of Birth') }}</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}">
                                            @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="gender" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Gender') }}</label>
                                        <div class="col-sm-9">
                                            <div class="row px-3">
                                                <div class="form-check col">
                                                    <label class="form-check-label" for="m">
                                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="m" value="m" {{ (old('gender') == 'm') ? 'checked' : ''  }}>
                                                        {{ __('Male') }}
                                                    </label>
                                                </div>
                                                <div class="form-check col">
                                                    <label class="form-check-label" for="f">
                                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="f" value="f" {{ (old('gender') == 'f') ? 'checked' : ''  }}>
                                                        {{ __('Female') }}
                                                    </label>
                                                </div>
                                                <div class="form-check col">
                                                    <label class="form-check-label" for="o">
                                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="o" value="o" {{ (old('gender') == 'o') ? 'checked' : ''  }}>
                                                        {{ __('Other') }}
                                                    </label>
                                                </div>
                                            </div>
                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="pinCode" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Pincode') }}</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control @error('pinCode') is-invalid @enderror" id="pinCode" name="pinCode" placeholder="{{ __('Enter user pincode') }}" value="{{ old('pinCode') }}">
                                            @error('pinCode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="country" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Country') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" placeholder="{{ __('Enter user country') }}" value="{{ old('country') }}">
                                            @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="state" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('State') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" placeholder="{{ __('Enter user state') }}" value="{{ old('state') }}">
                                            @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="district" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('District') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" name="district" placeholder="{{ __('Enter user district') }}" value="{{ old('district') }}">
                                            @error('district')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mb-4">
                                        <label for="postOffice" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">{{ __('Post Office') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('postOffice') is-invalid @enderror" id="postOffice" name="postOffice" placeholder="{{ __('Enter user post office') }}" value="{{ old('postOffice') }}">
                                            @error('postOffice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('Create User') }}</button>
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
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#pinCode').on('keyup', function() {
            if ($(this).val().length == 6) {
                $.get("{{ route('pincode.find', '') }}" + '/' + $(this).val(), function(data) {
                    if (data[0]['Status'] == "Success") {
                        $('#country').val(data[0]['PostOffice'][0]['Country']);
                        $('#state').val(data[0]['PostOffice'][0]['State']);
                        $('#district').val(data[0]['PostOffice'][0]['District']);
                        $('#postOffice').replaceWith('<select class="form-control" id="postOffice" name="postOffice" required><option value="" selected>-- Select post office --</option></select>');
                        $(data[0]['PostOffice']).each(function() {
                            $('#postOffice').append('<option value=' + $(this)[0]['Name'] + '>' + $(this)[0]['Name'] + '</option>');
                        });
                    } else if (data[0]['Status'] == "Error") {
                        $('#country, #state, #district').val('');
                        $('#postOffice').replaceWith('<input type="text" class="form-control" id="postOffice" name="postOffice" placeholder="Enter your post office">');
                    }
                });
            }
        });
    });
</script>
@endpush