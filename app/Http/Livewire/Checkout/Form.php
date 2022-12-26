<?php

namespace App\Http\Livewire\Checkout;

use App\Models\Order;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Form extends Component
{
    public $fillable = [];

    public $shipRate;

    public $setClicked = false;

    public $taxRate = 0;

    public $paymentMethod;

    public function render(Cart $cart)
    {
        return view('livewire.checkout.form', ['data' => $cart->content(), 'subtotal' => $cart->subtotalFloat()]);
    }

    public function autoRefill()
    {
        if ($this->checkAuthenticated()) {
            $this->modelDataAuth();
        } else {
            return redirect('/login');
        }
    }

    public function checkAuthenticated(): bool
    {
        return Auth::check() == true ? true : false;
    }

    public function modelDataAuth()
    {
        $user = Auth::user();
        $partner = $user->partner;
        $partner_id = null;
        if ($partner) {
            $partner_id = $partner->id;
        }

        return [
            $this->fillable['name'] = Auth::user()->name,
            $this->fillable['email'] = Auth::user()->email,
            $this->fillable['phone'] = Auth::user()->phone_number,
            $this->fillable['partner_id'] = $partner_id,
            $this->fillable['address'] = Auth::user()->address,
        ];
    }

    public function chooseShipRate(Cart $cart)
    {
        $this->shipRate = 25000;
        $this->setClicked = true;
        $this->taxRate = ($cart->subtotalFloat() + $this->shipRate) * 0.1;
    }

    public function sendOrder(Cart $cart)
    {
        $this->validate();
        $totalOrder = $this->shipRate + $cart->taxFloat() + $cart->subtotalFloat();

        $result = [...$this->fillable, 'state' => 'Chờ xác nhận', 'type_id' => 2, 'amount' => $totalOrder, 'ship_rate' => $this->shipRate, 'tax_float' => $cart->taxFloat(), 'subtotal_float' => $cart->subtotalFloat()];

        $order = Order::create($result);
        $order_id = Order::find($order['id']);

        foreach ($cart->content() as $item) {
            $order_id->add_line($item->id, $item->qty);
        }
        $cart->destroy();

        if ($this->paymentMethod == 'online') {
            return $order->checkout();
        }

        return redirect('/setting/order/'.$order['id']);
    }

    protected $rules = [
        'fillable.name' => 'required',
        'fillable.email' => 'required | email',
        'fillable.phone' => 'required | digits:10 | numeric',
        'fillable.address' => 'required',
        'shipRate' => 'required',
    ];

    protected $messages = [
        'fillable.name.required' => ':attribute không được để trống',
        'fillable.email.required' => ':attribute không được để trống',
        'fillable.email.email' => ':attribute chưa đúng định dạng',
        'fillable.phone.required' => ':attribute không được để trống',
        'fillable.phone.digits' => ':attribute phải 10 số',
        'fillable.phone.numeric' => ':attribute phải là số ký tự',
        'fillable.address.required' => ':attribute không được để trống',
        'shipRate.required' => 'Vui lòng chọn :attribute',
    ];

    protected $validationAttributes = [
        'fillable.email' => 'Địa chỉ email',
        'fillable.name' => 'Tên',
        'fillable.phone' => 'Số điện thoại',
        'fillable.address' => 'Địa chỉ',
        'shipRate' => 'phương thức vận chuyển',
    ];
}
