<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Получить все заказы с возможностью фильтрации и пагинации.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $filters = [
            'status' => $request->input('status'),
            'customer' => $request->input('customer'),
        ];
        $perPage = $request->input('per_page', 10);
        $orders = $this->orderService->getAllOrders($filters, $perPage);

        return response()->json(OrderResource::collection($orders));
    }

    /**
     * Создать новый заказ.
     *
     * @param OrderCreateRequest $request
     * @return JsonResponse
     */
    public function store(OrderCreateRequest $request): JsonResponse
    {
      $data =
      $data = [
          'customer' => $request->input('customer'),
          'items' => $request->input('items'),
      ];
        $order = $this->orderService->createOrder($data);

        return response()->json(new OrderResource($order), 201);
    }
    /**
     * Обновить заказ.
     *
     * @param OrderUpdateRequest $request
     * @param int $id Идентификатор заказа
     * @return JsonResponse
     */
    public function update(OrderUpdateRequest $request, $id): JsonResponse
    {
        $data = $request->validated();
        $order = $this->orderService->updateOrder($id, $data);

        return response()->json(new OrderResource($order));
    }

    /**
     * Пометить заказ как выполненный.
     *
     * @param int $id Идентификатор заказа
     * @return JsonResponse
     */
    public function complete($id): JsonResponse
    {
        $order = $this->orderService->completeOrder($id);

        return response()->json(new OrderResource($order));
    }

    /**
     * Пометить заказ как отмененный.
     *
     * @param int $id Идентификатор заказа
     * @return JsonResponse
     */
    public function cancel($id): JsonResponse
    {
        $order = $this->orderService->cancelOrder($id);

        return response()->json(new OrderResource($order));
    }

    /**
     * Возобновить заказ.
     *
     * @param int $id Идентификатор заказа
     * @return JsonResponse
     */
    public function resume($id): JsonResponse
    {
        $order = $this->orderService->resumeOrder($id);

        return response()->json(new OrderResource($order));
    }
}
