<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // order
    const ORDER_STATUS = [
        'pending' => 'Chờ xác nhận',
        'confirmed' => 'Đã xác nhận',
        'preparing' => 'Đang chuẩn bị hàng',
        'shipping' => 'Đang giao',
        'delivered' => ' Đã giao',
        'cancel' => 'Hủy'
    ];
    const STATUS_PENDING = 'pending';

    // payment
    const PAYMENT_STATUS = [
        'paid' => 'Đã thanh toán',
        'unpaid' => 'Chưa thanh toán'
    ];
    const UNPAID = 'unpaid';

    protected $fillable = [
        'user_id',
        'user_email',
        'user_name',
        'user_address',
        'user_phone',
        'receiver_email',
        'receiver_name',
        'receiver_address',
        'receiver_phone',
        'order_status',
        'payment_status',
        'total_price',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
