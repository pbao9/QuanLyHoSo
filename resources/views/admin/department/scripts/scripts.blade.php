<script>
    $(document).ready(function() {
        let cardCount = 0;

        function checkEmptyShifts() {
            if ($('#shift-container .card:visible').length === 0) {
                if ($('#empty-shift-message').length === 0) {
                    $('#shift-container').append('<div id="empty-shift-message" class="text-center text-muted py-3">Chưa có ca làm việc</div>');
                }
            } else {
                $('#empty-shift-message').remove();
            }
        }

        checkEmptyShifts();

        $('#add-shift-btn').click(function() {
            cardCount++;
            const newCard = `
               <div class="card mb-3 d-none">
                <div class="card-title">
                    <div class="card-header">
                        <span>Thời gian làm việc</span>
                        <x-link class="btn btn-danger btn-icon remove-shift-btn ms-auto">
                            <i class="ti ti-file-x"></i>
                        </x-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row row-cols-2">
                        <div class="col">
                            <label for="" class="mb-1">
                                <i class="ti ti-clock"></i> Ca làm việc
                            </label>
                            <input type="text" name="shift[new_title][]" class="form-control" placeholder="Ca làm việc">
                        </div>
                        <div class="col">
                            <label for="" class="mb-1">
                                <i class="ti ti-pencil"></i> {{ __('Ghi chú') }}
                            </label>
                            <input type="text" name="shift[new_description][]" class="form-control" placeholder="Ghi chú">
                        </div>
                    </div>
                </div>
            </div>
            `;
            const $newCard = $(newCard);
            $('#shift-container').append($newCard); 
            $newCard.fadeIn(400).removeClass('d-none');
            checkEmptyShifts();
        });

        $(document).on('click', '.remove-shift-btn', function() {
        const card = $(this).closest('.card');
        if (card.find('input[name="shift[new_title][]"]').length) {
            card.fadeOut(400, function() {
                $(this).remove();
                checkEmptyShifts();
            });
        } else {
            card.find('.shift-status').val(1);
            card.fadeOut(400, function() {
                $(this).hide();
                checkEmptyShifts();
            });
                }
            });
        });
</script>
