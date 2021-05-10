<div id="imageModal" class="modal" data-id="4">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="close-container">
            <span data-id="4" class="close">&times;</span>

        </div>
        <div class="modal-title text-center">
            <h2>Create a new post</h2>
        </div>
        <div class="modal-info">

            <form action="/profile/{{$user->id}}/addPost" method="post" class="save d-flex flex-column" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" class="form-control mb-3" placeholder="Title">
                <textarea placeholder="Description" class="form-control mb-3" name="description"></textarea>
                <label>Set a picture for your post</label><input type="file" class="mb-3" name="imageUpload">
                <input type="submit" value="Create"  class="btn btn-primary py-2 px-4 text-white btnCreate">
            </form>
        </div>
    </div>
</div>