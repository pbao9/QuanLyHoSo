<x-link :href="route('admin.evaluation.category.criteria.edit', ['category_id' => $category_id, 'id' => $id])" class="btn btn-icon btn-cyan">
    <i class="ti ti-edit"></i>
</x-link>


<x-button.modal-delete class="btn-icon"
    data-route="{{ route('admin.evaluation.category.criteria.delete', ['category_id' => $category_id, 'id' => $id]) }}">
</x-button.modal-delete>
