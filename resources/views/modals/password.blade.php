<div id="imageModal" class="modal" data-id="3">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="close-container">
            <span data-id="3" class="close">&times;</span>

        </div>
        <div class="modal-title">
            <h2>Change Password</h2>
        </div>
        <div class="buttons-container">

            <form action="/profile/{{$user->id}}/passwordUpdate" method="post" class="save">
                @csrf
                <input type="password" name="password" class="form-control mb-3" placeholder="New Password">
                <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Confirm New Password">
                <input type="submit" value="Save"  class="btn btn-primary py-2 px-4 text-white">
            </form>
        </div>
    </div>
</div>