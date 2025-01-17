<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            <span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
        </div>
        <div class="card-body d-flex justify-content-between p-2 gap-2">
            <x-button.submit :title="__('Lưu')" name="submitter" value="save" class="flex-grow-1" />

            <x-button.modal-delete data-route="{{ route('admin.evaluation.category.delete', $evaluationCategory->id) }}"
                :title="__('Xóa')" class="flex-grow-1" />
        </div>
    </div>
</div>
