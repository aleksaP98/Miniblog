@extends('layouts.adminLayout')

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="tab-content">
                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="section-title">
                        <h1>Create User</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">User Properties</h5>
                                    @if (Session::has('message'))
                                        <p class="successMessage">{{Session::get('message')}}</p>
                                    @endif
                                    <form enctype="multipart/form-data" class="" method="post" action="{{route('admin.createUser')}}">
                                        @csrf
                                        <div class="position-relative form-group"><label for="firstName" class="">First Name</label><input name="firstName" id="firstName" placeholder="" type="text" class="form-control"></div>
                                        <div class="position-relative form-group"><label for="lastName" class="">Last Name</label><input name="lastName" id="lastName" placeholder="" type="text" class="form-control"></div>
                                        <div class="position-relative form-group"><label for="email" class="">Email</label><input name="email" id="email" placeholder="" type="email" class="form-control"></div>
                                        <div class="position-relative form-group"><label for="nickname" class="">Nickname</label><input name="nickname" id="nickname" placeholder="" type="text" class="form-control"></div>
                                        <div class="position-relative form-group"><label for="password" class="">Password</label><input name="password" id="password" placeholder="" type="password" class="form-control"></div>
                                        <div class="position-relative form-group"><label for="confirmPass" class="">Confirm Password</label><input name="password_confirmation" id="confirmPass" placeholder="" type="password" class="form-control"></div>
                                        <div class="position-relative form-group"><label for="role">Select Role</label>
                                            <select class="form-control" name="role" id="role">
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group"><label for="exampleFile" class="">Profile Picture (not neccesery)</label><input  name="imageUpload" id="imageUpload" type="file" class="form-control-file"></div>
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
                                        <button class="mt-1 btn btn-primary">Create User</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
