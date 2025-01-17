<div class="col-12 col-md-9">
    <div class="card mb-3">
        <div class="row card-body">
            <div class="card-title d-flex justify-content-between">
                <div class="">
                    <span>{{ __('Thời gian hiện tại: ') }}</span>
                    {{ now()->format('d/m/Y H:m') }}
                </div>
                <x-link :href="route('admin.evaluation.category.criteria.index', $evaluationCategory->id)" class="nav-link fs-4 text-primary">
                    <i class="ti ti-list me-2"></i>
                    {{ __('Danh sách tiêu chí') }}
                </x-link>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="mb-2"><i class="ti ti-pencil"></i> {{ __('Tiêu đề') }} <span
                            class="text-danger">*</span></label>
                    <x-input name="name" :value="$evaluationCategory->name" :placeholder="__('Tiêu đề')" />
                </div>
            </div>
            <!-- title -->
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                        {{ __('Mô tả') }} <span class="text-danger">*</span></label>
                    <textarea name="description" placeholder="Mô tả chuyên mục đánh giá: Chuyên mục đánh giá nhầm mục đích gì. Ra sao..."
                        rows="10" class="form-control">{{ $evaluationCategory->description }}</textarea>
                </div>
            </div>
        </div>
    </div>

</div>
