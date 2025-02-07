<?php

namespace App\Admin\Services\Product;

use App\Admin\Services\Product\ProductServiceInterface;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Admin\Repositories\Product\{
    ProductRepositoryInterface,
    ProductAttributeRepositoryInterface,
    ProductVariationRepositoryInterface
};
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;
use Illuminate\Support\Facades\DB;
use App\Admin\Repositories\AttributeVariation\AttributeVariationRepositoryInterface;
use App\Enums\Product\ProductType;
use App\Enums\Product\ProductVariationAction;
use App\Traits\UseLog;
use Throwable;


class ProductService implements ProductServiceInterface
{
    use Setup, UseLog;

    /**
     * Current Object instance
     *
     * @var array
     */
    protected array $data;

    protected ProductRepositoryInterface $repository;
    protected AttributeVariationRepositoryInterface $repositoryAttributeVariation;
    protected ProductAttributeRepositoryInterface $repositoryProductAttribute;
    protected ProductVariationRepositoryInterface $repositoryProductVariation;

    public function __construct(
        ProductRepositoryInterface $repository,
        AttributeVariationRepositoryInterface $repositoryAttributeVariation,
        ProductAttributeRepositoryInterface $repositoryProductAttribute,
        ProductVariationRepositoryInterface $repositoryProductVariation,
    ) {
        $this->repository = $repository;
        $this->repositoryAttributeVariation = $repositoryAttributeVariation;
        $this->repositoryProductAttribute = $repositoryProductAttribute;
        $this->repositoryProductVariation = $repositoryProductVariation;
    }

    public function store(Request $request)
    {

        $this->data = $request->validated();
        DB::beginTransaction();
        try {
            $this->data['product']['gallery'] = $this->data['product']['gallery'] ? explode(",", $this->data['product']['gallery']) : null;
            $this->data['product']['sku'] = $this->createCodeSKU();
            $instance = $this->repository->create($this->data['product']);
            $this->repository->attachCategories($instance, $this->data['categories_id'] ?? []);
            if ($instance->type == ProductType::Variable && isset($this->data['product_attribute'])) {
                $this->repositoryProductAttribute->createOrUpdateWithVariation($instance->id, $this->data['product_attribute']);

                $this->storeOrUpdateProductVariations($instance->id);
            }
            DB::commit();
            return $instance;
        } catch (Exception $e) {
            $this->logError('Create Product Failed: ', $e);
            DB::rollBack();
            return false;
        }
    }

    public function update(Request $request): object|bool
    {

        $this->data = $request->validated();

        DB::beginTransaction();
        try {
            $this->data['product']['gallery'] = $this->data['product']['gallery'] ? explode(",", $this->data['product']['gallery']) : null;

            $instance = $this->repository->update($this->data['product']['id'], $this->data['product']);
            $this->repository->syncCategories($instance, $this->data['categories_id'] ?? []);

            if ($instance->type == ProductType::Variable && isset($this->data['product_attribute'])) {
                $this->repositoryProductAttribute->createOrUpdateWithVariation($instance->id, $this->data['product_attribute']);
                $this->storeOrUpdateProductVariations($instance->id);
            } else {
                $this->repository->deleteProductAttributes($instance);
                $this->repository->deleteProductVariations($instance);
            }
            DB::commit();
            return $instance;
        } catch (Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function updateApi(Request $request): object|bool
    {

        $this->data = $request->validated();

        DB::beginTransaction();
        try {
            $instance = $this->repository->update($this->data['product']['id'], $this->data['product']);
            $this->repository->syncCategories($instance, $this->data['categories_id'] ?? []);
            $this->repository->syncToppings($instance, $this->data['toppings_id'] ?? []);


            if ($instance->type == ProductType::Variable && isset($this->data['product_attribute'])) {
                $this->repositoryProductAttribute->createOrUpdateWithVariationApi($instance->id, $this->data['product_attribute']);
                $this->storeOrUpdateProductVariations($instance->id);
            } else {
                $this->repository->deleteProductAttributes($instance);
                $this->repository->deleteProductVariations($instance);
            }
            DB::commit();
            return $instance;
        } catch (Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * @throws Exception
     */
    public function delete($id): object|bool
    {
        return $this->repository->delete($id);
    }

    protected function storeOrUpdateProductVariations($product_id): void
    {
        if (isset($this->data['products_variations']['attribute_variation_id']) && $this->data['products_variations']['attribute_variation_id']) {
            $attribute_variation_id = collect($this->data['product_attribute']['attribute_variation_id'])->collapse()->flip();

            foreach ($this->data['products_variations']['attribute_variation_id'] as $key => $item) {
                if (!$attribute_variation_id->has($item)) {
                    unset($this->data['products_variations']['attribute_variation_id'][$key]);
                }
            }
            $this->repositoryProductVariation->createOrUpdateWithVariation($product_id, $this->data['products_variations']);
        }
    }

    public function createProductVariations(Request $request, array $view): View|Factory|string|Application
    {

        $data = $request->validated();

        $attributeVariations = $this->repositoryAttributeVariation->getOrderByFollow($data['product_attribute']['attribute_variation_id']);
        if ($data['variation_action'] == ProductVariationAction::AddSimple) {
            $response = view($view['product_variation'], [
                'attributeVariations' => $attributeVariations,
                'identity' => $this->uniqidReal(5)
            ]);
        } elseif ($data['variation_action'] == ProductVariationAction::AddFromAllVariations) {
            $collect = collect($attributeVariations[0]->keys()->all());
            $arr = [];

            foreach ($attributeVariations as $key => $attributeVariation) {
                if ($key != 0) {
                    $arr[] = $attributeVariation->keys()->all();
                }
            }
            $collect = $collect->crossJoin(...$arr);
            $response = '';
            foreach ($collect as $item) {
                $response .= view($view['product_variation'], [
                    'attributeVariations' => $attributeVariations,
                    'identity' => $this->uniqidReal(5),
                    'selected' => $item
                ])->render();
            }
            return $response;
        } else {
            $response = view($view['no_variation']);
        }
        return $response;
    }
}
