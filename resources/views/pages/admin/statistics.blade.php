@extends('layouts.adminLayout')

@section('content')

   <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                </i>
                            </div>
                            <div>
                               <h3>Website statistics</h3> 
                            </div>
                        </div>   
                    </div>
                </div>            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body"><h5 class="card-title">User actions</h5>
                                <table class="mb-0 table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>IP Address</th>
                                        <th>Date & Time</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($actions as $action)
                                            <tr>
                                                <td>{{$action->user_id}}</td>
                                                <td>{{$action->firstName}}</td>
                                                <td>{{$action->lastName}}</td>
                                                <td>{{$action->email}}</td>
                                                <td>{{$action->ip}}</td>
                                                <td>{{$action->dateTime}}</td>
                                                <td>{{$action->action}}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body"><h5 class="card-title">Website errors</h5>
                                <table class="mb-0 table table-hover">
                                    <thead>
                                    <tr>
                                        <th>IP Address</th>
                                        <th>Date & Time</th>
                                        <th>Message</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($errors as $error)
                                            <tr>
                                                <td>{{$error->ip}}</td>
                                                <td>{{$error->dateTime}}</td>
                                                <td>{{$error->message}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
