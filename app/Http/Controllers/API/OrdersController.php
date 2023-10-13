<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Modules\Order\Model\Order;
use App\Modules\OrderItem\Model\OrderItem;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();

        // Фильтры
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        if ($request->has('customer')) {
            $query->where('customer', 'like', '%' . $request->customer . '%');
        }

        // Пагинация
        $perPage = $request->has('per_page') ? $request->per_page : 10;
        $orders = $query->paginate($perPage);

        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->customer = $request->customer;
        $order->status = 'new';
        $order->save();

        foreach ($request->items as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->count = $item['count'];
            $orderItem->save();
        }

        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->customer = $request->customer;
        $order->save();

        // Удаляем старые позиции и создаем новые
        OrderItem::where('order_id', $id)->delete();
        foreach ($request->items as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->count = $item['count'];
            $orderItem->save();
        }

        return response()->json($order);
    }
    public function complete($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'completed';
        $order->save();

        return response()->json($order);
    }
    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'canceled';
        $order->save();

        return response()->json($order);
    }
    public function resume($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'new';
        $order->save();

        return response()->json($order);
    }
}
