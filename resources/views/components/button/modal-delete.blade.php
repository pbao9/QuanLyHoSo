<button type="button"
				{{ $attributes->class(['btn', 'btn-danger', 'open-modal-delete'])->merge([
				    'data-bs-toggle' => 'modal',
				    'data-bs-target' => '#modalDelete',
				]) }}>
				<span><i class="ti ti-trash-x"></i>{{ $title ?? '' }}</span>
				<span>{{ $slot }}</span>
</button>
