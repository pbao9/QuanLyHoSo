<div class="card mb-3">
    <div class="row card-body">
        <div class="card-title">
            <span>{{ __('Thời gian hiện tại: ') }}</span>
            {{ now()->format('d/m/Y H:m') }}
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i> {{ __('Người giám sát') }} <span
                        class="text-danger">*</span></label>
                <x-input name="evaluation[supervisor]" :value="old('evaluation[supervisor]') ?? ($evaluation->supervisor ?? null)" :placeholder="__('Tiêu đề')" />
            </div>
        </div>
        <!-- title -->
        <div class="col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Tổng số điều dưỡng của khoa') }} <span class="text-danger">*</span></label>
                <x-input name="evaluation[total_nurses]" :value="old('evaluation[total_nurses]') ?? ($evaluation->total_nurses ?? null)" :placeholder="__('Tiêu đề')" />
            </div>
        </div>
    </div>
</div>



<!-- Khoa hồi sức -->
<div class="card mb-3" id="khoa-hoi-suc" style="display: none;">
    <div class="card-header bg-primary text-white">
        <div class="card-title">

            <h2 class="text-center text-uppercase mb-0">{{ __('Thông tin Khoa Hồi Sức') }} </h2>
        </div>
    </div>
    <div class="row card-body">

        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Số NB Nhập khoa') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[patients_admitted]" :value="old('evaluation[patients_admitted]') ?? ($evaluation->patients_admitted ?? null)" :placeholder="__('Số người bệnh nhập khoa')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Số NB chuyển khoa/xuất viện') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[patients_transferred_discharged]" :value="old('evaluation[patients_transferred_discharged]') ??
                    ($evaluation->patients_transferred_discharged ?? null)" :placeholder="__('Số người bệnh chuyển khoa/xuất viện')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Số NB nặng xin về') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[critical_patients_home]" :value="old('evaluation[critical_patients_home]') ?? ($evaluation->critical_patients_home ?? null)" :placeholder="__('Số NB nặng xin về')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Số NB tử vong') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[patient_deaths]" :value="old('evaluation[patient_deaths]') ?? ($evaluation->patient_deaths ?? null)" :placeholder="__('Số NB tử vong')" />
            </div>
        </div>
    </div>
</div>
<!-- Khoa cấp cứu -->
<div class="card mb-3" id="khoa-cap-cuu" style="display: none;">
    <div class="card-header bg-primary text-white">
        <div class="card-title">
            <h2 class="text-center text-uppercase mb-0">{{ __('Thông tin Khoa Cấp cứu') }} </h2>
        </div>
    </div>
    <div class="row card-body">
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Số NB phân loại triage I') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[triage_I_patients]" :value="old('evaluation[triage_I_patients]') ?? ($evaluation->triage_I_patients ?? null)" :placeholder="__('Số NB phân loại triage I')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Số NB phân loại triage II') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[triage_II_patients]" :value="old('evaluation[triage_II_patients]') ?? ($evaluation->triage_II_patients ?? null)" :placeholder="__('Số NB phân loại triage II')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Số NB nhập viện') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[admitted_patients]" :value="old('evaluation[admitted_patients]') ?? ($evaluation->admitted_patients ?? null)" :placeholder="__('Số NB nhập viện')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Số NB chuyển khoa HSTC-CĐ/PTGMHS/DSA') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[critical_transfers]" :value="old('evaluation[critical_transfers]') ?? ($evaluation->critical_transfers ?? null)" :placeholder="__('Số NB chuyển khoa HSTC-CĐ/PTGMHS/DSA')" />
            </div>
        </div>
    </div>
