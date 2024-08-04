<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function add(Request $request) {
//        dd($request->all());
        try {
            // check thành công
            // lưu thông tin vào bảng order
            $order = Order::query()->create([
                'user_id' => $request->userId,
                'user_email'  => $request->user_email,
                'user_name' => $request->user_name,
                'user_address' => $request->user_address,
                'user_phone' => $request->user_phone,
                'receiver_email' => $request->receiver_email,
                'receiver_name' => $request->receiver_name,
                'receiver_address' => $request->receiver_address,
                'receiver_phone' => $request->receiver_phone,
                'total_price' => $request->totalAmount,
            ]);

            // tạo order item
            foreach (json_decode($request->productVariants) as $item) {
                $item->order_id = $order->id;
//                dd((array) $item);
                OrderItem::query()->create((array) $item);

                // Xóa sản phẩm trong giỏ
                CartItem::query()->join('carts', 'cart_items.cart_id', '=', 'carts.id')
                    ->where(['carts.user_id' => $request->userId,
                            'cart_items.product_variant_id' => $item->product_variant_id])
                    ->delete();
            }

            return redirect()->route('welcome')->with('success', 'Đặt hàng thành công');
        } catch (\Exception $exception) {
          //  dd($exception->getMessage());
        }
    }
}
