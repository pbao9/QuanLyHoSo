<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            <span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
        </div>
        <div class="card-body p-2">
            <div class="d-flex align-items-center h-100 gap-2">
                <x-button.submit :title="__('Lưu')" name="submitter" value="save" />
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <label class="mb-1" for=""><i class="ti ti-tag"></i> {{ __('Khoa') }} <span
                    class="text-danger">*</span></label>
        </div>
        <div class="card-body p-2">
            <x-select class="evaluation-type" name="evaluation[department_id]" :required="true" id="department-select">
                <option value="" disabled selected>-- Chọn khoa --</option>
                @foreach ($types as $item)
                    <x-select-option :value="$item->id" :title="$item->name" />
                @endforeach
            </x-select>
        </div>
    </div>

    <div class="card mb-3" id="shift-container" style="display: none;">
        <div class="card-header">
            <label class="mb-1" for=""><i class="ti ti-tag"></i> {{ __('Ca làm việc') }} <span
                    class="text-danger">*</span></label>
        </div>
        <div class="card-body p-2">
            <x-select name="evaluation[shift_id]" id="shift-select">
            </x-select>
            <div id="no-shifts-message" class="alert alert-danger">
                Không có ca làm việc cho khoa này
            </div>
        </div>
    </div>
</div>



