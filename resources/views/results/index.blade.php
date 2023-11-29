@extends('layouts.header')
@include('layouts.sidebar')

@section('content')
    <!-- Sidebar chat end-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <!-- Main content starts -->
        <div class="container-fluid bg-white">
            <div class="row">
                <div class="main-header">
                    <h4>Customer Data Analysis</h4>
                </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row">
                <h1>Customer Data Analysis</h1>

                <div id="sampleData">
                    <button type="button" class="btn btn-primary" onclick="toggleAnalysis()">Analyze Data</button>

                    <code>
                        <table class="table table-bordered table-sm text-danger">
                            <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Age</th>
                                <th>Income</th>
                                <th>InvestmentAmount</th>
                            </tr>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <th> {{$customer->id}}</th>
                                    <th> {{$customer->customer_age}}</th>
                                    <th>${{$customer->customer_income}}</th>
                                    <th>
{{--                                        <div id="analysis" style="display: none;">--}}
                                        <div >
                                            @if ($customer->customer_income > 150000)
                                                <p class="text-success">Segment 1: High-income, High-investment customers</p>
                                            @elseif ($customer->customer_income < 50000)
                                                <p class="text-warning">Segment 2: Mid-income, Mid-investment customers</p>
                                            @elseif ($customer->customer_income > 50000)
                                                <p class="text-danger">Segment 3: Low-income, Low-investment customers</p>
                                            @else
                                                <p>None</p>
                                            @endif
                                        </div>
                                    </th>
                                </tr>
                            @endforeach

                            </tbody>
                            </thead>
                        </table>

                    </code>
                </div>

            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@3.10.0/dist/tf.min.js"></script>
            <script>
                function toggleAnalysis() {
                    var analysisDiv = document.getElementById("analysis");
                    if (analysisDiv.style.display === "none") {
                        analysisDiv.style.display = "block";
                    } else {
                        analysisDiv.style.display = "none";
                    }
                }
            </script>
            </div>


            <!-- 2-1 block end -->
        </div>
        <!-- Main content ends -->

    </div>
@endsection
