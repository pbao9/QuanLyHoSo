<script>
				$(document).ready(function() {
								select2LoadData($('#admin_id').data('url'), '#admin_id');
								let selectedValue = null;
								$('.notification-type').change(function() {
												selectedValue = $(this).val();
												$('#notification-customer-select').hide();
												if (selectedValue == {{ \App\Enums\Notification\NotificationType::Customer }}) {
																$('#notification-customer-select').show();
												}
								});
				});
</script>
