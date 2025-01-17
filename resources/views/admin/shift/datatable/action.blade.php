<x-button.modal-delete class="btn-icon" data-route="{{ route('admin.department.delete', $id) }}">
</x-button.modal-delete>
<x-link :href="route('admin.department.edit', $id)" class="btn-icon btn-vimeo btn">
    <i class="ti ti-edit"></i>
</x-link>
