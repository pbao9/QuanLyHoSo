@extends('admin.layouts.master')

@push('libs-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.6.2/css/select.bootstrap5.min.css">
    <style>
        td {
            vertical-align: middle;
        }
    </style>
@endpush

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h2 class="mb-0 text-uppercase">@lang('Danh sách phòng khoa')</h2>
                    <x-link :href="route('admin.department.create')" class="btn btn-blue">
                        <i class="ti ti-plus me-2"></i>
                        {{ __('Thêm phòng khoa') }}
                    </x-link>
                </div>

                <div class="card-body">
                    <div class="table-responsive position-relative">
                        <x-admin.partials.toggle-column-datatable />
                        @isset($actionMultiple)
                            <x-admin.partials.select-action-multiple :actionMultiple="$actionMultiple" />
                        @endisset
                        {{ $dataTable->table(['class' => 'table table-bordered'], true) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('libs-js')
    <script src="{{ asset('/public/vendor/datatables/buttons.server-side.js') }}"></script>
@endpush

@push('custom-js')
    {{ $dataTable->scripts() }}

    @include('admin.scripts.datatable-toggle-columns', [
        'id_table' => $dataTable->getTableAttribute('id'),
    ])
@endpush
