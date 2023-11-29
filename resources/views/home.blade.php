@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <div class="container">
                    <div class="container">
                        <h1>Report Generation System</h1>
                        <p>Generate Reports for Customers and Private Banking Actions</p>

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

                        <div id="customerReport" style="display: none;">
                          <h2>Customer Report</h2>
                          <div id="customerReportContent"></div>
                        </div>

                        <div id="bankingActionReport" style="display: none;">
                          <h2>Private Banking Action Report</h2>
                          <div id="bankingActionReportContent"></div>
                        </div>
                      </div>

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

                        <h1>Customer Segmentation</h1>
                        <p>Automated Customer Segmentation in Private Banking</p>

                        <div id="sampleData">
                          <h2>Customer Data</h2>

                          <code>
                            CustomerID, Age, Income<br>
                            1, 35, 50000<br>
                            2, 45, 80000<br>
                            3, 30, 60000<br>
                            4, 55, 100000<br>
                            5, 25, 40000<br>
                            6, 40, 90000<br>
                            7, 50, 120000<br>
                          </code>
                        </div>

                        <button type="button" class="btn btn-primary" onclick="segmentCustomers()">Segment Customers</button>

                        <div id="segmentationResults" style="display: none;">
                          <h2>Segmentation Results</h2>
                          <div id="segmentationTable"></div>
                        </div>
                      </div>

                      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                      <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@3.10.0/dist/tf.min.js"></script>
                      <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/kmeans@3.0.2/dist/kmeans.min.js"></script>
                      <script>
                        function segmentCustomers() {
                          const customerData = `CustomerID, Age, Income
                                                1, 35, 50000
                                                2, 45, 80000
                                                3, 30, 60000
                                                4, 55, 100000
                                                5, 25, 40000
                                                6, 40, 90000
                                                7, 50, 120000`;

                          // Perform data preprocessing and feature extraction

                          // Apply machine learning algorithm (e.g., K-means clustering) to segment customers
                          // Replace the following code with your actual machine learning algorithm implementation
                          const numClusters = 3;
                          const kmeans = new KMeans();
                          const segmentation = kmeans.cluster(customerData, numClusters);

                          // Display segmentation results
                          const segmentationTable = document.getElementById('segmentationTable');
                          segmentationTable.innerHTML = '';

                          for (let i = 0; i < numClusters; i++) {
                            const cluster = segmentation.clusters[i];
                            const customersInCluster = cluster.points.length;

                            const clusterRow = document.createElement('div');
                            clusterRow.classList.add('row');

                            const clusterIdCol = document.createElement('div');
                            clusterIdCol.classList.add('col');
                            clusterIdCol.textContent = `Cluster ${i + 1}`;

                            const customersCol = document.createElement('div');
                            customersCol.classList.add('col');
                            customersCol.textContent = `Customers: ${customersInCluster}`;

                            clusterRow.appendChild(clusterIdCol);
                            clusterRow.appendChild(customersCol);

                            segmentationTable.appendChild(clusterRow);
                          }

                          document.getElementById('segmentationResults').style.display = 'block';
                        }
                      </script>






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
