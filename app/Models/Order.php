<?php

namespace App\Models;

use App\Traits\Tracking;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use Tracking;
    use BroadcastsEvents;

    protected $fillable = [
        'state', 'type_id', 'partner_id', 'address', 'email', 'name', 'phone', 'amount', 'ship_rate', 'tax_float', 'subtotal_float',
    ];

    public function tracking(): array
    {
        return [
            'state', 'type_id', 'partner_id', 'address', 'email', 'name', 'phone', 'amount', 'ship_rate', 'tax_float', 'subtotal_float',
        ];
    }

    public function broadcastOn($event)
    {
        return match ($event) {
            'created' => ['App.Models.Order'],
            default => [$this],
        };
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function lines()
    {
        return $this->hasMany(OrderLine::class, 'order_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Method
    |--------------------------------------------------------------------------
    */

    public function add_line(int $food, int $quantity)
    {
        $this->lines()->create([
            'food_id' => $food,
            'quantity' => $quantity,
        ]);
    }

    /*
     *  Print order include lines
     *
     */
    public function print_order()
    {
    }

    public function checkout()
    {
        $vnp_Url = env('VNP_URL');
        $vnp_Returnurl = env('VNP_RETURN_URL');
        $vnp_TmnCode = env('VNP_TMN_CODE'); //Mã website tại VNPAY
        $vnp_HashSecret = env('VNP_HASH_SECRET'); //Chuỗi bí mật
        $vnp_TxnRef = $this->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toan hoa don '.$this->id;
        $vnp_OrderType = 'other';
        $vnp_Amount = $this->amount * 100;
        $vnp_Locale = 'vn';
        /* $vnp_BankCode = 'NCB'; */
        $vnp_IpAddr = request()->ip();
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = now()->addMinutes(10)->format('YmdHis');
        //Billing
        $inputData = [
            'vnp_Version' => '2.1.0',
            'vnp_TmnCode' => $vnp_TmnCode,
            'vnp_Amount' => $vnp_Amount,
            'vnp_Command' => 'pay',
            'vnp_CreateDate' => date('YmdHis'),
            'vnp_CurrCode' => 'VND',
            'vnp_IpAddr' => $vnp_IpAddr,
            'vnp_Locale' => $vnp_Locale,
            'vnp_OrderInfo' => $vnp_OrderInfo,
            'vnp_OrderType' => $vnp_OrderType,
            'vnp_ReturnUrl' => $vnp_Returnurl,
            'vnp_TxnRef' => $vnp_TxnRef,
            'vnp_ExpireDate' => $vnp_ExpireDate,
        ];

        //var_dump($inputData);
        ksort($inputData);
        $query = '';
        $i = 0;
        $hashdata = '';
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&'.urlencode($key).'='.urlencode($value);
            } else {
                $hashdata .= urlencode($key).'='.urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key).'='.urlencode($value).'&';
        }

        $vnp_Url = $vnp_Url.'?'.$query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash='.$vnpSecureHash;
        }

        return redirect($vnp_Url);
    }
}
