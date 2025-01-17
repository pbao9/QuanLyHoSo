<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="#tabs-home" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                        role="tab">Hành chánh</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabs-nursing-work" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                        tabindex="-1">Công tác điều dưỡng</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="tabs-home" role="tabpanel">
                    @include('admin.evaluation.include.section-home')
                </div>
                <div class="tab-pane fade" id="tabs-nursing-work" role="tabpanel">
                  @include('admin.evaluation.include.section-nursing-work')
                </div>
            </div>
        </div>
    </div>
</div>
