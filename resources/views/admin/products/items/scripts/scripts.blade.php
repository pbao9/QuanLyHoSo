<script>
				document.addEventListener('DOMContentLoaded', function() {
								const form = document.querySelector('form'); // Chọn biểu mẫu của bạn

								form.addEventListener('submit', function(event) {
												const price = parseFloat(document.querySelector('#price-hidden').value);
												const promotionPrice = parseFloat(document.querySelector('#promotion_price-hidden').value);
												if (promotionPrice >= price) {
																event.preventDefault();
																Swal.fire({
																				icon: 'error',
																				title: 'Lỗi!',
																				text: 'Giá khuyến mãi phải nhỏ hơn giá bán thường.',
																				confirmButtonText: 'OK'
																});
												}
								});
				});
</script>
