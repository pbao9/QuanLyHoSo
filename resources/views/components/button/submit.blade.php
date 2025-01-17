<button type="submit" {{ $attributes->merge(['class' => 'btn btn-primary']) }}>
				<span><i class="ti ti-device-floppy me-2"></i>{{ $title }}</span>
				<span>{{ $slot }}</span>
</button>
