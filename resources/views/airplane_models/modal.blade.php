<div class="modal fade" id="addNewModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Model</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ "/" }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Model Name</label>
                        <input type="text" class="form-control" id="name" name="name" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Number of economy class seats</label>
                        <input type="text" class="form-control" id="number_of_economy_class_seats" name="number_of_economy_class_seats" placeholder="0">
                    </div>
                    <div class="form-group">
                        <label>Number of businessmen seats</label>
                        <input type="text" class="form-control" id="number_of_businessmen_seats" name="number_of_businessmen_seats" autofocus placeholder="0">
                    </div>
                    <div class="form-group">
                        <label>Number of first class seats</label>
                        <input type="text" class="form-control" id="number_of_first_class_seats" name="number_of_first_class_seats" autofocus placeholder="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>