@extends('layouts.adminLayout')


@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="section-title">
                    <h1>Update & Delete Users</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body table-responsive">
                                <table class="mb-0 table table-hover table-image">
                                    <thead>
                                        <tr>
                                            <th scope="ol">#</th>
                                            <th scope="ol">First Name</th>
                                            <th scope="ol">Last Name</th>
                                            <th scope="ol">Nickname</th>
                                            <th scope="ol">Email</th>
                                            <th scope="ol">Role</th>
                                            <th scope="ol">Profile Image</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        @if (session('message'))
                                            <tr>
                                                <td>
                                                    {{session('message')}}
                                                </td>
                                            </tr>
                                        @endif
                                        @if ($errors->updateUser->any() || session('error') )   
                                                <tr>
                                                    <td>
                                                        #
                                                    </td>
                                                    @if ($errors->updateUser)
                                                        @foreach ($errors->updateUser->all() as $error)
                                                        <td>
                                                            <p class="errorMessage">{{ $error }}</p>
                                                        </td>
                                                        @endforeach
                                                    @endif
                                                    @if(session('error'))
                                                        <td>
                                                            <p class="errorMessage">{{session('error')}}</p>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endif
                                        @foreach ($users as $user)
                                        <form enctype="multipart/form-data" action="{{route('admin.updateUser')}}" method="POST">
                                            @csrf
                                            <tr>
                                                <th scope="row">{{$user->id}}</td>
                                                <td><input class="form-control" type="text" name="firstName" value="{{$user->firstName}}"></td>
                                                <td><input class="form-control" type="text" name="lastName" value="{{$user->lastName}}"></td>
                                                <td><input class="form-control" type="text" name="nickname" value="{{$user->nickname}}"></td>
                                                <td><input class="form-control" type="text" name="email" value="{{$user->email}}"></td>
                                                <td>
                                                    <select class="form-select" name="role">
                                                        @foreach ($roles as $role)
                                                            @if ($role->id == $user->role_id)
                                                                <option selected value="{{$role->id}}">{{$role->name}}</option>
                                                            @else
                                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="w-25">
                                                    @foreach ($images as $image)
                                                        @if($image->user_id == $user->id && $image->profileImage)
                                                            <img class="img-fluid img-thumbnail" src="{{asset('assets'.$image->src)}}" alt="{{$image->alt}}">
                                                        @endif
                                                    @endforeach
                                                    <label for="image">Upload new image</label><input class="form-control-file" type="file" name="imageUpload">
                                                </td>
                                                <td class="">
                                                    <input type="submit" value="Update" class="btn btn-primary mb-2">
                                                    <a data-id="{{$user->id}}" href="#" class="btn btn-danger mb-2 deleteUser">Delete</a>
                                                </td>
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                            </tr>
                                           
                                            
                                        </form>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection