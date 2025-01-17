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
            <div class="alert alert-primary text-uppercase fw-bold">
                {{ $evaluation->department->name }}
            </div>
            <input type="hidden" name="evaluation[department_id]" value="{{ $evaluation->department_id }}">
        </div>
    </div>

    <div class="card mb-3" id="shift-container">
        <div class="card-header">
            <label class="mb-1" for=""><i class="ti ti-tag"></i> {{ __('Ca làm việc') }} <span
                    class="text-danger">*</span></label>
        </div>
        <div class="card-body p-2">
            @if ($evaluation->shift)
                <div class="alert alert-primary text-uppercase fw-bold">
                    {{ $evaluation->shift->title }}
                </div>
                <input type="hidden" name="evaluation[shift_id]" value="{{ $evaluation->shift_id }}">
            @else
                <div class="alert alert-danger">
                    Không có ca làm việc cho khoa này
                </div>
            @endif
        </div>
    </div>
</div>
