<?php

namespace App\Http\Controllers;

use App\Order;
use App\Status;
use App\Book;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index(int $userId) {
//        load all orders and relations with eager loading
        $orders = Order::where('user_id', $userId)->with(['user', 'books', 'statuses'])->get();
        return $orders;
    }

    public function orderById(string $id)
    {
        $order = Order::where('id', $id)->with(['user', 'books.orders', 'books.images', 'books.authors', 'statuses'])->first();
        return $order;
    }

    public function getAllOrders()
    {
        $allOrders = Order::with(['user', 'books', 'statuses'])->orderBy('user_id', 'asc')->latest()->get();
        return $allOrders;
    }

    public function addStatus(Request $request): JsonResponse{
        $request = $this->parseRequest($request);

        DB::beginTransaction();
        try {
            $status = Status::create($request->all());
            DB::commit();
            return response()->json($status, 201);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json("insert status failed: " . $e->getMessage(), 420);
        }
    }

    public function addOrder(Request $request) : JsonResponse  {
        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try {
            $order = Order::create($request->all());
            /*if (isset($request['items']) && is_array($request['items'])) {
                foreach ($request['items'] as $item) {
                    $amount = $item['amount'];
                    $book = Book::firstOrNew(['isbn'=>['book'][1]]);
                    $order->books()->attach([$book['id'] => ['amount' => $amount]]);
                }
            }*/
            if (isset($request['items']) && is_array($request['items'])) {
                foreach ($request['items'] as $item) {
                    $amount = $item['amount'];
                    $order->books()->attach([$item['book'][1] => ['amount' => $amount]]);
                }
            }

            DB::commit();
            return response()->json($order, 201);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json("order failed: " . $e->getMessage(), 420);
        }
    }

    private function parseRequest(Request $request) : Request {
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $date = new \DateTime($request->changeDate);
        $request['changeDate'] = $date;
        $orderDate = new \DateTime($request->orderDate);
        $request['orderDate'] = $orderDate;
        return $request;
    }
}
