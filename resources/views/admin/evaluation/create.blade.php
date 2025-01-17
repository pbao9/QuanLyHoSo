@extends('admin.layouts.master')
@push('libs-css')
    <link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2-bootstrap-5-theme.min.css') }}">
@endpush
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-muted">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Thêm bảng đánh giá') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <x-form id="notificationForm" :action="route('admin.evaluation.store')" type="post" :validate="true">
                <div class="row justify-content-center">
                    {{-- <input type="hidden" name="device_token" value=""> --}}
                    <input type="hidden" name="evaluation[admin_id]" value="{{ auth()->user()->id }}">
                    @include('admin.evaluation.forms.create-left')
                    @include('admin.evaluation.forms.create-right')
                </div>
            </x-form>
        </div>
    </div>
@endsection

@push('libs-js')
    <script src="{{ asset('/public/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/public/libs/select2/dist/js/i18n/vi.js') }}"></script>
    <script src="{{ asset('/public/libs/jquery-throttle-debounce/jquery.ba-throttle-debounce.min.js') }}"></script>
@endpush

@push('custom-js')
    <script>
        $(document).ready(function() {
            let previousElement = null;
            $('#department-select').on('change', function() {
                const departmentId = $(this).val();
                const departmentName = $(this).find('option:selected').text();
                const appUrl = "{{ env('APP_URL') }}";

                // Ẩn element trước đó nếu có
                if (previousElement) {
                    previousElement.fadeOut(300, function() {
                        $(this).attr('style', 'display: none;');
                    });
                }

                if (departmentId) {
                    // Ajax lấy thông tin khoa
                    $.ajax({
                        url: `${appUrl}/admin/phong-khoa/khoa/${departmentId}`,
                        type: 'GET',
                        data: {
                            key: 'key'
                        },
                        success: function(response) {
                            if (response.key) {
                                console.log(`Có ${departmentName} với key: ${response.key}`);

                                // Tìm element có id trùng với key
                                const departmentElement = $(`#${response.key}`);
                                if (departmentElement.length > 0) {
                                    // Bỏ thuộc tính style display none
                                    departmentElement.removeAttr('style').hide().fadeIn(300);
                                    previousElement = departmentElement;
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching department:', error);
                        }
                    });

                    // Ajax lấy ca làm việc 
                    $.ajax({
                        url: `${appUrl}/admin/danh-gia/ca-lam-viec`,
                        type: 'GET',
                        data: {
                            department_id: departmentId
                        },
                        success: function(data) {
                            const shiftSelect = $('#shift-select');
                            shiftSelect.empty();

                            if (Array.isArray(data) && data.length > 0) {
                                $.each(data, function(index, shift) {
                                    shiftSelect.append(new Option(shift.title, shift
                                        .id));
                                });
                                $('#shift-select').show();
                                $('#no-shifts-message').hide();
                            } else {
                                $('#shift-select').hide();
                                $('#no-shifts-message').show();
                            }
                            $('#shift-container').fadeIn();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching shifts:', error);
                        }
                    });
                } else {
                    $('#shift-container')
                        .fadeOut();
                }
            });
        });
    </script>
@endpush
