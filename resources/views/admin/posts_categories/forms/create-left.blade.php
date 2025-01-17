<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin chuyên mục') }}</h2>
        </div>
        <div class="row card-body">
            <!-- name -->
            <div class="col-md-12 col-sm-12">
                <div class="mb-3">
                    <label class="control-label"><i class="ti ti-article"></i> {{ __('Tên chuyên mục') }}:</label>
                    <x-input name="name" :value="old('name')" :required="true"
                        placeholder="{{ __('Tên chuyên mục') }}" />
                </div>
            </div>
            <!-- desc -->
            <div class="col-md-12 col-sm-12">
                <div class="mb-3">
                    <label class="control-label"><i class="ti ti-file-description"></i> {{ __('description') }}:</label>
                    <x-input name="desc" :value="old('desc')" :required="true" placeholder="{{ __('description') }}" />
                </div>
            </div>
        </div>
    </div>
</div>
