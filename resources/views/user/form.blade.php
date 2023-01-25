<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" class="form-horizontal">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-md-offset control-label">Nama</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-md-offset control-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" name="email" id="email" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-2 col-md-offset control-label">Phone</label>
                        <div class="col-md-9">
                            <input type="text" name="phone" id="phone" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-2 col-md-offset control-label">Address</label>
                        <div class="col-md-9">
                            <input type="text" name="address" id="address" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-flat btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-flat btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>