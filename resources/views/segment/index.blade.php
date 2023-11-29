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
                    <h4>Segmentation Analysis</h4>
                </div>
            </div>
            <!-- 4-blocks row start -->
        <div class="row">
            <div class="filters-container">
                <form method="get" action="{{ route('segment.index') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="segmentation-type">Segmentation Type</label>
                            <select class="form-control" id="segmentation-type" name="segmentation_type">
                                <option value="">None</option>
                                <option value="age">Age</option>
                                <option value="income">Income</option>
                            </select>
                        </div>
                    </div>

                    <div id="age-segmentation" style="display: none;">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="age-filter">Age</label>
                                <select class="form-control" id="age-filter" name="age">
                                    <option value="18-25">18-24</option>
                                    <option value="25-34">25-34</option>
                                    <option value="35-44">35-44</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="income-segmentation" style="display: none;">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="income-filter">Income</label>
                                <input type="number" class="form-control" id="income-filter" name="income">
                            </div>
                        </div>
                    </div>

{{--                    <div class="form-row">--}}
{{--                        <div class="form-group col-md-4">--}}
{{--                            <label for="transaction-type-filter">Transaction Type</label>--}}
{{--                            <select class="form-control" id="transaction-type-filter" name="transaction_type">--}}
{{--                                <option value="">All</option>--}}
{{--                                <option value="Debit">Debit</option>--}}
{{--                                <option value="Credit">Credit</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-row mt-5">
                       <button type="submit" class="btn btn-primary mt-4">Apply Segmentation</button>
                   </div>
                </form>
            </div>

            <div class="row">
              <div class="container bg-primary p-3 mb-1 text-white">
                  @if ($request->has('segmentation_type'))
                      @php
                          $segmentationType = $request->input('segmentation_type');
                          $segmentationLabel = '';
                          $segmentationValue = '';
                          if ($segmentationType === 'age') {
                              $segmentationLabel = 'Age';
                              if ($request->has('age')) {
                                  $segmentationValue = $request->input('age');
                              }
                          } elseif ($segmentationType === 'income') {
                              $segmentationLabel = 'Income';
                              if ($request->has('income')) {
                                  $segmentationValue = $request->input('income');
                              }
                          }
                      @endphp
                     <div class="row">
                         <div class="col-md-12 text-center">
                             Segmentation of  {{ $segmentationLabel }}: {{ $segmentationValue }}
                         </div>
                         <div class="col-md-6">
                             <canvas id="pieChart"></canvas>
                         </div>
                         <div class="col-md-6">
                             <div class="card mt-5">
                                 <div class="card-body bg-light text-center">
                                     <h5 class="card-title text-dark">
                                         <i class="icon-anchor"></i> Total Records Count
                                     </h5>
                                     <h4 class="card-text text-dark">{{$totalRecords}}</h4>
                                 </div>

                                 <div class="card-body bg-light text-center">
                                     <h5 class="card-title text-dark">
                                         <i class="icon-action-undo"></i> Results Count
                                     </h5>
                                     <h4 class="card-text text-dark">{{$resultsRecords}}</h4>

{{--                                  {{    $totalRecords = $totalRecords }}--}}
{{--                                     {{ $greenPercentage = ($resultsRecords / $totalRecords) * 100  }}--}}
{{--                                     {{ $redPercentage = 100 - $greenPercentage  }}--}}
                                 </div>
                             </div>
                         </div>
                     </div>

                  @else
                      None
                  @endif
              </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @include('partials.errors')
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer Names</th>
                                    <th scope="col">Customer Age</th>
                                    <th scope="col">Customer Income</th>
                                    <th scope="col">Transaction Amount</th>
                                    <th scope="col">Transaction Date</th>
                                    <th scope="col">Transaction Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($transactions->isEmpty())
                                    <tr>
                                        <td colspan="7">No results found.</td>
                                    </tr>
                                @else
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>REF00{{$transaction->id}}</td>
                                            <td>{{$transaction->customer->customer_name}}</td>
                                            <td>{{$transaction->customer->customer_age}}</td>
                                            <td class="font-weight-bold">${{$transaction->customer->customer_income}}</td>
                                            <td>${{$transaction->transaction_amount}}</td>
                                            <td>{{$transaction->transaction_date}}</td>
                                            <td>
                                                <p class="font-weight-bold text-uppercase {{ $transaction->transaction_type === 'Debit' ? 'text-primary' : 'text-danger' }}">
                                                    {{ $transaction->transaction_type }}
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{ $transactions->render() }}
                        </div>

                    </div>
                </div>

            </div>

            <script>
                const pieChartCanvas = document.getElementById('pieChart');
                const ctx = pieChartCanvas.getContext('2d');

                var totalRecords = {{$totalRecords}};
                var green = ({{$resultsRecords}} / totalRecords) * 100;
                var red = 100 - green;


                const greenPercentage = green;
                const redPercentage = red;

                const pieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Green', 'Red'],
                        datasets: [{
                            data: [greenPercentage, redPercentage],
                            backgroundColor: ['#00ff00', '#ff0000']
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            </script>

            <script>
                // Get the segmentation type select element
                const segmentationTypeSelect = document.getElementById('segmentation-type');
                // Get the age segmentation div
                const ageSegmentationDiv = document.getElementById('age-segmentation');
                // Get the income segmentation div
                const incomeSegmentationDiv = document.getElementById('income-segmentation');

                // Add event listener for segmentation type change
                segmentationTypeSelect.addEventListener('change', function() {
                    const selectedSegmentationType = this.value;

                    // Hide all segmentation divs
                    ageSegmentationDiv.style.display = 'none';
                    incomeSegmentationDiv.style.display = 'none';

                    // Show the selected segmentation div based on the chosen type
                    if (selectedSegmentationType === 'age') {
                        ageSegmentationDiv.style.display = 'block';
                    } else if (selectedSegmentationType === 'income') {
                        incomeSegmentationDiv.style.display = 'block';
                    }
                });
            </script>
        </div>


            <!-- 2-1 block end -->
        </div>
        <!-- Main content ends -->

    </div>
@endsection
