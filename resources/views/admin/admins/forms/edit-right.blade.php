<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            <span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
        </div>
        <div class="card-body d-flex justify-content-between p-2">
            <x-button.submit :title="__('Cập nhật')" />
            <x-button.modal-delete data-route="{{ route('admin.admin.delete', $admin->id) }}" :title="__('Xóa')" />
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <span><i class="ti ti-circles me-2"></i>{{ __('Phòng khoa') }}</span>
        </div>
        <div class="card-body p-2">
            <x-select name="department_id" :required="true">
                @foreach ($department as $item)
                    <x-select-option :value="$item->id" :title="$item->name" :option="$admin->department_id" />
                @endforeach
            </x-select>
        </div>
    </div>
</div>
