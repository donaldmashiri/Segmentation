@extends('layouts.header')
@include('layouts.sidebar')

@section('content')
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <!-- Main content starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="main-header">
                    <h4>Bank Profile</h4>
                </div>
            </div>
            <!-- 4-blocks row start -->


            <!-- 1-3-block row start -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">Profile</div>
                        <div class="card-body">
                            <div class="user-block-2">
                                <img class="img-fluid" src="assets/images/admin.jpg" width="170" height="150" alt="user-header">
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">B#</th>
                                    <td> 00{{ Auth::user()->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Bank Name</th>
                                    <td> {{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Bank Email</th>
                                    <td> {{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Role</th>
                                    <td class="text-danger font-weight-bold"> bank </td>
                                </tr>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- 1-3-block row end -->

        </div>
        <!-- Main content ends -->

    </div>


@endsection
