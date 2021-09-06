<div class="row">
    <div class="col-xs-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <button class="btn btn-social btn-flat btn-success btn-sm" onclick="tambah()"><i class="icon-plus3"></i> Tambah Data</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" width="40px">No.</th>
                            <th>Nama Alat</th>
                            <th>Jumlah Alat</th>
                            <th>Pemeriksaan</th>
                            <th>Lama Pemakaian</th>
                            <th>Kondisi</th>
                            <th class="text-center" width="60px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="tampil_modal"></div>
<script>
    $(document).ready(function() {
        load_data();
    });

    function load_data() {
        $.ajax({
            url: "<?= site_url('data/tampil') ?>",
            method: "GET",
            dataType: 'json',
            success: function(data) {
                var html = '';
                var no = 1;
                if (data == 0) {
                    html += '<tr>';
                    html += '<td colspan="7" class="text-center">Belum ada data</td>';
                    html += '</tr>';
                } else {
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr>';
                        html += '<td class="text-center">' + no + '.</td>';
                        html += '<td>' + data[i].nama + '</td>';
                        html += '<td>' + data[i].jumlah + '</td>';
                        html += '<td>' + data[i].periksa + '</td>';
                        html += '<td>' + data[i].lama + '</td>';
                        html += '<td>' + data[i].kondisi + '</td>';
                        html += '<td class="text-center">';
                        html += '<a href="#" title="Edit"><i class="icon-pencil7 text-green"></i></a> <a href="#"><i class="icon-trash text-red" title="Hapus"></i></a>';
                        html += '</td>';
                        html += '</tr>';
                        no++;
                    }
                }
                $('#data').html(html);
            }
        })
    }

    function tambah() {
        $.ajax({
            url: "<?= site_url('data/tambah') ?>",
            type: "GET",
            success: function(resp) {
                $("#tampil_modal").html(resp);
                $("#modal_create").modal('show');
            }
        });
    }

    $(document).on('submit', '.form_create', function(e) {
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $('.store_data').button('loading');
            },
            success: function(resp) {
                $("#modal_create").modal('hide');
                load_data();
            },
            complete: function() {
                $('.store_data').button('reset');
            }
        });
        return false;
    });
</script>