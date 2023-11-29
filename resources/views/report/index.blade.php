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
                    <h4>Report Generation System</h4>
                </div>
            </div>


              <div class="card">
                  <div class="card-body">
                      <div id="reportOptions">
                          <h2>Report Options</h2>
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="customerReportCheckbox">
                              <label class="form-check-label" for="customerReportCheckbox">
                                  Customer Report
                              </label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="bankingActionReportCheckbox">
                              <label class="form-check-label" for="bankingActionReportCheckbox">
                                  Private Banking Action Report
                              </label>
                          </div>
                          <button type="button" class="btn btn-primary" onclick="generateReports()">Generate Reports</button>
                      </div>
                  </div>
              </div>

            <ul class="list-group">
                <div class="list-group-item">
                    <div id="customerReport" style="display: none;">
                        <h2>Customer Report</h2>
                        <div id="customerReportContent">
                        </div>
                        @foreach($topCustomers as $topCustomer)
                            <p>Customer Name: {{ $topCustomer->customer_name }}</p>
                            <p>Account Balance: ${{ $topCustomer->customer_income }}</p>
                            <p>Investment Portfolio: Moderate Risk</p>
                            <hr>
                        @endforeach

                    </div>
                </li>
                <li class="list-group-item">
                    <div id="bankingActionReport" style="display: none;">
                        <h2>Private Banking Action Report</h2>
                        <div id="bankingActionReportContent"></div>
                    </div>
                </li>

            </ul>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script>
                function generateReports() {
                    const customerReportCheckbox = document.getElementById('customerReportCheckbox');
                    const bankingActionReportCheckbox = document.getElementById('bankingActionReportCheckbox');

                    if (customerReportCheckbox.checked) {
                        // Generate customer report
                        const customerReportContent = document.getElementById('customerReportContent');
                        customerReportContent.innerHTML = '';

                        // Replace the following code with the logic to generate the customer report
                        const customerReportData = `
                              <h3>Customer Report</h3>
                              <p>Customer Name: John Doe</p>
                              <p>Account Balance: $100,000</p>
                              <p>Investment Portfolio: Moderate Risk</p>
                            `;
                        customerReportContent.innerHTML = customerReportData;

                        document.getElementById('customerReport').style.display = 'block';
                    } else {
                        document.getElementById('customerReport').style.display = 'none';
                    }

                    if (bankingActionReportCheckbox.checked) {
                        // Generate banking action report
                        const bankingActionReportContent = document.getElementById('bankingActionReportContent');
                        bankingActionReportContent.innerHTML = '';

                        // Replace the following code with the logic to generate the private banking action report
                        const bankingActionReportData = `
                              <h3>Private Banking Action Report</h3>
                              <p>Action Type: Investment Advice</p>
                              <p>Date: October 15, 2023</p>
                              <p>Advisor: Jane Smith</p>
                            `;
                        bankingActionReportContent.innerHTML = bankingActionReportData;

                        document.getElementById('bankingActionReport').style.display = 'block';
                    } else {
                        document.getElementById('bankingActionReport').style.display = 'none';
                    }
                }
            </script>

            </div>


            <!-- 2-1 block end -->
        </div>
        <!-- Main content ends -->

    </div>
@endsection
