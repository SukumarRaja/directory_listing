@extends('t1.layouts.admin')

@section('title', __('Working Hours'))

@can('Update-generalSettings')
@push('styles-top')
<link rel="stylesheet" href="{{ asset('assets/t1/b/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/t1/b/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
<style>
    .select2-dropdown {
        z-index: 9999;
    }

    .js-example-basic-single {
        width: 110px;
    }
</style>
@endpush
@endcan

@section('content')
<div class="row">

    @include('t1.admin.settings.general.partials.menu')

    <div class="col-md-10">
        <div class="tab-content tab-content-vertical p-0 border-0">
            <div class="tab-pane fade show active">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-md-between mb-4">
                            <div>
                                <h4 class="card-title">{{ __('Working Hours') }}</h4>
                                <p class="card-description">
                                    {{ __('This section lets you define the working hours for your business.') }}
                                </p>
                            </div>
                            @can('Update-generalSettings')
                            <div>
                                <button type="button" class="btn btn-sm btn-primary btn-icon-text" id="edit-working-hours-btn">
                                    <i class="ti-pencil-alt btn-icon-prepend"></i>
                                    {{ __('Edit') }}
                                </button>
                            </div>
                            @endcan
                        </div>

                        @if ($workingHours->count())
                        <div class="pl-md-5">
                            @foreach ($workingHours as $k1 => $v1)
                            <div class="d-block d-md-flex">
                                <div class="mt-2 w-25">
                                    <div class="d-flex align-items-center">
                                        <i class="ti-time text-muted pr-2"></i>
                                        <span>{{ ucfirst(__($v1[0]['day_of_week'])) }}</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column pl-4 pl-md-0 mt-2 mt-md-0">
                                    @foreach ($v1 as $k2 => $v2)
                                    @if (is_null($v2['open_time']) && is_null($v2['close_time']))
                                    <div class="mt-0 mt-md-2  mb-3">
                                        <span class="text-danger">{{ __('Not available') }}</span>
                                    </div>
                                    @else
                                    <div class="mb-3">
                                        <span>{{ $v2['open_time'] }}</span>
                                        <span class="px-2">-</span>
                                        <span>{{ $v2['close_time'] }}</span>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <hr class="mt-0">
                            @endforeach
                        </div>
                        @else
                        <div class="table">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td class="border-0 text-center">{{ __('Set up your availability') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@can('Update-generalSettings')
<div id="edit-working-hours-overlay"></div>
<div id="edit-working-hours" class="settings-panel panel-w-100 panel-w-md-55">
    <i class="settings-close ti-close" id="edit-working-hours-close-btn"></i>
    <ul class="nav nav-tabs justify-content-start border-top">
        <li class="nav-item">
            <a class="nav-link active">{{ __('Edit Working Hours') }}</a>
        </li>
    </ul>
    <div class="px-3 px-md-5 pt-4 pt-md-5 overflow-auto" style="height: 95%; padding-bottom: 100px;">

        @if (session('type') == "message")
        <div class="alert alert-{{ (session('status') == 'error') ? 'danger' : session('status') }} alert-dismissible fade show mb-4" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($workingHours->count())
        <form action="{{ route('admin.settings.general.updateWorkingHours') }}" method="POST">
            @csrf
            @method('PUT')

            @foreach ($workingHours as $k1 => $v1)
            <div class="d-block d-md-flex editWorkingHoursWeekdayFields">
                <div class="w-25">
                    <div class="d-flex align-items-center">
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="editWorkingHoursCheckbox" value="1" {{ (($v1[0]['open_time'] == null) && ($v1[0]['close_time'] == null)) ? '' : 'checked'; }}>
                            </label>
                        </div>
                        <span>{{ ucfirst(__($v1[0]['day_of_week'])) }}</span>
                    </div>
                </div>
                <div class="d-flex flex-column pl-4 pl-md-0 mt-2 mt-md-0" id="weekdaySelectFields" data-weekday="{{ $v1[0]['day_of_week'] }}">
                    @foreach ($v1 as $k2 => $v2)
                    <div class="mb-3" data-select2row-id="{{ $k2 }}">
                        <span>
                            <select class="js-example-basic-single" name="{{ $v2['day_of_week'] }}[{{ $k2 }}][from]" id="editWorkingHoursFrom" data-select2-id="from-{{ $v2['day_of_week'] }}-{{ $k2 }}" {{ is_null($v2['open_time']) ? 'disabled' : '' }}>
                                <option value="" selected disabled>{{ __('From') }}</option>
                                @foreach ($defaultTimeIntervals as $key => $defaultTimeInterval)
                                <option value="{{ $defaultTimeInterval['key'] }}" data-option-id="{{ $key }}" {{ ($v2['open_time'] == $defaultTimeInterval['value']) ? 'selected' : '' }}>
                                    {{ $defaultTimeInterval['value'] }}
                                </option>
                                @endforeach
                            </select>
                        </span>
                        <span class="px-2">-</span>
                        <span>
                            <select class="js-example-basic-single" name="{{ $v2['day_of_week'] }}[{{ $k2 }}][to]" id="editWorkingHoursTo" data-select2-id="to-{{ $v2['day_of_week'] }}-{{ $k2 }}" {{ is_null($v2['close_time']) ? 'disabled' : '' }}>
                                <option value="" selected disabled>{{ __('To') }}</option>
                                @foreach ($defaultTimeIntervals as $key => $defaultTimeInterval)
                                <option value="{{ $defaultTimeInterval['key'] }}" data-option-id="{{ $key }}" {{ ($v2['close_time'] == $defaultTimeInterval['value']) ? 'selected' : '' }}>
                                    {{ $defaultTimeInterval['value'] }}
                                </option>
                                @endforeach
                            </select>
                        </span>
                        <i style="cursor: pointer;" class="ti-plus text-muted pl-2 {{ ((!is_null($v1[0]['open_time']) && !is_null($v1[0]['close_time'])) && (($k2 + 1) == count($v1))) ? '' : 'invisible' }}" id="timeSlot-addBtn"></i>
                        <i style="cursor: pointer;" class="ti-trash text-muted pl-2 {{ ((!is_null($v1[0]['open_time']) && !is_null($v1[0]['close_time'])) && ($k2 > 0)) ? '' : 'invisible' }}" id="timeSlot-deleteBtn"></i>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                <button type="button" class="btn btn-light" id="cancel-btn">{{ __('Cancel') }}</button>
            </div>
        </form>
        @else
        <div class="table">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td class="border-0 text-center">{{ __('Set up your availability') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endcan
@endsection

@can('Update-generalSettings')
@push('scripts-bottom')
<script src="{{ asset('assets/t1/b/vendors/select2/select2.min.js') }}"></script>
<script>
    $(function() {
        // Initialize select2 for all select fields.
        $('.js-example-basic-single').select2();

        // Open edit working hours panel.
        $('#edit-working-hours-btn').on('click', function() {
            $('#edit-working-hours').toggleClass('open');
            $('#edit-working-hours-overlay').toggleClass('panel-overlay');
            $('html').toggleClass('overflow-hidden');
        });

        // Close edit working hours panel.
        $('#edit-working-hours-close-btn, #cancel-btn').on('click', function() {
            $('#edit-working-hours, #theme-settings').removeClass('open');
            $('#edit-working-hours-overlay').removeClass('panel-overlay');
            $('html').removeClass('overflow-hidden');
        });

        // Disable select fields and hide add & delete button on unchecking checkbox and vice versa.
        $(document).on('click', '#editWorkingHoursCheckbox', function() {
            var editWorkingHoursWeekdayFields = $(this).closest('.editWorkingHoursWeekdayFields');

            if ($(this).is(':checked')) {
                editWorkingHoursWeekdayFields.find('.js-example-basic-single').prop('disabled', false);
                editWorkingHoursWeekdayFields.find('.ti-plus').removeClass('d-none');
                editWorkingHoursWeekdayFields.find('.ti-trash').removeClass('d-none');
            } else {
                editWorkingHoursWeekdayFields.find('.js-example-basic-single').prop('disabled', true);
                editWorkingHoursWeekdayFields.find('.ti-plus').addClass('d-none');
                editWorkingHoursWeekdayFields.find('.ti-trash').addClass('d-none');
            }
        });

        // Hide add button on no options to select.
        $(document).on('click', '#timeSlot-deleteBtn', function() {
            var weekdaySelectFields = $(this).closest('#weekdaySelectFields');

            $(this).parent().remove();

            var finalFromValue = weekdaySelectFields.children().find('#editWorkingHoursTo').last().find(':selected').next().attr('data-option-id');
            var finalToValue = weekdaySelectFields.children().find('#editWorkingHoursTo').last().find(':selected').next().next().attr('data-option-id');

            if ((finalFromValue == undefined) || (finalToValue == undefined)) {
                weekdaySelectFields.children().find('#timeSlot-addBtn').last().addClass('invisible');
            } else {
                weekdaySelectFields.children().find('#timeSlot-addBtn').last().removeClass('invisible');
            }
        });

        // Add new select fields on clicking add button.
        $(document).on('click', '#timeSlot-addBtn', function() {
            var weekdaySelectFields = $(this).closest('#weekdaySelectFields');
            var weekday = weekdaySelectFields.attr('data-weekday');
            var weekdaySelectFieldsRowId = parseInt($(this).closest('#weekdaySelectFields').children().last().attr('data-select2row-id')) + 1;
            var nextFromValue = weekdaySelectFields.children().find('#editWorkingHoursTo').last().find(':selected').next().attr('data-option-id');
            var nextToValue = weekdaySelectFields.children().find('#editWorkingHoursTo').last().find(':selected').next().next().attr('data-option-id');
            var finalFromValue = weekdaySelectFields.children().find('#editWorkingHoursTo').last().find(':selected').next().next().next().attr('data-option-id');
            var finalToValue = weekdaySelectFields.children().find('#editWorkingHoursTo').last().find(':selected').next().next().next().next().attr('data-option-id');
            var newElement = '<div class="mb-3" data-select2row-id="' + weekdaySelectFieldsRowId + '">\
                                <span>\
                                    <select class="js-example-basic-single" name="' + weekday + '[' + weekdaySelectFieldsRowId + '][from]" id="editWorkingHoursFrom" data-select2-id="from-' + weekday + '-' + weekdaySelectFieldsRowId + '">\
                                        <option value="" selected disabled>{{ __("From") }}</option>\
                                        @foreach ($defaultTimeIntervals as $key => $defaultTimeInterval)\
                                        <option value="{{ $defaultTimeInterval["key"] }}" data-option-id="{{ $key }}">\
                                            {{ $defaultTimeInterval["value"] }}\
                                        </option>\
                                        @endforeach\
                                    </select>\
                                </span>\
                                <span class="px-2">-</span>\
                                <span>\
                                    <select class="js-example-basic-single" name="' + weekday + '[' + weekdaySelectFieldsRowId + '][to]" id="editWorkingHoursTo" data-select2-id="to-' + weekday + '-' + weekdaySelectFieldsRowId + '">\
                                        <option value="" selected disabled>{{ __("To") }}</option>\
                                        @foreach ($defaultTimeIntervals as $key => $defaultTimeInterval)\
                                        <option value="{{ $defaultTimeInterval["key"] }}" data-option-id="{{ $key }}">\
                                            {{ $defaultTimeInterval["value"] }}\
                                        </option>\
                                        @endforeach\
                                    </select>\
                                </span>\
                                <i style="cursor: pointer;" class="ti-plus text-muted pl-2" id="timeSlot-addBtn"></i>\
                                <i style="cursor: pointer;" class="ti-trash text-muted pl-2" id="timeSlot-deleteBtn"></i>\
                            </div>';

            weekdaySelectFields.append(newElement);
            var selectFieldFrom = weekdaySelectFields.children().find('#editWorkingHoursFrom').last().select2();
            selectFieldFrom.find('option[data-option-id=' + nextFromValue + ']').attr('selected', 'selected').trigger('change');
            var selectFieldTo = weekdaySelectFields.children().find('#editWorkingHoursTo').last().select2();
            selectFieldTo.find('option[data-option-id=' + nextToValue + ']').attr('selected', 'selected').trigger('change');

            if ((finalFromValue == undefined) || (finalToValue == undefined)) {
                weekdaySelectFields.children().find('#timeSlot-addBtn').last().addClass('invisible');
            }

            $(this).addClass('invisible');
        });

        // Hide add button on changing #editWorkingHoursTo if no next options present.
        $(document).on('change', '#editWorkingHoursTo', function() {
            var weekdaySelectFields = $(this).closest('#weekdaySelectFields').children();
            var thisSelect2Id = $(this).attr('data-select2-id');
            var lastSelect2Id = weekdaySelectFields.find('#editWorkingHoursTo').last().attr('data-select2-id');
            var finalFromValue = weekdaySelectFields.find('#editWorkingHoursTo').last().find(':selected').next().attr('data-option-id');
            var finalToValue = weekdaySelectFields.find('#editWorkingHoursTo').last().find(':selected').next().next().attr('data-option-id');

            if ((thisSelect2Id == lastSelect2Id) && (finalFromValue != undefined) && (finalToValue != undefined)) {
                weekdaySelectFields.find('#timeSlot-addBtn').last().removeClass('invisible');
            } else {
                weekdaySelectFields.find('#timeSlot-addBtn').last().addClass('invisible');
            }
        });
    });
</script>
@if (session('target') == "updateWorkingHours")
<script>
    $(function() {
        $('#edit-working-hours').toggleClass('open');
        $('#edit-working-hours-overlay').toggleClass('panel-overlay');
        $('html').toggleClass('overflow-hidden');
    });
</script>
@endif
@endpush
@endcan