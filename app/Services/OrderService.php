<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;

class OrderService
{
    /**
     * Получить все заказы с возможностью фильтрации и пагинации.
     *
     * @param array $filters Массив фильтров
     * @param int $perPage Количество элементов на странице пагинации
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllOrders(array $filters = [], int $perPage = 10)
    {
        $query = Order::query();

        // Фильтры
        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        if (isset($filters['customer'])) {
            $query->where('customer', 'like', '%' . $filters['customer'] . '%');
        }

        // Пагинация
        return $query->paginate($perPage);
    }

    /**
     * Создать новый заказ.
     *
     * @param array $data Массив данных для создания заказа
     * @return Order
     */
    public function createOrder(array $data)
    {
        $order = new Order();
        $order->customer = $data['customer'];
        $order->status = 'active';
        $order->save();

        $itemsData = [];
        foreach ($data['items'] as $item) {
            $itemsData[] = [
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'count' => $item['count'],
            ];
        }
        OrderItem::insert($itemsData);

        return $order;
    }


    /**
     * Обновить заказ.
     *
     * @param int $id Идентификатор заказа
     * @param array $data Массив данных для обновления заказа
     * @return Order
     */
    public function updateOrder(int $id, array $data)
    {
        $order = Order::findOrFail($id);
        $order->customer = $data['customer'];
        $order->save();

        // Удаляем старые позиции и создаем новые
        OrderItem::where('order_id', $id)->delete();
        foreach ($data['items'] as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->count = $item['count'];
            $orderItem->save();
        }

        return $order;
    }

    /**
     * Пометить заказ как выполненный.
     *
     * @param int $id Идентификатор заказа
     * @return Order
     */
    public function completeOrder(int $id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'completed';
        $order->completed_at= now();
        $order->save();

        return $order;
    }

    /**
     * Пометить заказ как отмененный.
     *
     * @param int $id Идентификатор заказа
     * @return Order
     */
    public function cancelOrder(int $id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'canceled';
        $order->save();

        return $order;
    }

    /**
     * Возобновить заказ.
     *
     * @param int $id Идентификатор заказа
     * @return Order
     */
    public function resumeOrder(int $id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'active';
        $order->save();

        return $order;
    }
}
