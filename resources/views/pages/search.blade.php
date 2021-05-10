@extends('layouts.layout')

@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('assets/images/img_4.jpg');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <h1 class="">Search results</h1>
                        <p class="lead mb-4 text-white"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
                        <article class="user">
                            <div>
                                <a href="/profile/{{$user->id}}"><figure class="author-figure mb-3 mr-3 ml-3 mt-3 float-left"><img src="assets/{{$user->src}}" alt="{{$user->alt}}" class="img-fluid"></figure></a>
                            </div>
                            <p class="userSearchInfo">First Name: {{$user->firstName}}</p>
                            <p class="userSearchInfo">Last Name: {{$user->lastName}}</p>
                            <p class="userSearchInfo">Nickname: {{$user->nickname}}</p>
                            <p class="userSearchInfo">Email: {{$user->email}}</p>
                            
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
    <div class="site-section bg-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <div class="subscribe-1 ">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
