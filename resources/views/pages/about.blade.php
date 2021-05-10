@extends('layouts.layout')

@section('content')
    @if(session('message'))
        <div class="row form-group">
            <div class="col-md-12">
                <p class="successMessage">{{session('message')}}</p>
            </div>
        </div>
    @endif
    @if($errors->error->any())
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
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('assets/images/img_4.jpg');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <h1 class="">About Us</h1>
                        <p class="lead mb-4 text-white"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <div id="map"></div>
                </div>
                <div class="col-md-5 mr-auto order-md-1">
                    <h2>Where we reside</h2>
                    <p>Our team is located in the capital city of Serbia - Belgrade. Contact info is below</p>
                    <ul class="ul-check list-unstyled success">
                        <li>Address: Kneza Milosa 11</li>
                        <li>Contact: +381-69318-4742</li>
                        <li>Email: aleksa.predragovic.289.18@ict.edu.rs</li>
                        <li>Email: predragovic.aleksa@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('assets/images/img_1.jpg')}}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-5 ml-auto">
                    <h2>We are looking for support!</h2>
                    <p class="mb-4">If you want to be a part of our team and share all the amazing experiences, feel free to send us your CV at any time :D</p>
                    <ul class="ul-check list-unstyled success">
                        <li>Apply for job: miniblog@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <h2>Send our admin a message</h2>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-lg-6">
                    <img src="{{asset('assets/images/pexels-pixabay-327533.jpg')}}" class="aboutImg" alt="img">
                </div>
                <div class="col-lg-6">
                    <div class="subscribe-1 ">
                        <form action="{{route('mail')}}" method="post" class="bg-white">
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <textarea name="message" id="message" class="form-control" placeholder="Your message" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

@section('scripts')
    <script src="{{asset('/assets/js/maps.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPzcfwOrCyOhAOlnlPdJXyS4VM2c7Aw34&callback=initMap"
            async defer></script>
@endsection
