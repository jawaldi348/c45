<div class="modal fade" id="modal_create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <?= form_open('data/update', ['class' => 'form_create'], ['kode' => $data['id']]) ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Alat</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Alat</label>
                    <select name="jumlah" id="jumlah" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Cukup" <?= $data['jumlah'] == 'Cukup' ? 'selected' : '' ?>>Cukup</option>
                        <option value="Banyak" <?= $data['jumlah'] == 'Banyak' ? 'selected' : '' ?>>Banyak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pemeriksaan</label>
                    <select name="periksa" id="periksa" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Rutin" <?= $data['periksa'] == 'Rutin' ? 'selected' : '' ?>>Rutin</option>
                        <option value="Tidak Rutin" <?= $data['periksa'] == 'Tidak Rutin' ? 'selected' : '' ?>>Tidak Rutin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Lama Pemakaian</label>
                    <div class="input-group">
                        <input type="text" name="lama" id="lama" class="form-control" value="<?= $data['lama'] ?>" required>
                        <span class="input-group-addon">Tahun</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Kondisi</label>
                    <select name="kondisi" id="kondisi" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Baik" <?= $data['kondisi'] == 'Baik' ? 'selected' : '' ?>>Baik</option>
                        <option value="Tidak Baik" <?= $data['kondisi'] == 'Tidak Baik' ? 'selected' : '' ?>>Tidak Baik</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success store_data" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Loading..."><i class="icon-floppy-disk"></i> Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-cross2"></i> Batal</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>