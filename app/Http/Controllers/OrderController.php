<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function showAllOrders() : object
    {
        return response()->json(Order::all());
    }

    public function showOneOrder(string $uuid) : object
    {
        return response()->json(Order::find($uuid));
    }

    public function create(Request $request) : object
    {
        $this->validate($request, [
            'manufacturer' => 'required',
            'model' => 'required',
            'total_price' => 'required'
        ]);

        $order = Order::create($request->all());

        return response()->json($order['uuid'], 201);
    }

    public function update(string $uuid, Request $request) : object
    {
        $order = Order::findOrFail($uuid);
        $order->update($request->all());

        return response()->json($order, 200);
    }

}
