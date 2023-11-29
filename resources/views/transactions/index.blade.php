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
                    <h4>Transactions</h4>
                </div>
            </div>
            <!-- 4-blocks row start -->

            <!-- 2-1 block start -->
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <div class="card">
                        @include('partials.errors')
                        <div class="card-body">
                            @if($transactions->count() > 0)
                                <table class="table table-bordered table-sm">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer Names</th>
                                        <th scope="col">Customer Income</th>
                                        <th scope="col">Transaction Amount</th>
                                        <th scope="col">Transaction Date</th>
                                        <th scope="col">Transaction Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>REF00{{$transaction->id}}</td>
                                            <td>{{$transaction->customer->customer_name}}</td>
                                            <td class="font-weight-bold">${{$transaction->customer->customer_income}}</td>
                                            <td>${{$transaction->transaction_amount}}</td>
                                            <td>{{$transaction->transaction_date}}</td>
                                            <td><p class="font-weight-bold text-uppercase {{ $transaction->transaction_type === 'Debit' ? 'text-primary' : 'text-danger' }}">
                                                    {{ $transaction->transaction_type }}
                                                </p></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            @else
                                <h4 class="alert alert-danger">No transactions Added</h4>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
            <!-- 2-1 block end -->
        </div>
        <!-- Main content ends -->

    </div>
@endsection