</div>
<!-- Khoa khối nội & khối ngoại -->
<div class="card mb-3" id="khoa-khoi-noi-khoi-ngoai" style="display: none;">
    <div class="card-header bg-primary text-white">
        <div class="card-title">
            <h2 class="text-center text-uppercase mb-0">{{ __('Thông tin Khoa khối nội & khối ngoại') }} </h2>
        </div>
    </div>
    <div class="row card-body">
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('NB chăm sóc cấp I') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[level_1_patients]" :value="old('evaluation[level_1_patients]') ?? ($evaluation->level_1_patients ?? null)" :placeholder="__('NB chăm sóc cấp I')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('NB chăm sóc cấp II') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[level_2_patients]" :value="old('evaluation[level_2_patients]') ?? ($evaluation->level_2_patients ?? null)" :placeholder="__('NB chăm sóc cấp II')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('NB chăm sóc cấp III') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[level_3_patients]" :value="old('evaluation[level_3_patients]') ?? ($evaluation->level_3_patients ?? null)" :placeholder="__('NB chăm sóc cấp III')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('NB phẫu thuật chương trình') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[scheduled_surgeries]" :value="old('evaluation[scheduled_surgeries]') ?? ($evaluation->scheduled_surgeries ?? null)" :placeholder="__('NB phẫu thuật chương trình')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('NB mổ cấp cứu') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[emergency_surgeries]" :value="old('evaluation[emergency_surgeries]') ?? ($evaluation->emergency_surgeries ?? null)" :placeholder="__('NB mổ cấp cứu')" />
            </div>
        </div>
    </div>
</div>

<!-- Mặc định -->
<div class="card mb-3">
    <div class="card-header bg-primary text-white">
        <div class="card-title">
            <!-- Chỉ số điều dưỡng -->
            <h2 class="text-center text-uppercase  mb-0">{{ __('Chỉ số điều dưỡng') }} </h2>
        </div>
    </div>
    <div class="row card-body">

        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Điều dưỡng trực tiếp chăm sóc NB') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[direct_care_nurses]" :value="old('evaluation[direct_care_nurses]') ?? ($evaluation->direct_care_nurses ?? null)" :placeholder="__('Điều dưỡng trực tiếp chăm sóc NB')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Điều dưỡng hành chính (thuốc/thực chi/vòng ngoài)') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[administrative_nurses]" :value="old('evaluation[administrative_nurses]') ?? ($evaluation->administrative_nurses ?? null)" :placeholder="__('Điều dưỡng hành chính (thuốc/thực chi/vòng ngoài)')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Điều dưỡng hành chính (thuốc/thực chi/vòng ngoài)') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[procedure_room_nurses]" :value="old('evaluation[procedure_room_nurses]') ?? ($evaluation->procedure_room_nurses ?? null)" :placeholder="__('Điều dưỡng hành chính (thuốc/thực chi/vòng ngoài)')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __(' Điều dưỡng ở phòng khám (chỉ cho khối nội và ngoại)') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[clinic_nurses]" :value="old('evaluation[clinic_nurses]') ?? ($evaluation->clinic_nurses ?? null)" :placeholder="__('Điều dưỡng ở phòng khám (chỉ cho khối nội và ngoại)')" />
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Điều dưỡng trực') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[shift_nurses]" :value="old('evaluation[shift_nurses]') ?? ($evaluation->shift_nurses ?? null)" :placeholder="__('Điều dưỡng trực')" />
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Điều dưỡng ra trực/nghỉ phép/ nghỉ bù/ thai sản/ ốm/ học') }}
                    <span class="text-danger">*</span></label>
                <x-input name="evaluation[leave_nurses]" :value="old('evaluation[leave_nurses]') ?? ($evaluation->leave_nurses ?? null)" :placeholder="__('Điều dưỡng ra trực/nghỉ phép/ nghỉ bù/ thai sản/ ốm/ học')" />
            </div>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header bg-primary text-white">
        <div class="card-title">
            <!-- Thông tin giường bệnh và bệnh nhân -->
            <h2 class="text-center text-uppercase  mb-0">{{ __('Thông tin giường bệnh và bệnh nhân') }} </h2>
        </div>
    </div>
    <div class="row card-body">

        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Tổng số giường thực kê') }} <br>
                    {{ __('(chỉ cho khoa hồi sức và khối nội và ngoại)') }}
                    <span class="text-danger">*</span></label>
                <x-input type="number" name="evaluation[total_beds]" :value="old('evaluation[total_beds]') ?? ($evaluation->total_beds ?? null)" :placeholder="__('Tổng số giường thực kê (chỉ cho khoa hồi sức và khối nội và ngoại)')" />
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-3">
                <label for="" class="mb-2"><i class="ti ti-pencil"></i>
                    {{ __('Tổng số người bệnh') }}
                    <span class="text-danger">*</span></label>
                <x-input type="number" name="evaluation[total_patients]" :value="old('evaluation[total_patients]') ?? ($evaluation->total_patients ?? null)" :placeholder="__('Tổng số người bệnh')" />
            </div>
        </div>
    </div>
</div>
