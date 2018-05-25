<div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="newItemModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Mark item as sold</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-item') }}" method="post" class="p-4">
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <label for="inputName" class="col-form-label">Item ID</label>
                            <input type="text" class="form-control" name="id" required placeholder="ID #">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="">Date sold?</label>
                            <input type="date" required name="sold_on">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Mark sold</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>