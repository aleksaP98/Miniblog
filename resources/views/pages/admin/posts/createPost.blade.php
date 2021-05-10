@extends('layouts.adminLayout')

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="tab-content">
                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="section-title">
                        <h1>Create Post</h1>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    @if (Session::has('message'))
                                        <p class="successMessage">{{Session::get('message')}}</p>
                                    @endif
                                    <form enctype="multipart/form-data" class="" method="post" action="{{route('admin.createPost')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="postLabel" for="">Choose user</label>
                                            <select name="user" id="user" class="form-control mb-3">
                                                @foreach ($users as $user)
                                                    <option value="{{$user->id}}">{{$user->firstName.' '.$user->lastName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative form-group"><label for="Title" class="">Title</label><input name="title" id="title" placeholder="" type="text" class="form-control"></div>
                                        <div class="position-relative form-group"><label for="Description" class="">Description</label><input name="description" id="description" placeholder="" type="text" class="form-control"></div>
                                        <div class="position-relative form-group"><label for="exampleFile" class="">Post Picture (not neccesery)</label><input  name="imageUpload" id="imageUpload" type="file" class="form-control-file"></div>
                                        @if($errors->errorMessage)
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <ul class="errorList">
                    
                                                        @foreach($errors->errorMessage->all() as $error)
                                                            <li><p>{{$error}}</p></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                        <button class="mt-1 btn btn-primary">Create Post</button>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
