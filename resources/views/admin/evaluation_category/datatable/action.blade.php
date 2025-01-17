<x-link :href="route('admin.evaluation.category.edit', $id)" class="btn btn-icon btn-cyan">
    <i class="ti ti-edit"></i>
</x-link>

<x-button.modal-delete class="btn-icon" data-route="{{ route('admin.evaluation.category.delete', $id) }}">
</x-button.modal-delete>
