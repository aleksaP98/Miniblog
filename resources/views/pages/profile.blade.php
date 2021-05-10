
@extends('layouts.layout')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')

    <div class="container d-flex flex-wrap mt-3 rounded">
        <div class="profile col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="profile-title">
                <h2>Profile</h2>
            </div>
            <div class="profile-content">
                <div class="profile-image">
                    @foreach($userImages as $userImage)
                        @if($userImage->profileImage)
                            @if(session()->get('user')->id === $user->id)
                            <a id="userImage" data-id="1" class="edit" href="#"><img src="{{asset('assets/'.$userImage->src)}}" alt="{{$userImage->alt}}"></a>
                                @else
                                <img src="{{asset('assets/'.$userImage->src)}}" alt="{{$userImage->alt}}">
                                @endif
                        @endif
                    @endforeach
                    @if(empty($userImages[0]))
                        @if(session()->get('user')->id === $user->id)
                            <a id="userImage" data-id="1" class="edit" href="#"><img src="{{asset('assets/images/users/defaultProfileImage.png')}}" alt="default user image" ></a>
                            @else
                                <img src="{{asset('assets/images/users/defaultProfileImage.png')}}" alt="default user image" >
                            @endif
                    @endif
                </div>
                <div class="profile-info">
                    <div class="profile-info-title">
                        <h3>Profile Information</h3>
                    </div>
                    <div class="profile-info-content">
                        <ul class="user-info">
                            <li><label>First Name: </label><span id="fName">{{' '. $user->firstName}}</span></li>
                            <li><label>Last Name: </label><span id="lName">{{' '. $user->lastName}}</span></li>
                            <li><label>Email: </label><span id="mail">{{' '.$user->email}}</span></li>
                            <li><label>Nickname: </label><span id="nick">{{$user->nickname}}</span></li>
                            <li class="hidden"><p id="idUser">{{session()->get('user')->id}}</p></li>
                            @if($errors->updateUser)
                                @foreach ($errors->updateUser->all() as $error)
                                    <li>
                                        <p class="errorMessage">{{$error}}</p>
                                    </li>
                                @endforeach
                            @endif
                            @if(Session::has("message"))
                                <li>
                                    <p class="successMessage">{{Session::get('message')}}</p>
                                </li>
                            @endif
                        </ul>
                        @if(session()->get('user')->id === $user->id)
                        <button data-id="2" class="btn btn-primary py-2 px-4 text-white edit">Edit</button>
                            @endif
                    </div>
                </div>
                <div class="password-settings">
                    @if(session()->get('user')->id === $user->id)
                    <button data-id="3" class="btn btn-primary py-2 px-4 text-white edit">Edit Password</button>
                        @endif
                </div>
            </div>
        </div>
        <div class="site-section bg-light col-lg-8 col-md-8 col-sm-8 col-12">
            <div class="container">
                <div class="row align-items-stretch retro-layout-2">
                    <div class="posts-title">
                        @if($user->id == session()->get('user')->id)
                        <h2>Your Posts</h2>
                            @else
                        <h2>{{$user->firstName}}'s Posts</h2>
                            @endif
                    </div>
                </div>
                <div class="posts-container">

                    @foreach($posts as $post)
                    <article class="post">
                        <div class="post-title">
                            <h3>{{$post->title}}</h3>
                        </div>
                        <div class="post-content">
                            @if($post->src)
                            <div class="post-image">
                                <img src="{{asset('assets/'.$post->src)}}" alt="{{$post->alt}}">
                            </div>
                            @endif
                            <div class="post-description">
                                <p>{{$post->description}}</p>
                            </div>
                        </div>
                        <h4>Comments</h4>
                        <div class="post-comments">
                            <ul  data-post="{{$post->id}}" class="comment-list">
                                @foreach($comments as $comment)
                                    @foreach($comment as $comm)

                                    @if($comm->post_id === $post->id)
                                        @if($comm->parent_id != null)
                                        <li class="comment-list-item-reply">
                                            @else
                                                <li class="comment-list-item">
                                            @endif
                                            <div data-id="{{$comm->id}}" class="comment">
                                                <div class="entry2">
                                                    <div class="post-meta align-items-center text-left clearfix">
                                                        <figure data-user="{{$user->id}}" class="author-figure mb-0 mr-3 float-left"><img src="{{asset('assets/'.$comm->src)}}" alt="{{$comm->alt}}" class="img-fluid"></figure>
                                                        <span class="d-inline-block mt-1">By <a href="/profile/{{$comm->user_id}}">{{$comm->firstName . ' ' . $comm->lastName}}</a></span>
                                                        <span>&nbsp;-&nbsp;{{$comm->createdAt}}</span>
                                                        <p>{{$comm->description}}</p>
                                                        <a data-comment="{{$comm->id}}" class="openReplyForm" href="#">Write a reply</a>
                                                        <form data-post="{{$post->id}}" data-comment="{{$comm->id}}" class="hidden replyForm"  action="#" method="post">
                                                            <input data-comment="{{$comm->id}}" type="text" class="form-control-mini reply" name="reply" placeholder="Write a reply..">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                    @endforeach
                                @endforeach
                            </ul>
                            <div class="addComment">
                                <form data-post="{{$post->id}}" class="commentForm">
                                    <input data-post="{{$post->id}}" class="form-control"  name="comment" placeholder="Comment on this post">
                                </form>
                                @if(session()->get('user')->id === $user->id)
                                    <div class="deletePost">
                                        <form  class="deleteForm" action="{{route('deletePost',$post->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$post->id}}">
                                            <input type="submit" class="btn btn-danger" value="Delete Post">
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                @if(session()->get('user')->id === $user->id)
                <div class="make-posts">
                    <button data-id = '4' class="btn btn-primary py-2 px-4 text-white edit">Create New Post</button>
                </div>
                    @endif
            </div>
        </div>
    </div>

    @include("modals.image")

    @include('modals.info')

    @include('modals.password')

    @include('modals.post')

@endsection
