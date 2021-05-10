@extends('layouts.adminLayout')


@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="section-title">
                    <h1>Update & Delete Posts</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body table-responsive">
                                <table class="mb-0 table table-hover table-image">
                                    <thead>
                                        <tr>
                                            <th scope="ol">#</th>
                                            <th scope="ol">Title</th>
                                            <th scope="ol">Description</th>
                                            <th scope="ol">Created At</th>
                                            <th scope="ol">Updated At</th>
                                            <th scope="ol">Post Image</th>
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
                                        @foreach ($posts as $post)
                                        <form enctype="multipart/form-data" action="{{route('admin.updatePost')}}" method="POST">
                                            @csrf
                                            <tr>
                                                <th scope="row">{{$post->id}}</td>
                                                <td><input class="form-control" type="text" name="title" value="{{$post->title}}"></td>
                                                <td><textarea class="form-control" type="text" name="description" >{{$post->description}}</textarea></td>>
                                                <td><p>{{$post->createdAt}}</p>
                                                <td><p>{{$post->updatedAt}}</p>
                                                <td class="w-25">
                                                    @if ($post->src != null)
                                                        <img class="img-fluid img-thumbnail" src="{{asset('assets'.$post->src)}}" alt="{{$post->alt}}">
                                                    @endif
                                                    <label for="image">Upload new image</label><input class="form-control-file" type="file" name="imageUpload">
                                                </td>
                                                <td class="">
                                                    <input type="submit" value="Update" class="btn btn-primary mb-2">
                                                    <a data-id="{{$post->id}}" href="#" class="btn btn-danger mb-2 deletePost">Delete</a>
                                                </td>
                                                <input type="hidden" name="postId" value="{{$post->id}}">
                                                <input type="hidden" name="userId" value="{{$post->user_id}}">
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