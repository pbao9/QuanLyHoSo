<?php

namespace App\Admin\Services\ShoppingCart;

use App\Admin\Repositories\Order\OrderDetailRepositoryInterface;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Admin\Services\ShoppingCart\ShoppingCartServiceInterface;
use App\Admin\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;
use App\Admin\Repositories\Product\{ProductRepositoryInterface, ProductVariationRepositoryInterface};
use App\Admin\Repositories\Transaction\TransactionRepositoryInterface;
use App\Admin\Traits\AuthService;
use App\Admin\Traits\Setup;
use App\Enums\Order\OrderStatus;
use App\Enums\Order\OrderReview;
use App\Enums\Order\PaymentStatus;
use App\Enums\Product\ProductType;
use App\Enums\Transaction\TransactionStatus;
use App\Traits\UseLog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingCartService implements ShoppingCartServiceInterface
{
    use UseLog, Setup, AuthService;

    protected $data;
    protected $orderDetails;

    protected $repository;
    protected $orderRepository;
    protected $productRepository;
    protected $productRepositoryVariation;
    protected $repositoryOrderDetail;
    protected $transactionRepository;

    public function __construct(
        ShoppingCartRepositoryInterface $repository,
        ProductRepositoryInterface $productRepository,
        OrderRepositoryInterface $orderRepository,
        ProductVariationRepositoryInterface $productRepositoryVariation,
        OrderDetailRepositoryInterface $repositoryOrderDetail,
        TransactionRepositoryInterface $transactionRepository,
    ) {
        $this->repository = $repository;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->productRepositoryVariation = $productRepositoryVariation;
        $this->repositoryOrderDetail = $repositoryOrderDetail;
        $this->transactionRepository = $transactionRepository;
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();
        DB::beginTransaction();
        try {
            $shoppingCart = $this->repository->getBy([
                'user_id' => $this->getCurrentUserId(),
                'product_id' => $this->data['product_id'],
                'product_variation_id' => $this->data['product_variation_id'] ?? null,
            ])->first();
            $product = $this->productRepository->find($this->data['product_id']);
            if (!$shoppingCart) {
                if ($product->isSimple()) {
                    if ($product->qty < $this->data['qty']) {
                        DB::rollBack();
                        return 1;
                    }
                } else {
                    $productVariation = $product->productVariations()->where('id', $this->data['product_variation_id'])->first();
                    if ($productVariation->qty < $this->data['qty']) {
                        DB::rollBack();
                        return 1;
                    }
                }
                $shoppingCart = $this->repository->create([
                    'user_id' => $this->getCurrentUserId(),
                    'product_id' => $this->data['product_id'],
                    'product_variation_id' => $this->data['product_variation_id'] ?? null,
                    'qty' => $this->data['qty'],
                ]);
            } else {
                if ($product->isSimple()) {
                    if ($product->qty < ($shoppingCart->qty + $this->data['qty'])) {
                        DB::rollBack();
                        return 1;
                    }
                } else {
                    $productVariation = $product->productVariations()->where('id', $this->data['product_variation_id'])->first();
                    if ($productVariation->qty < ($shoppingCart->qty + $this->data['qty'])) {
                        DB::rollBack();
                        return 1;
                    }
                }
                $shoppingCart->update(['qty' => $shoppingCart->qty + $this->data['qty']]);
            }
            DB::commit();
            return $shoppingCart;
        } catch (Exception $e) {
            $this->logError('Failed to process shopping cart: ', $e);
            DB::rollBack();
            return false;
        }
    }

    public function storeNotLogin(Request $request)
    {
        $this->data = $request->validated();
        $cart = session()->get('cart', []);
        $currentCartItem = null;
        $product = $this->productRepository->find($this->data['product_id']);
        foreach ($cart as $item) {
            if ($item['product_id'] == $this->data['product_id']) {
                if ($product->isSimple()) {
                    if ($product->qty < intval($this->data['qty']) + $item['qty']) {
                        return 1;
                    }
                } else {
                    $productVariation = $product->productVariations()->where('id', $this->data['product_variation_id'])->first();
                    if ($productVariation->qty < intval($this->data['qty']) + $item['qty']) {
                        return 1;
                    }
                }
            }
        }
        $productExists = false;
        foreach ($cart as &$item) {
            if (
                $item['product_id'] == $this->data['product_id'] &&
                $item['product_variation_id'] == ($this->data['product_variation_id'] ?? null)
            ) {
                $currentCartItem = $item;
                $item['qty'] += $this->data['qty'];
                $productExists = true;
                break;
            }
        }
        if (!$productExists) {
            $cart[] = [
                'id' => $this->uniqidReal(),
                'product' => $product,
                'productVariation' => isset($this->data['product_variation_id']) ? $product->productVariations()->where('id', $this->data['product_variation_id'])->first() : null,
                'product_id' => $this->data['product_id'],
                'product_variation_id' => $this->data['product_variation_id'] ?? null,
                'qty' => $this->data['qty'],
            ];
        }
        foreach ($cart as &$item) {
            if (
                $item['product_id'] == $this->data['product_id'] &&
                $item['product_variation_id'] == ($this->data['product_variation_id'] ?? null)
            ) {
                $currentCartItem = $item;
                break;
            }
        }
        session()->put('cart', $cart);
        session()->save();
        return (object) $currentCartItem;
    }

    public function update(Request $request)
    {
        $this->data = $request->validated();
        if ($this->getCurrentUser()) {
            DB::beginTransaction();
            try {
                $shoppingCart = $this->repository->findOrFail($this->data['id']);
                $shoppingCart->update(['qty' => $this->data['qty']]);
                DB::commit();
                return $shoppingCart;
            } catch (Exception $e) {
                $this->logError('Failed to update shopping cart: ', $e);
                DB::rollBack();
                return false;
            }
        } else {
            $cart = session()->get('cart', []);
            foreach ($cart as &$item) {
                if ($item['id'] == $this->data['id']) {
                    if (isset($item['productVariation'])) {
                        if ($item['productVariation']->qty < $this->data['qty']) {
                            return 1;
                        }
                    } else {
                        if ($item['product']->qty < $this->data['qty']) {
                            return 1;
                        }
                    }
                    $item['qty'] = $this->data['qty'];
                }
            }
            session()->put('cart', $cart);
            session()->save();
            return true;
        }
    }

    public function increament(Request $request)
    {
        $this->data = $request->validated();
        if ($this->getCurrentUser()) {
            DB::beginTransaction();
            try {
                $shoppingCart = $this->repository->findOrFail($this->data['id']);
                $shoppingCart->update(['qty' => $shoppingCart->qty + 1]);
                DB::commit();
                return $shoppingCart;
            } catch (Exception $e) {
                $this->logError('Failed to increament quantity shopping cart: ', $e);
                DB::rollBack();
                return false;
            }
        } else {
            $cart = session()->get('cart', []);
            foreach ($cart as &$item) {
                if ($item['id'] == $this->data['id']) {
                    $item['qty'] += 1;
                }
            }
            session()->put('cart', $cart);
            session()->save();
            return true;
        }
    }

    public function decreament(Request $request)
    {
        $this->data = $request->validated();
        if ($this->getCurrentUser()) {
            DB::beginTransaction();
            try {
                $shoppingCart = $this->repository->findOrFail($this->data['id']);
                if ($shoppingCart->qty > 1) {
                    $shoppingCart->update(['qty' => $shoppingCart->qty - 1]);
                } else {
                    $this->delete($shoppingCart->id);
                }
                DB::commit();
                return $shoppingCart;
            } catch (Exception $e) {
                $this->logError('Failed to decreament quantity shopping cart: ', $e);
                DB::rollBack();
                return false;
            }
        } else {
            $cart = session()->get('cart', []);
            foreach ($cart as $key => &$item) {
                if ($item['id'] == $this->data['id']) {
                    if ($item['qty'] > 1) {
                        $item['qty'] -= 1;
                    } else {
                        unset($cart[$key]);
                    }
                }
            }
            session()->put('cart', array_values($cart));
            session()->save();
            return true;
        }
    }

    public function delete($id)
    {
        if ($this->getCurrentUser()) {
            return $this->repository->delete($id);
        } else {
            $cart = session()->get('cart', []);
            foreach ($cart as $key => $item) {
                if ($item['id'] == $id) {
                    unset($cart[$key]);
                    break;
                }
            }
            session()->put('cart', array_values($cart));
            session()->save();
            return true;
        }
    }

    public function checkout(Request $request)
    {
        $this->data = $request->validated();
        $user = $this->getCurrentUser();
        $this->data['order']['status'] = OrderStatus::Pending->value;
        $this->data['order']['code'] = $this->createCodeOrder();
        DB::beginTransaction();
        try {
            if ($user) {
                $this->data['order']['user_id'] = $user->id;
                $shopping_cart = $this->repository->findManyById($this->data['shopping_cart_id']);
                foreach ($shopping_cart as $item) {
                    if ($item['qty'] >= $this->data['qty'][$item->id]) {
                        $item['qty'] = $this->data['qty'][$item->id];
                    }
                }
                $this->data['order']['total'] = $this->calculateTotal($shopping_cart);
                $this->prepareData($shopping_cart);
                $order = $this->orderRepository->create($this->data['order']);
                $this->storeOrderDetail($order->id, $this->orderDetails);
                $shopping_cart->each(function ($item) {
                    $instance = $this->repository->find($item->id);
                    $instance->update(['qty' => $instance->qty - $item->qty]);
                });
                DB::commit();
            }
            return $order;
        } catch (Exception $e) {
            $this->logError('Failed to process checkout: ', $e);
            DB::rollBack();
            return false;
        }
    }

    public function handleVnpay(Request $request)
    {
        DB::beginTransaction();
        try {
            $language = $request->get('language');
            $orderId = $request->get('order_id');
            $bankcode = $request->get('bankcode');

            $order = $this->orderRepository->find($orderId);
            $transactionData = [
                'vnp_Amount' => ($order->total) * 100,
                'vnp_BankCode' => $bankcode,
                'vnp_OrderInfo' => 'Thanh toan don hang #' . $order->code,
                'vnp_TmnCode' => env('VNP_TMNCODE'),
                'vnp_TxnRef' => $order->code,
                'expires_at' => now()->addMinutes(15),
            ];

            $this->transactionRepository->getBy(['vnp_TxnRef' => $transactionData['vnp_TxnRef']])->delete();

            $this->transactionRepository->create($transactionData);

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('user.cart.handleVnpayReturn');
            $vnp_HashSecret = env('VNP_HASHSECRET'); //Chuỗi bí mật
            $vnp_OrderType = 'billpayment';
            $vnp_Locale = $language;
            $vnp_BankCode = $bankcode;
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => env('VNP_TMNCODE'),
                "vnp_Amount" => $transactionData['vnp_Amount'],
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => request()->ip(),
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $transactionData['vnp_OrderInfo'],
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $transactionData['vnp_TxnRef']
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            DB::commit();
            header('Location: ' . $vnp_Url);
            die();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


    public function handleVnpayReturn(Request $request)
    {
        try {
            DB::beginTransaction();
            $inputData = $request->all();
            $transaction = $this->transactionRepository->findByField('vnp_TxnRef', $inputData['vnp_TxnRef']);
            $order = $this->orderRepository->findByField('code', $inputData['vnp_TxnRef']);
            if ($inputData['vnp_ResponseCode'] == '00' && $inputData['vnp_TransactionStatus'] == '00') {
                if ($transaction && $transaction->vnp_Amount == $inputData['vnp_Amount'] && $transaction->expires_at > now() && $transaction->status == TransactionStatus::Pending->value) {
                    $transaction->update([
                        'status' => TransactionStatus::Success
                    ]);
                    $order->update([
                        'payment_status' => PaymentStatus::Paid
                    ]);
                    DB::commit();
                    return redirect()->route('user.index')->with('success', __('Thanh toán thành công'));
                }
            }
            $transaction->update([
                'status' => TransactionStatus::Failed
            ]);
            DB::commit();

            return redirect()->route('user.index')->with('error', __('Thanh toán thất bại'));
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function calculateTotal($shoppingCart)
    {
        $total = 0;

        if (is_array($shoppingCart) || $shoppingCart instanceof \Traversable) {
            foreach ($shoppingCart as $item) {
                $total += $this->calculateItemTotal($item);
            }
        } else {
            $total += $this->calculateItemTotal($shoppingCart);
        }

        return $total;
    }

    private function calculateItemTotal($item)
    {
        return $item->product_variation_id
            ? ($item->productVariation->promotion_price * $item->qty)
            : ($item->product->promotion_price * $item->qty);
    }

    public function calculateTotalFromSession($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $product = $this->productRepository->find($item['product_id']);

            if ($item['product_variation_id']) {
                $productVariation = $product->productVariations()->where('id', $item['product_variation_id'])->first();
                $total += $productVariation->promotion_price * $item['qty'];
            } else {
                $total += $product->promotion_price * $item['qty'];
            }
        }

        return $total;
    }

    protected function storeOrderDetail($orderId, $data)
    {
        foreach ($data as $item) {
            $item['order_id'] = $orderId;
            $this->repositoryOrderDetail->create($item);
        }
    }

    private function prepareData($cartItems)
    {
        foreach ($cartItems as $item) {
            $product = $this->productRepository->find($item->product->id);
            if ($product->type == ProductType::Simple) {
                $unitPrice = $product->promotion_price;
            } else {
                $instance = $product->productVariation()->where('id', $item->product_variation_id)->first();
                $unitPrice = $instance->promotion_price;
            }
            $this->orderDetails[] = [
                'product_id' => $product->id,
                'unit_price' => $unitPrice,
                'product_variation_id' => $item->product_variation_id ?: null,
                'qty' => $item->qty,
            ];
        }
    }
}
