@extends('admin.layouts.master')
@push('libs-css')
    <link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2-bootstrap-5-theme.min.css') }}">
@endpush
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.evaluation.category.criteria.update', [
                'category_id' => $criteria->category_id,
                'id' => $criteria->id,
            ])" type="put" :validate="true">
                <x-input type="hidden" name="id" :value="$criteria->id" />
                <x-input type="hidden" name="category_id" :value="$criteria->category_id" />
                <div class="row justify-content-center">
                    @include('admin.evaluation_criteria.forms.edit-left')
                    @include('admin.evaluation_criteria.forms.edit-right')
                </div>
            </x-form>
        </div>
    </div>
@endsection

@push('libs-js')
    <script src="{{ asset('/public/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/public/libs/select2/dist/js/i18n/' . trans()->getLocale() . '.js') }}"></script>
    <script src="{{ asset('/public/libs/jquery-throttle-debounce/jquery.ba-throttle-debounce.min.js') }}"></script>
@endpush

@push('custom-js')
    @include('admin.notifications.scripts.scripts')
@endpush
