<script>
				$(document).ready(function() {
								select2LoadData($('#user_id').data('url'), '#user_id');
								let userId;
								userId = $('#user_id').val();
								let urlOrder = "{{ route('admin.search.select.order') }}";
								select2LoadData(urlOrder + '?user_id=' + userId, '#order_id');
				});

				$(document).on('change', 'select[name="user_id"]', function(e) {
								$('#order_id').val(null).trigger('change');
								userId = $(this).val();
								let urlOrder = "{{ route('admin.search.select.order') }}";
								select2LoadData(urlOrder + '?user_id=' + userId, '#order_id');
				});
</script>
