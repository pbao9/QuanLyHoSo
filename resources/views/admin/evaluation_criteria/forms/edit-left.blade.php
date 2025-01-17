<div class="col-12 col-md-9">
    <div class="card mb-3">
        <div class="row card-body">
            <div class="card-title d-flex justify-content-between">
                <div class="">
                    <span>{{ __('Thời gian hiện tại: ') }}</span>
                    {{ now()->format('d/m/Y H:m') }}
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="mb-2"><i class="ti ti-pencil"></i> {{ __('Tiêu đề') }} <span
                            class="text-danger">*</span></label>
                    <x-input name="name" :value="$criteria->name" :placeholder="__('Tiêu đề')" />
                </div>
            </div>
            <!-- title -->
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                        {{ __('Mô tả') }} <span class="text-danger">*</span></label>
                    <textarea name="description" placeholder="Mô tả chuyên mục đánh giá: Chuyên mục đánh giá nhầm mục đích gì. Ra sao..."
                        rows="10" class="form-control">{{ $criteria->description }}</textarea>
                </div>
            </div>
        </div>
    </div>

</div>
