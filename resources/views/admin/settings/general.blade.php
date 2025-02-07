@extends('admin.layouts.master')

@push('libs-css')
				<link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2.min.css') }}">
				<link rel="stylesheet" href="{{ asset('/public/libs/select2/dist/css/select2-bootstrap-5-theme.min.css') }}">
@endpush
@push('custom-css')
				<style>
								.wrap-loop-input .add-image-ckfinder {
												max-width: 300px;
												display: block;
								}
				</style>
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
																												<li class="breadcrumb-item active" aria-current="page">{{ __('Cài đặt chung') }}</li>
																								</ol>
																				</nav>
																</div>
												</div>
								</div>
				</div>
				<div class="page-body">
								<div class="container-xl">
												<x-form :action="route('admin.setting.update')" type="put" :validate="true">
																<div class="row justify-content-center">
																				<div class="col-12 col-md-9">
																								@include('admin.settings.forms.edit-left')
																				</div>
																				@include('admin.settings.forms.edit-right')
																</div>
												</x-form>
								</div>
				</div>
@endsection

@push('libs-js')
				@include('ckfinder::setup')
				<script src="{{ asset('public/libs/ckeditor/ckeditor.js') }}"></script>
				<script src="{{ asset('public/libs/ckeditor/adapters/jquery.js') }}"></script>
				<script src="{{ asset('/public/libs/select2/dist/js/select2.min.js') }}"></script>
				<script src="{{ asset('/public/libs/select2/dist/js/i18n/vi.js') }}"></script>
@endpush

@push('custom-js')
				<script>
								$(document).ready(function(e) {
												$('.select2-bs5-ajax').each(function() {
																console.log(this);
																var url = $(this).data('url');
																select2LoadData(url, $('.select2-bs5-ajax'));
												});
								});
				</script>
@endpush
