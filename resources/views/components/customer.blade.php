<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="username" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your name with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="useremail" class="form-label">Email address (Optional)</label>
                    <input type="text" class="form-control" id="useremail" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="phonenumber" class="form-label">Phone Number (Optional)</label>
                    <input type="text" class="form-control" id="phonenumber" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address (Optional)</label>
                    <input type="text" class="form-control" id="address" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your address with anyone else.</div>
                </div>
                <input type="hidden" value="{{Cache::get('restaurantId')}}" id="restaurantId">
                <input type="hidden" value="{{Cache::get('tableNo')}}" id="tableNo">
                <input type="hidden" value="{{env('API_BASE_URL')}}" id="api_base_url">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white" id="submit-data">Submit</button>
            </div>
        </div>
    </div>
</div>
