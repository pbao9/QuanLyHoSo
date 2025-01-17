@extends('admin.layouts.master')

@section('content')
				<div class="page-header d-print-none">
								<div class="container-xl">
												<div class="row g-2 align-items-center">
																<div class="col">
																				<nav aria-label="breadcrumb">
																								<ol class="breadcrumb">
																												<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
																																				class="text-muted">{{ __('Dashboard') }}</a></li>
																												<li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}"
																																				class="text-muted">{{ __('Product') }}</a></li>
																												<li class="breadcrumb-item active" aria-current="page">{{ __('Thêm nội dung sách') }}</li>
																								</ol>
																				</nav>
																</div>
												</div>
								</div>
				</div>
				<div class="page-body">
								<div class="container-xl">
												<x-form id="form" :action="route('admin.product.item.store')" type="post" :validate="true" enctype="multipart/form-data">
																<x-input type="hidden" name="product_id" :value="$product->id" />
																<div class="row justify-content-center">
																				@include('admin.products.items.forms.create-left')
																				@include('admin.products.items.forms.create-right')
																</div>
												</x-form>
								</div>
				</div>
@endsection

@push('libs-js')
				@include('ckfinder::setup')
@endpush

@push('custom-js')
				@include('admin.products.items.scripts.scripts')
@endpush
