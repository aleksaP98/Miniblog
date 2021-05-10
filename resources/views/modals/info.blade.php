<div id="infoModal" class="modal" data-id="2">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="close-container">
            <span data-id="2" class="close">&times;</span>
        </div>
        <div class="modal-title">
            <h2>Change Profile Info</h2>
        </div>
        <div class="modal-info">
            <form action="/profile/{{$user->id}}/infoUpdate" method="POST"  class="save">
                @csrf
                <ul class="user-info">
                    <li><label>First Name: </label><input class="form-control" type="text" id="firstName" name="firstName" ></li>
                    <li><label>Last Name: </label><input class="form-control" type="text" id="lastName" name="lastName"></li>
                    <li><label>Email: </label><input class="form-control" type="text" id="email" name="email"></li>
                    <li><label>Nickname: </label><input class="form-control" type="text" id="nickname" name="nickname"></li>
                </ul>
                <div>
                    <input  type="submit"  class="btn btn-primary py-2 px-4 text-white" value="Save">
                </div>
            </form>
        </div>

    </div>
</div>