<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            <span><i class="ti ti-playstation-circle me-2"></i>{{ __('Đăng') }}</span>
        </div>
        <div class="card-body d-flex gap-2 p-2">
            <x-button.submit :title="__('Lưu')" name="submitter" value="save" class="w-50" />
            <x-button.modal-delete
                data-route="{{ route('admin.evaluation.category.criteria.delete', ['category_id' => $criteria->category_id, 'id' => $criteria->id]) }}"
                :title="__('Xóa')" class="w-50" />
        </div>
    </div>

</div>
