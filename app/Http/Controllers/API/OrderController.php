<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Events\OrderCreated;
use App\Exports\OrderCSVExport;
use App\Exports\OrderExcelExport;
use App\Jobs\SendOrderCancellationEmail;
use App\Models\Order;
use Illuminate\Http\Request;
use Excel;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $order = auth()->user()->orders()->create([
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
            'status' => 'pending',
        ]);

        // Dispatch the OrderCreated event
        event(new OrderCreated($order));

        // Return a response or redirect as per your requirements
        return response()->json([
            'message' => 'Order placed successfully',
            'data' => $order
        ]);
    }

    public function cancel(Order $order)
    {
        $order->update([
            'cancelled_at' => now(),
            'status' => 'cancel'
        ]);

        dispatch(new SendOrderCancellationEmail($order));

        return response()->json([
            'message' => 'Order cancelled successfully',
            'data' => $order
        ]);
    }

    public function exportToExcel()
    {
        $orders = Order::all();

        $filename = 'orders.xlsx';

        return Excel::download(new OrderExcelExport($orders), $filename);
    }

    public function exportToCSV()
    {
        $orders = Order::all();

        $filename = 'orders.csv';

        return Excel::download(new OrderCSVExport($orders), $filename);
    }
}
