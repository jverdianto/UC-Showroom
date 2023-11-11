<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(5);

        return view('customers.index', compact('customers'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate input
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'id_card' => 'required'
        ]);

        //create a new Customer in database
        Customer::create($request->all());

        //redirect user and send friendly message
        return redirect()->route('customers.index')->with('success','Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        // return Customer::find($customer->id)->orders;

        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //validate input
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'id_card' => 'required'
        ]);

        //create a new Customer in database
        $customer->update($request->all());

        //redirect user and send friendly message
        return redirect()->route('customers.index')->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //delete the Customer
        $customer->delete();

        //redirect user and display success message
        return redirect()->route('customers.index')->with('success','Customer deleted successfully');
    }
}
