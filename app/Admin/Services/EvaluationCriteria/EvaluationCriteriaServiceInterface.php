<?php

namespace App\Admin\Services\EvaluationCriteria;

use Illuminate\Http\Request;

interface EvaluationCriteriaServiceInterface
{
    public function store(Request $request);
    public function update(Request $request);
    public function delete($id);
}
