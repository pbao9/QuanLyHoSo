@foreach ($category as $item)
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <div class="card-title text-uppercase">
                {{ $loop->iteration }}. {{ $item->name }}
            </div>
        </div>
    </div>
    @if ($item->criteria->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu chí</th>
                    <th class="text-center">Đạt</th>
                    <th class="text-center">Không đạt</th>
                    <th class="text-center">Không kiểm</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item->criteria as $criteriaItem)
                    <input type="hidden" name="evaluation_criteria[{{ $criteriaItem->id }}][id]"
                        value="{{ $criteriaItem->id }}">
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $criteriaItem->name }}</td>
                        <td class="text-center">
                            <input type="radio" name="evaluation_criteria[{{ $criteriaItem->id }}][status]"
                                value="0" class="form-check-input"
                                {{ ($statusArray[$criteriaItem->id] ?? '') == 0 ? 'checked' : '' }}>
                        </td>
                        <td class="text-center">
                            <input type="radio" name="evaluation_criteria[{{ $criteriaItem->id }}][status]"
                                value="1" class="form-check-input"
                                {{ ($statusArray[$criteriaItem->id] ?? '') == 1 ? 'checked' : '' }}>
                        </td>
                        <td class="text-center">
                            <input type="radio" name="evaluation_criteria[{{ $criteriaItem->id }}][status]"
                                value="2" class="form-check-input"
                                {{ ($statusArray[$criteriaItem->id] ?? '') == 2 ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endforeach