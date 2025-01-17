<?php

namespace App\Enums\Product;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class ProductVariationAction extends Enum implements LocalizedEnum
{
    const AddSimple = 1;
    const AddFromAllVariations = 2;
}
