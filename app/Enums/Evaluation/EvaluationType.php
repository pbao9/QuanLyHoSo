<?php

namespace App\Enums\Evaluation;

use App\Supports\Enum;

enum EvaluationType: int
{
    use Enum;

    case generalDepartment = 0; // Khoa khối nội và khối ngoại
    case intensiveCareDepartment = 1; // Khoa hồi sức
    case emergencyDepartment = 2; // Khoa cấp cứu
    public function badge()
    {
        return match ($this) {
            EvaluationType::generalDepartment => '',
            EvaluationType::intensiveCareDepartment => 'bg-green',
            EvaluationType::emergencyDepartment => 'bg-warning',
        };
    }
}
