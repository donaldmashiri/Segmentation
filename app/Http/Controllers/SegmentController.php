<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SegmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Transaction::query();

        if ($request->has('segmentation_type')) {
            $segmentationType = $request->input('segmentation_type');

            if ($segmentationType === 'age') {
                if ($request->has('age')) {
                    $ageRange = $request->input('age');
                    $customerIds = Customer::whereBetween('customer_age', explode('-', $ageRange))->pluck('id');
                    $query->whereIn('customer_id', $customerIds);
                }
            } elseif ($segmentationType === 'income') {
                if ($request->has('income')) {
                    $income = $request->input('income');
                    $customerIds = Customer::where('customer_income', $income)->pluck('id');
                    $query->whereIn('customer_id', $customerIds);
                }
            }
        }

        if ($request->has('transaction_type')) {
            $query->where('transaction_type', $request->input('transaction_type'));
        }

        $transactions = $query->orderBy('id', 'desc')->paginate(10);

        $resultsRecords = $query->orderBy('id', 'desc')->count();
        $totalRecords = Transaction::count();

        return view('segment.index', [
            'transactions' => $transactions,
            'request' => $request,
            'totalRecords' => $totalRecords,
            'resultsRecords' => $resultsRecords,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
