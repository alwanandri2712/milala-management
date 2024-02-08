<div class="row row-xs">
  <div class="col-lg-12 col-xl-12 mg-t-10">
    <div class="card shadow-ppq">
      <!-- Card header -->
      <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
        <button type="button" id="sync_youtube" class="btn btn-primary float-right"> <i class="fas fa-sync-alt"></i> Sync Youtube</button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-dashboard mg-b-0" id="datatables">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th>Video ID</th>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Link</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function sync_youtube() {
    $.ajax({
      url: "<?= site_url($site_url . '/sync_youtube') ?>",
      type: 'GET',
      async: true,

      beforeSend: function() {
        $('#sync_youtube').html('<i class="fas fa-sync-alt fa-spin"></i> Processing...');
      },
      success: function(res) {

        if (res.code == 200) {
          $('#datatables').DataTable().draw();
          $('#sync_youtube').html('<i class="fas fa-sync-alt"></i> Sync Youtube');
          Swal.fire("Success", res.message, "success");
        }
      },
      error: function(data) {
        Swal.fire("Error", "Gagal Menghapus Data", "error");
        $('#sync_youtube').html('<i class="fas fa-sync-alt"></i> Sync Youtube');

      }
    })
  }

  var table;
  $(document).ready(function(e) {
    table = $('#datatables').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": "<?= site_url($site_url . '/ajax_datatable_video') ?>",
        "type": "POST"
      },
      "language": {
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ - _END_ ( Total : _TOTAL_ )",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      }
    });

    $('#sync_youtube').click(function() {
      sync_youtube();
    })

  })
</script>