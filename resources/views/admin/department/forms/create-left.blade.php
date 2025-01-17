<div class="col-12 col-md-9">
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <div class="card-title">
                {{ __('Phòng Khoa') }}
            </div>
        </div>
        <div class="row card-body">
            <!-- title -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label for="" class="mb-2"><i class="ti ti-pencil"></i> {{ __('Tên phòng khoa') }} <span
                            class="text-danger">*</span></label>
                    <x-input name="department[name]" :value="old('title')" :placeholder="__('Tên phòng khoa')" />
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label for="" class="mb-2"><i class="ti ti-key"></i> {{ __('Key') }} <span
                            class="text-danger">*</span></label>
                    <x-input name="department[key]" :value="old('title')" :placeholder="__('Key hiển thị')" />
                </div>
            </div>
        </div>
    </div>
    @include('admin.department.forms.shift')
</div>
