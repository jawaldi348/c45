<div class="modal fade" id="modal_create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Upload Data</h4>
            </div>
            <?= form_open_multipart('data/import', ['class' => 'form_create']) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="required">Upload Data</label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success store_data" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading..."><i class="icon-floppy-disk"></i> Upload</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-cross2"></i> Batal</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>