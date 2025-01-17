<div class="col-12 col-md-9">
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <div class="card-title">
                {{ __('Phòng Khoa') }}
            </div>
        </div>
        <div class="row card-body">
            <!-- title -->
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="" class="mb-2"><i class="ti ti-pencil"></i> {{ __('Tên khoa') }} <span
                                class="text-danger">*</span></label>
                        <x-input :value="$department->name" name="department[name]" :required="true" :placeholder="__('Tiêu đề')" />
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="" class="mb-2"><i class="ti ti-key"></i> {{ __('Key') }} <span
                                class="text-danger">*</span></label>
                        <x-input :value="$department->key" name="department[key]" :required="true" :placeholder="__('Key hiển thị')" disabled />
                    </div>
                </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-cyan-lt">
            <div class="card-title d-flex justify-content-between w-100 align-items-center">
                <span>
                    {{ __('Ca làm việc') }}
                </span>
                <a id="add-shift-btn" class="btn btn-primary">{{ __('Thêm ca làm việc') }}</a>
            </div>
        </div>
        @if ($shift)
            <div class="card-body" id="shift-container">
                @foreach ($shift as $item)
                    <input type="hidden" name="shift[id][]" value="{{ $item->id }}">
                    <div class="card mb-3">
                        <div class="card-title">
                            <div class="card-header">
                                <span>Thời gian làm việc</span>
                                <x-link class="btn btn-danger btn-icon remove-shift-btn ms-auto"
                                    data-id="{{ $item->id }}">
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
                                    <input type="text" name="shift[title][]" class="form-control"
                                        placeholder="Ca làm việc" value="{{ $item->title }}">
                                </div>
                                <div class="col">
                                    <label for="" class="mb-1">
                                        <i class="ti ti-pencil"></i> {{ __('Ghi chú') }}
                                    </label>
                                    <input type="text" name="shift[description][]" class="form-control"
                                        placeholder="Ghi chú" value="{{ $item->description }}">
                                </div>
                            </div>
                            <input type="hidden" name="shift[status][]" value="0" class="shift-status">
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            @include('admin.department.forms.shift')
        @endif
    </div>
</div>
