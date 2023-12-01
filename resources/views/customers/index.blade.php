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
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div
                            class="card-header bg-primary  py-3 d-flex flex-row align-items-center justify-content-between">
                            <a href="{{ route('customers.create') }}" class="btn btn-secondary float-end">Add New customers</a>
                            <a href="{{ route('transactions.create') }}" class="btn btn-success float-end">Add Transaction</a>
                        </div>
                        @include('partials.errors')
                        <div class="card-body">
                            @if($customers->count() > 0)
                                <table class="table table-bordered table-sm">
                                    <thead>
                                    <tr>
                                        <th scope="col">Customer ID</th>
                                        <th scope="col">Customer Names</th>
{{--                                        <th scope="col">Customer Age</th>--}}
                                        <th scope="col">Date Of Birth</th>
                                        <th scope="col">Customer Gender</th>
                                        <th scope="col">Income (USD)</th>
                                        <th scope="col">Date Added</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>CS00{{$customer->id}}</td>
                                            <td>{{$customer->customer_name}}</td>
                                            <td>{{$customer->customer_dob}}</td>
                                            <td>{{$customer->customer_gender}}</td>
                                            <td>${{$customer->customer_income}}</td>
                                            <td>{{$customer->created_at}}</td>
                                            <td>
                                                <form action="{{route('customers.destroy', $customer->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs">
                                                       Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            @else
                                <h4 class="alert alert-danger">No Customers Added</h4>
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
