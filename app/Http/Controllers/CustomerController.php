<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->get();
        return view('customers.index')->with('customers', $customers);
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
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'customer_dob' => 'required|date',
            'customer_gender' => 'required',
            'customer_income' => 'required|numeric',
            'segment_type' => 'required',
        ]);

        $customerDateOfBirth = Carbon::parse($request->input('customer_dob'));
        $customerAge = $customerDateOfBirth->diffInYears(Carbon::now());

        if ($customerAge < 18) {
            $validator->errors()->add('customer_dob', 'The customer must be at least 18 years old.');
        }

        $customers = Customer::create([
            'customer_name' => $request->input('customer_name'),
            'customer_age' => $customerAge,
            'customer_dob' => $customerDateOfBirth,
            'customer_gender' =>  $request->input('customer_gender'),
            'customer_income' =>  $request->input('customer_income'),
            'segment_type' =>  $request->input('segment_type'),
        ]);

        session()->flash('success', 'Customer Successfully Added.');
        return redirect(route('customers.index'));
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
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->back()->with('success', 'Customer Deleted Successfully');
    }
}
