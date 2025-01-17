<div class="col-12 col-md-9">
    <div class="card">
        <div class="row card-body">
            <!-- title -->
            <div class="col-12">
                <div class="mb-3">
                    <label for=""><i class="ti ti-pencil"></i> {{ __('Ca làm việc') }} <span
                            class="text-danger">*</span></label>
                    <x-input name="title" :value="old('title')" :placeholder="__('Ca làm việc sáng, chiều, tối. Thời gian cụ thể 08:00 - 15:00...')" />
                </div>
            </div>
        </div>
    </div>
</div>
