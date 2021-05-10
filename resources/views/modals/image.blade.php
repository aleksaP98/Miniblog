<div id="imageModal" class="modal" data-id="1">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="close-container">
            <span data-id="1" class="close">&times;</span>
        </div>
        <div class="modal-title">
            <h2>Change Profile Picture</h2>
        </div>
        <div class="modal-img">
            @foreach($userImages as $userImage)
                @if($userImage->profileImage)
                    <img src="{{asset('assets/'.$userImage->src)}}" alt="{{$userImage->alt}}">
                @endif
            @endforeach
        </div>
        <div class="userImages">
            <div class="row justify-content-center">
                @foreach ($userImages as $image)
                
                <div class="col-lg-3 col-md-3 col-sm-3 userImageContainer">
                    <a class="changeProfileImage" data-id="{{$image->id}}" href="#"><img  class="userImg" src="{{asset('assets/'.$image->src)}}" alt="{{$image->alt}}"></a>
                </div> 
                @endforeach
            </div>
        </div>
        <div class="buttons-container">
            <form action="/profile/{{$user->id}}/imageUpdate" method="post" enctype="multipart/form-data" class="save">
                @csrf
                <input class="imageUpload" type="file" name="imageUpload">
                <input type="submit" value="Save"  class="btn btn-primary py-2 px-4 text-white">
            </form>
        </div>
    </div>
</div>