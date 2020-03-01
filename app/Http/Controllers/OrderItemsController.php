<?php

namespace App\Http\Controllers;

use App\OrderItems;
use App\OrderItemsStatus;
use App\OrderItemsType;
use App\Http\Requests\CreateOrderItems;
use App\Http\Requests\UpdateOrderItems;
use Illuminate\Http\Request;

class OrderItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderItems = OrderItems::all();
        return view('orderItems.index', compact(['orderItems']));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $OrderItems = new OrderItems;
        $Orders = Orders::pluck('desc', 'id');
        
        return view('orderItems.create', compact(['OrderItems', 'Orders']));
    }

    /**
     *
     * @param CreateOrderItems $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderItems $request)
    {
        OrderItems::create($request->all());
        return redirect('orderItems')->with('alert', 'OrderItem created!');
    }

    /**
     *
     * @param OrderItems $OrderItems
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderItems $OrderItems)
    {
        $Orders = Orders::pluck('desc', 'id');
        return view('orderItems.edit', compact(['OrderItems', 'Orders']));
    }

    /**
     *
     * @param UpdateOrderItems $request
     * @param OrderItems $OrderItems
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderItems $request, OrderItems $OrderItems)
    {
        $OrderItems->update($request->all());
        return redirect('orderItems')->with('alert', 'OrderItems updated!');
    }

}
