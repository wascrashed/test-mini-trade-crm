<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Modules\Order\Model\Order;
use App\Modules\Order\Services\OrderService;
use App\Modules\OrderItem\Model\OrderItem;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private  $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * Получить все заказы с возможностью фильтрации и пагинации.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
         $filters = [
            'status' => $request->input('status'),
            'customer' => $request->input('customer'),
        ];
        $perPage = $request->input('per_page', 10);
        $orders = $this->orderService->getAllOrders($filters, $perPage);

        return response()->json($orders);
    }

    /**
     * Создать новый заказ.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = [
            'customer' => $request->input('customer'),
            'items' => $request->input('items'),
        ];
        $order = $this->orderService->createOrder($data);

        return response()->json($order, 201);
    }

    /**
     * Обновить заказ.
     *
     * @param Request $request
     * @param int $id Идентификатор заказа
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data = [
            'customer' => $request->input('customer'),
            'items' => $request->input('items'),
        ];
        $order = $this->orderService->updateOrder($id, $data);

        return response()->json($order);
    }

    /**
     * Пометить заказ как выполненный.
     *
     * @param int $id Идентификатор заказа
     * @return \Illuminate\Http\JsonResponse
     */
    public function complete($id)
    {
        $order = $this->orderService->completeOrder($id);

        return response()->json($order);
    }

    /**
     * Пометить заказ как отмененный.
     *
     * @param int $id Идентификатор заказа
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancel($id)
    {
        $order = $this->orderService->cancelOrder($id);

        return response()->json($order);
    }

    /**
     * Возобновить заказ.
     *
     * @param int $id Идентификатор заказа
     * @return \Illuminate\Http\JsonResponse
     */
    public function resume($id)
    {
        $order = $this->orderService->resumeOrder($id);

        return response()->json($order);
    }
}
