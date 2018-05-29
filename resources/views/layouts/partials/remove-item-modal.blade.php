<div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="newItemModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add a new item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add-item') }}" method="post" class="p-4">
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <label for="inputName" class="col-sm-1-12 col-form-label">Item Name</label>
                            <input type="text"
                                   class="form-control" name="name" required placeholder="Supreme hoodie">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="inputName" class="col-sm-1-12 col-form-label">Condition</label>
                            <br>
                            <label class="checkbox-inline">
                                <input type="radio" name="condition" required value="New"> New
                                <input type="radio" name="condition" required value="Used"> Used
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="inputName" class="col-sm-1-12 col-form-label">Size</label>
                            <input type="text"
                                   class="form-control" name="size" required placeholder="6, 7, 8.5, SM, M, L, XL...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="inputName" class="col-sm-1-12 col-form-label">Price range (min &
                                desired)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                                <input type="number" class="form-control" required name="priceMin" placeholder="min">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                                <input type="number" class="form-control" required name="priceMax" placeholder="desired">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="">Date dropped off? (optional)</label>
                            <input type="date" name="dropped_off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Add new item</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>