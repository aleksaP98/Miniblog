@extends('layouts.layout')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<p class="hidden" id="idUser">{{session()->get('user')->id}}</p>
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center">Recent Posts</h2>
            </div>
        </div>
        <div class="row justify-content-center">
        @foreach($users as $user)
            @foreach($posts as $post)
                @if($user->id == $post->user_id)
            <div class="col-lg-9 mb-4">
                <div class="entry2">
                    @if (isset($post->src))
                        <a href="/profile/{{$post->user_id}}"><img src="assets/{{$post->src}}" alt="{{$post->alt}}" class="img-fluid rounded"></a>    
                    @endif
                
                    <div class="excerpt">
                        <h2>{{ucfirst($post->title)}}</h2>
                        <div class="post-meta align-items-center text-left clearfix">

                            @foreach($images as $image)
                                @if($image->user_id == $user->id)
                                    <a href="/profile/{{$user->id}}"><figure class="author-figure mb-0 mr-3 float-left"><img src="assets/{{$image->src}}" alt="{{$image->alt}}" class="img-fluid"></figure></a>
                                @endif
                            @endforeach
                            <span class="d-inline-block mt-1">By <a href="/profile/{{$user->id}}">{{$user->firstName.' '. $user->lastName}}</a></span>
                            <span>&nbsp;-&nbsp; {{$post->createdAt}}</span>
                        </div>

                        <p>{{$post->description}}</p>
                        <div class="post-comments">
                            <ul data-post="{{$post->id}}" class="comment-list">
                                @foreach ($comments as $key => $value)
                                    @if($key == $post->id)
                                        @foreach ($comments[$key] as $comment)
                                            @if ($comment->parent_id == null)
                                                <li class="comment-list-item">
                                                    <div data-id="{{$comment->id}}" class="comment">
                                                        <div class="entry2">
                                                            <div class="commentContainer post-meta align-items-center text-left clearfix">
                                                                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('assets/'.$comment->src)}}" alt="{{$comment->alt}}" class="img-fluid"></figure>
                                                                <span class="d-inline-block mt-1">By <a href="/profile/{{$comment->user_id}}">{{$comment->firstName . ' ' . $comment->lastName}}</a></span>
                                                                <span>&nbsp;-&nbsp;{{$comment->createdAt}}</span>
                                                                <p>{{$comment->description}}</p>
                                                                <a data-comment="{{$comment->id}}" class="openReplyForm" href="#">Write a reply</a>
                                                                <form data-post="{{$post->id}}" data-comment="{{$comment->id}}" class="hidden replyForm"  action="#" method="post">
                                                                    <input data-comment="{{$comment->id}}" type="text" class="form-control-mini reply" name="reply" placeholder="Write a reply..">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @foreach ($comments[$key] as $reply)
                                                    @if ($reply->parent_id != null)
                                                        @foreach ($comments[$key] as $item)
                                                            @if ($reply->parent_id == $item->id && ($item->parent_id == $comment->id || $reply->parent_id == $comment->id))
                                                                <li class="comment-list-item-reply">
                                                                    <div data-id="{{$reply->id}}" class="comment">
                                                                        <div class="entry2">
                                                                            <div class="post-meta align-items-center text-left clearfix">
                                                                                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('assets/'.$reply->src)}}" alt="{{$reply->alt}}" class="img-fluid"></figure>
                                                                                <span class="d-inline-block mt-1">By <a href="/profile/{{$reply->user_id}}">{{$reply->firstName . ' ' . $reply->lastName}}</a></span>
                                                                                <span>&nbsp;-&nbsp;{{$reply->createdAt}}</span>
                                                                                <p>{{$reply->description}}</p>
                                                                                <a data-comment="{{$reply->id}}" class="openReplyForm" href="#">Write a reply</a>
                                                                                <form data-post="{{$post->id}}" data-comment="{{$reply->id}}" class="hidden replyForm">
                                                                                    <input data-comment="{{$reply->id}}" type="text" class="form-control-mini reply" name="reply" placeholder="Write a reply..">
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif 
                                        @endforeach
                                    @endif
                                @endforeach
                            </ul>
                            <div class="addComment">
                                <form data-post="{{$post->id}}" class="commentForm">
                                    <input data-post="{{$post->id}}" class="form-control"  name="comment" placeholder="Comment on this post">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    @endforeach
            </div>
        </div>

    </div>
</div>
@endsection


{{-- 
@foreach($comments as $comment)
                                    @foreach($comment as $comm)
                                        @if($comm->post_id == $post->id)
                                            @if($comm->parent_id == null)
                                                <li class="comment-list-item">
                                                    <div data-id="{{$comm->id}}" class="comment">
                                                        <div class="entry2">
                                                            <div class="commentContainer post-meta align-items-center text-left clearfix">
                                                                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('assets/'.$comm->src)}}" alt="{{$comm->alt}}" class="img-fluid"></figure>
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
                                            @foreach ($comment as $item)
                                                @if($comm->parent_id == $item->id)
                                                    <li class="comment-list-item-reply">
                                                        <div data-id="{{$comm->id}}" class="comment">
                                                            <div class="entry2">
                                                                <div class="post-meta align-items-center text-left clearfix">
                                                                    <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('assets/'.$comm->src)}}" alt="{{$comm->alt}}" class="img-fluid"></figure>
                                                                    <span class="d-inline-block mt-1">By <a href="/profile/{{$comm->user_id}}">{{$comm->firstName . ' ' . $comm->lastName}}</a></span>
                                                                    <span>&nbsp;-&nbsp;{{$comm->createdAt}}</span>
                                                                    <p>{{$comm->description}}</p>
                                                                    <a data-comment="{{$comm->id}}" class="openReplyForm" href="#">Write a reply</a>
                                                                    <form data-post="{{$post->id}}" data-comment="{{$comm->id}}" class="hidden replyForm">
                                                                        <input data-comment="{{$comm->id}}" type="text" class="form-control-mini reply" name="reply" placeholder="Write a reply..">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endforeach --}}