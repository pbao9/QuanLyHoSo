<?php

namespace App\Admin\Services\EvaluationCategory;

use Illuminate\Http\Request;

interface EvaluationCategoryServiceInterface
{
    public function store(Request $request);
    public function update(Request $request);
    public function delete($id);
}
