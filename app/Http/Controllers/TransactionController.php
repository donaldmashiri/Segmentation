<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->get();
        return view('transactions.index')->with('transactions', $transactions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::orderBy('id', 'desc')->get();
        return view('transactions.create')->with('customers', $customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|string|max:255',
            'transaction_type' => 'required',
            'transaction_amount' => 'required|numeric',
            'transaction_teller_name' => 'required',
        ]);

        $transaction_time = Carbon::now();


        $transactions = Transaction::create([
            'customer_id' => $validatedData['customer_id'],
            'transaction_amount' => $validatedData['transaction_amount'],
            'transaction_date' => now(),
            'transaction_time' =>$transaction_time,
            'transaction_type' => $validatedData['transaction_type'],
            'transaction_teller_name' => $validatedData['transaction_teller_name'],
        ]);

        session()->flash('success', 'Transaction Successfully Added.');
        return redirect(route('transactions.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
