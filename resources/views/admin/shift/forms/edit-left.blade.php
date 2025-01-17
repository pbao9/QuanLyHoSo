<div class="col-12 col-md-9">
    <div class="card">
        <div class="row card-body">
            <!-- title -->
            <div class="col-12">
                <div class="mb-3">
                    <label for=""><i class="ti ti-pencil"></i> {{ __('Tên khoa') }} <span
                            class="text-danger">*</span></label>
                    <x-input :value="$department->name" name="name" :required="true" :placeholder="__('Tiêu đề')" />
                </div>
            </div>
        </div>
    </div>
</div>
