<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customer.show', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'noHp' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $validatedData['id'] = uniqid();

        $customer = Customer::create($validatedData);

        return redirect()->route('customer.show', $customer->id)
            ->with('success', 'Customer created successfully.');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customer.index', compact('customer'));
    }

    public function edit($id)
{
    $customer = Customer::findOrFail($id);
    return view('customer.edit', compact('customer'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'noHp' => 'required',
        'email' => 'required|email',
        'alamat' => 'required',
    ]);

    // Update the customer data
    $customer = Customer::findOrFail($id);
    $customer->nama = $request->input('nama');
    $customer->noHp = $request->input('noHp');
    $customer->email = $request->input('email');
    $customer->alamat = $request->input('alamat');
    $customer->save();

    // Redirect to the customer detail page
    return redirect()->route('customer.show', $customer->id)
        ->with('success', 'Customer updated successfully.');
}

}
