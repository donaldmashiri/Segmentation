@extends('layouts.header')
@include('layouts.sidebar')

@section('content')
    <!-- Sidebar chat end-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <!-- Main content starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="main-header">
                    <h4>Customers</h4>
                </div>
            </div>
            <!-- 4-blocks row start -->

            <!-- 2-1 block start -->
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                        <div
                            class="card-header bg-primary  py-3 d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('transactions.index') }}" class="btn btn-secondary justify-content-end">Back</a>
                        </div>
                        @include('partials.errors')
                        <div class="card-body">
                            <form action="{{route('transactions.store')}}" method="POST">
                                @csrf
                                <div class="row mb-3 font-weight-bolder">
                                    <div class="col-sm-12">
                                        <label for="inputText" class=" col-form-label">Customer</label>
                                        <select name="customer_id"  class="form-control"  id="customer_id">
                                            <option value="">Select Customer</option>
                                            @foreach($customers as $customer)
                                                <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 font-weight-bolder">
                                    <div class="col-sm-12">
                                        <label for="inputText" class=" col-form-label">Transaction Amount</label>
                                        <input type="number" name="transaction_amount" min="100" max="100000" class="form-control" placeholder="Enter Transaction Amount:" required>
                                    </div>
                                </div>

                                <div class="row mb-3 font-weight-bolder">
                                    <div class="col-sm-12">
                                        <label for="inputText" class=" col-form-label">Transaction Type</label>
                                        <select name="transaction_type"  class="form-control"  id="transaction_type">
                                            <option value="">Select Type</option>
                                            <option value="Debit">Debit</option>
                                            <option value="Credit">Credit</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 font-weight-bolder">
                                    <div class="col-sm-12">
                                        <label for="inputText" class=" col-form-label">Teller Name</label>
                                        <input type="text" name="transaction_teller_name" min="100" max="100000" class="form-control" placeholder="Enter Teller Name:" required>
                                    </div>
                                </div>

                                <div class="m-1">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>

            </div>
            <!-- 2-1 block end -->
        </div>
        <!-- Main content ends -->

    </div>
@endsection
