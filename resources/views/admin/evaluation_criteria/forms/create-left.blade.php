<div class="col-12 col-md-9">
    <div class="card mb-3">
        <div class="row card-body">
            <div class="card-title">
                <span>{{ __('Thời gian hiện tại: ') }}</span>
                {{ now()->format('d/m/Y H:m') }}
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="mb-2"><i class="ti ti-pencil"></i> {{ __('Tiêu đề') }} <span
                            class="text-danger">*</span></label>
                    <x-input name="name" :value="old('title')" :placeholder="__('Tiêu đề')" />
                </div>
            </div>
            <!-- title -->
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                        {{ __('Mô tả') }} <span class="text-danger">*</span></label>
                    <textarea name="description" placeholder="Mô tả tiêu chí chuyên mục: Tiêu chí chuyên mục nhầm mục đích gì. Ra sao..."
                        rows="10" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>

</div>
