@extends('admin.layouts.guest.master')

@section('content')
    <style>
        h1 {
            font-size: 5em;
            color: #2685c5;
        }


        p {
            font-size: 1.2em;
            color: #555;
        }
    </style>
    <div class="page page-center"
        style="background: url({{ asset('/public/assets/images/background.svg') }})  no-repeat; background-size: cover; background-position: center;">
        <div class="container-tight py-4">
            <div class="card card-md bg-blur-custom rounded-4 p-5 text-center">
                <h1 class="mx-auto">404</h1>
                <p>Oops! Không tìm thấy trang hoặc đã bị xoá nội dung này!</p>

                <x-link :href="route('admin.dashboard')" :title="__('Quay về trang chủ')" class="btn btn-blue"></x-link>
            </div>
        </div>
    </div>
@endsection
