<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customer)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer)
    {
        $vehicles = Vehicle::all(); // Ambil semua kendaraan
        return view('orders.create', compact('customer', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {
        //validate input
        $request->validate([
            'vehicle_id' => 'required'
        ]);

        // Retrieve the selected vehicle
        $selectedVehicle = Vehicle::findOrFail($request->input('vehicle_id'));

        // Calculate total_biaya based on the price of the selected vehicle
        $totalBiaya = $selectedVehicle->harga;

        // Create a new Order instance with the request data
        $order = new Order([
            'total_biaya' => $totalBiaya,
            'vehicle_id' => $selectedVehicle->id,
        ]);
        
        // Save the order to the customer's orders relationship
        $customer->orders()->save($order);

        //redirect user and send friendly message
        return redirect()->route('customers.show', $customer)->with('success', 'Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, $orderId)
    {
        $order = $customer->orders->firstWhere('id', $orderId);

        return view('orders.show', compact('customer', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer, $orderId)
    {
        $order = $customer->orders->firstWhere('id', $orderId);
        $vehicles = Vehicle::all(); // Retrieve all vehicles (adjust this query based on your needs)

        return view('orders.edit', compact('customer', 'order', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer, Order $order)
    {
        // Validate the request data
        $request->validate([
            'vehicle_id' => 'required'
        ]);

        // Retrieve the selected vehicle
        $selectedVehicle = Vehicle::findOrFail($request->input('vehicle_id'));

        // Calculate total_biaya based on the price of the selected vehicle
        $totalBiaya = $selectedVehicle->harga;

        // Update the existing order with the new data
        $order->update([
            'total_biaya' => $totalBiaya,
            'vehicle_id' => $selectedVehicle->id,
        ]);

        // Redirect the user and send a success message
        return redirect()->route('customers.show', $customer)->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, Order $order)
    {
        // Menghapus order
        $order->delete();

        // Redirect ke tampilan customer
        return redirect()->route('customers.show', $customer)->with('success', 'Order deleted successfully');
    }
}
