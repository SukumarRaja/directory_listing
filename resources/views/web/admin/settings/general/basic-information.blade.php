@extends('t1.layouts.admin')

@section('title', __('Basic Information'))

@push('styles-top')
<link rel="stylesheet" href="{{ asset('assets/t1/b/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/t1/b/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/t1/b/vendors/dropify/css/dropify.min.css') }}">
@endpush

@section('content')
<div class="row">

    @include('t1.admin.settings.general.partials.menu')

    <div class="col-md-10">
        <div class="tab-content tab-content-vertical p-0 border-0">
            <div class="tab-pane fade show active">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Define Your Business') }}</h4>
                        <p class="card-description mb-4">
                            {{ __('Adjust basic information about your business.') }}
                        </p>

                        <form method="POST" action="{{ route('admin.settings.general.updateBasicInformation') }}" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="row gx-5">
                                <div class="col-12">
                                    <div class="form-group row mb-4">
                                        <label for="nameOfYourBusiness" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">
                                            {{ __('Name of your Business') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('nameOfYourBusiness') is-invalid @enderror" id="nameOfYourBusiness" name="nameOfYourBusiness" placeholder="{{ __('Enter name of your business') }}" value="{{ old('nameOfYourBusiness', $basicInfo['nameOfYourBusiness']) }}" required>
                                            @error('nameOfYourBusiness')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-4">
                                        <label for="email" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">
                                            {{ __('Email') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('Enter email') }}" value="{{ old('email', $basicInfo['email']) }}" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-4">
                                        <label for="contactNumber" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">
                                            {{ __('Contact Number') }}
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('contactNumber') is-invalid @enderror" id="contactNumber" name="contactNumber" placeholder="{{ __('Enter contact number') }}" value="{{ old('contactNumber', $basicInfo['contactNumber']) }}">
                                            @error('contactNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-4">
                                        <label for="timeZone" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">
                                            {{ __('Time Zone') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="w-100 @error('timeZone') is-invalid @enderror" name="timeZone" id="timeZone" required>
                                                <option value="" selected disabled>{{ __('-- Select time zone --') }}</option>
                                                @foreach ($timeZones as $k1 => $v1)
                                                <optgroup label="{{ $k1 }}">
                                                    @foreach ($v1 as $k2 => $v2)
                                                    <option value="{{ $k2 }}" {{ ($k2 == $basicInfo['timeZone']) ? 'selected' : '' }}>{{ $v2 }}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>
                                            @error('timeZone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-4">
                                        <label for="currency" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">
                                            {{ __('Currency') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="w-100 @error('currency') is-invalid @enderror" name="currency" id="currency" required>
                                                <option value="" selected disabled>{{ __('-- Select currency --') }}</option>
                                                @foreach ($currencies as $k1 => $v1)
                                                <option value="{{ $v1->code }}" {{ ($v1->code == $basicInfo['currency']) ? 'selected' : '' }}>{{ $v1->code }} ({{ $v1->symbol }})</option>
                                                @endforeach
                                            </select>
                                            @error('currency')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-4">
                                        <label for="startOfTheWeek" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">
                                            {{ __('Start of the Week') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="w-100 @error('startOfTheWeek') is-invalid @enderror" name="startOfTheWeek" id="startOfTheWeek" required>
                                                <option value="" selected disabled>{{ __('-- Select start day --') }}</option>
                                                <option value="0" {{ ($basicInfo['startOfTheWeek'] == 0) ? 'selected' : '' }}>{{ __('Sunday') }}</option>
                                                <option value="1" {{ ($basicInfo['startOfTheWeek'] == 1) ? 'selected' : '' }}>{{ __('Monday') }}</option>
                                                <option value="2" {{ ($basicInfo['startOfTheWeek'] == 2) ? 'selected' : '' }}>{{ __('Tuesday') }}</option>
                                                <option value="3" {{ ($basicInfo['startOfTheWeek'] == 3) ? 'selected' : '' }}>{{ __('Wednesday') }}</option>
                                                <option value="4" {{ ($basicInfo['startOfTheWeek'] == 4) ? 'selected' : '' }}>{{ __('Thursday') }}</option>
                                                <option value="5" {{ ($basicInfo['startOfTheWeek'] == 5) ? 'selected' : '' }}>{{ __('Friday') }}</option>
                                                <option value="6" {{ ($basicInfo['startOfTheWeek'] == 6) ? 'selected' : '' }}>{{ __('Saturday') }}</option>
                                            </select>
                                            @error('startOfTheWeek')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row mb-4">
                                        <label for="timeFormat" class="col-sm-3 form-label mb-0 d-flex align-items-center text-left">
                                            {{ __('Time Format') }}
                                            <span class="text-danger ml-1">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <div class="row px-3 @error('timeFormat') is-invalid @enderror">
                                                <div class="form-check @error('timeFormat') form-check-danger @enderror col-md-3">
                                                    <label class="form-check-label" for="12hours">
                                                        <input class="form-check-input" type="radio" name="timeFormat" id="12hours" value="12" {{ (old('timeFormat', $basicInfo['timeFormat']) == '12') ? 'checked' : ''  }} required>
                                                        {{ __('12 Hours') }}
                                                    </label>
                                                </div>
                                                <div class="form-check @error('timeFormat') form-check-danger @enderror col-md-3">
                                                    <label class="form-check-label" for="24hours">
                                                        <input class="form-check-input" type="radio" name="timeFormat" id="24hours" value="24" {{ (old('timeFormat', $basicInfo['timeFormat']) == '24') ? 'checked' : ''  }} required>
                                                        {{ __('24 Hours') }}
                                                    </label>
                                                </div>
                                            </div>
                                            @error('timeFormat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @can('Update-generalSettings')
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('Update Changes') }}</button>
                            </div>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2"></div>

    <div class="col-md-10 mt-5">
        <div class="tab-content tab-content-vertical p-0 border-0">
            <div class="tab-pane fade show active">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Logos & Icons') }}</h4>
                        <p class="card-description mb-4">
                            {{ __('We recommend using SVG & PNG files for your website logos and icons.') }}
                        </p>

                        <form method="POST" action="{{ route('admin.settings.general.updateLogosAndIcons') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <div class="col-md-4 mb-4">
                                    <label for="websiteLogo" class="form-label">
                                        {{ __('Website Logo') }}
                                        <small class="text-muted">(365px X 90px)</small>
                                    </label>
                                    <input type="file" class="dropify" name="websiteLogo" id="websiteLogo" data-show-remove="false" data-show-errors="false" data-default-file="{{ $basicInfo['websiteLogo'] }}">
                                    <span class="@error('websiteLogo') is-invalid @enderror"></span>
                                    @error('websiteLogo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="websiteIcon" class="form-label">
                                        {{ __('Website Icon') }}
                                        <small class="text-muted">(90px X 73px)</small>
                                    </label>
                                    <input type="file" class="dropify" name="websiteIcon" id="websiteIcon" data-show-remove="false" data-show-errors="false" data-default-file="{{ $basicInfo['websiteIcon'] }}">
                                    <span class="@error('websiteIcon') is-invalid @enderror"></span>
                                    @error('websiteIcon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="favicon" class="form-label">
                                        {{ __('Favicon') }}
                                        <small class="text-muted">(32px X 32px)</small>
                                    </label>
                                    <input type="file" class="dropify" name="favicon" id="favicon" data-show-remove="false" data-show-errors="false" data-default-file="{{ $basicInfo['favicon'] }}">
                                    <span class="@error('favicon') is-invalid @enderror"></span>
                                    @error('favicon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @can('Update-generalSettings')
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('Update Changes') }}</button>
                            </div>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts-bottom')
<script src="{{ asset('assets/t1/b/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/t1/b/vendors/dropify/js/dropify.min.js') }}"></script>
<script>
    $(function() {
        $("#timeZone, #currency, #startOfTheWeek").select2();
        $('.dropify').dropify();
    });
</script>
@endpush