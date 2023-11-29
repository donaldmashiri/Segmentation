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
                            <a href="{{ route('customers.index') }}" class="btn btn-secondary justify-content-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{route('customers.store')}}" method="POST">
                                @csrf
                                <div class="row mb-3 font-weight-bolder">
                                    <div class="col-sm-12">
                                        <label for="inputText" class=" col-form-label">Customer Name</label>
                                        <input type="text" name="customer_name" min="4" class="form-control" placeholder="Enter Customer Name:" required>
                                    </div>
                                </div>
                                <div class="row mb-3 font-weight-bolder">
                                    <div class="col-sm-12">
                                        <label for="inputText" class=" col-form-label">Customer Age</label>
                                        <input type="number" name="customer_age" min="18" max="65" class="form-control" placeholder="Enter Customer Age:" required>
                                    </div>
                                </div>
                                <div class="row mb-3 font-weight-bolder">
                                    <div class="col-sm-12">
                                        <label for="inputText" class=" col-form-label">Customer Gender</label>
                                        <select name="customer_gender"  class="form-control"  id="customer_gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 font-weight-bolder">
                                    <div class="col-sm-12">
                                        <label for="inputText" class=" col-form-label">Customer Income</label>
                                        <input type="number" name="customer_income" min="100" max="100000" class="form-control" placeholder="Enter Customer Income:" required>
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
