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
        <div class="container-fluid">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h2 class="mb-0">@lang('Danh Sách Tiêu chí') - <x-link :href="route('admin.evaluation.category.edit', $category->id)" :title="$category->name"></x-link></h2>
                    <div>
                        <x-link :href="route('admin.evaluation.category.edit', ['id' => $category->id])" class="btn btn-success">
                            <i class="ti ti-arrow-back-up me-2"></i>
                            {{ __('Quay lại') }}
                        </x-link>
                        <x-link :href="route('admin.evaluation.category.criteria.create', ['category_id' => $category])" class="btn btn-primary">
                            <i class="ti ti-plus me-2"></i>
                            {{ __('Thêm tiêu chí') }}
                        </x-link>
                    </div>
                   
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
