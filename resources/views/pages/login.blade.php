@extends('layouts.layout')

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="container text-center">
            <h1>Welcome to MiniBlog</h1>
            <h2>Please login or sign up to proceed</h2>
        </div>
        <div class="row">
            <div class="col-md-7 mb-5">
                <form action="/register" method="post" class="p-5 bg-white">
                    @csrf
                    <div class="text-center">
                        <h3>SIGN UP NOW</h3>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">

                            <input type="text" id="firstName" name="firstName" placeholder="First Name" class="form-control">
                        </div>
                        <div class="col-md-6">

                            <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">

                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">

                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <input type="password" id="passwordConfirm" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Sign Up" class="btn btn-primary py-2 px-4 text-white">
                        </div>
                    </div>

                    @if($errors->error)

                        <div class="row form-group">
                            <div class="col-md-12">
                                <ul class="errorList">

                                    @foreach($errors->error->all() as $error)
                                        <li><p>{{$error}}</p></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    @if(session('message'))
                        <div class="row form-group">
                            <div class="col-md-12">
                                <p class="successMessage">{{session('message')}}</p>
                            </div>
                        </div>
                        @endif
                </form>
            </div>
            <div class="col-md-5">
                <div class="p-4 mb-3 bg-white">
                    <form action="/login" method="post" class="p-5 bg-white">
                        @csrf
                        <div class="text-center">
                            <h3>LOGIN</h3>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">

                                <input type="text" id="emailLogin" name="emailLogin" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-md-0">

                                <input type="password" id="passwordLogin" name="passwordLogin" class="form-control" placeholder="Password">
                            </div>
                        </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Login" class="btn btn-primary py-2 px-4 text-white">
                                </div>
                            </div>
                        @if($errors->login)
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <ul class="errorList">
                                        @foreach($errors->login->all() as $error)
                                            <li><p>{{$error}}</p></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                    @endif
                        @if(session('loginMessage'))
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <p>{{session('loginMessage')}}</p>
                                </div>
                            </div>
                    @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
