<div class="row row-xs">
  <div class="col-lg-12 col-xl-12 mg-t-10">
    <div class="card shadow-ppq">
      <!-- Card header -->
      <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i> <?= $tittle_2 ?> Baru</button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-flush" id="datatables">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th>Nama Pelanggan</th>
                <th>Nomor Polisi</th>
                <th>Phone</th>
                <th>Nomor Telephone</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Category Pengeluaran -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="modal-title-mitra">Tambah <?= $tittle_2 ?></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="no_telp">Nama Pelanggan</label>
              <input type="text" class="form-control" id="nama_pelanggan" placeholder="Nama Pelanggan">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="no_telp">Nomor Polisi</label>
              <input type="text" class="form-control" id="nomor_polisi" placeholder="Nomor Polisi">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label for="no_telp">Nomor Telephone</label>
              <input type="text" class="form-control" id="nomor_telephone" placeholder="Nomor Telephone">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Role -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="modal-title-mitra">Edit <?= $tittle_2 ?></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-mitra">
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="no_telp">Nama Gudang</label>
                <input type="text" class="form-control" id="nama_gudang_edit" placeholder="Nama Gudang">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="id_gudang">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save_edit">Save Changes</button>
        </div>
      </form>
    </div>
    <!-- func -->
  </div>
</div>

<script type="text/javascript">
  function deleteRow(id) {
    Swal.fire({
        title: 'Are you sure Delete All Data ?',
        text: "Once deleted, you will not be able to recover this data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      })
      .then((willDelete) => {
        if (willDelete.isConfirmed) {
          $.ajax({
            url: "<?= site_url($site_url . '/delete/') ?>" + id,
            type: 'GET',
            success: function(data) {
              Swal.fire("Yeay! Your data has been deleted!", {
                icon: "success",
              }).then(function() {
                $('#datatables').DataTable().draw();
              });
            },
            error: function(data) {
              Swal.fire("Error", "Gagal Menghapus Data", "error");
            }
          })
        } else {
          Swal.fire("Your data is safe!");
        }
      });
  }

  function edit(id) {
    $.ajax({
      url: "<?= site_url($site_url . '/edit/') ?>" + id,
      type: 'GET',
      success: function(response) {
        $("#id_gudang").val(response.data[0].id_gudang)
        $("#nama_gudang_edit").val(response.data[0].nama_gudang)
        $('#modalEdit').modal('show');
      },
      error: function(data) {
        Swal.fire("Error", "Gagal Fetch Data", "error");
      }
    })
  }


  var table;
  $(document).ready(function() {

    table = $('#datatables').DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": "<?= site_url($site_url . '/ajax_datatable') ?>",
        "type": "POST"
      },
      "language": {
        "sProcessing": "Sedang memproses...",
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
        },
      },
    });


    /* Show modal Tambah category */
    $('#add_role').click(function() {
      $('#modalAddRole').modal('show');
    });


    /* Proses Save */
    $('#save').click(function() {
      let nama_lengkap = $('#nama_lengkap').val();
      let nomor_polisi = $('#nomor_polisi').val();
      let phone = $('#nomor_telephone').val();

      $.ajax({
        url: '<?= site_url($site_url . '/add') ?>',
        type: 'POST',
        data: {
          nama_lengkap: nama_lengkap,
          nomor_polisi: nomor_polisi,
          phone       : phone,
        },
        beforeSend: function() {
          $('#save').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
        },
        success: function(res) {
          if (res.code == 200) {
            Swal.fire({
              title: "Success",
              text: res.message,
              icon: "success",
              button: "OK",
            })

            $('#save').html('Save')
            $('#modalAdd').modal('hide');
            $('#datatables').DataTable().draw();
          }
        },
        error: function(err) {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: err.responseJSON.message,
          })
          $('#save').html('Save')
        }
      });
    });

    // Update
    $('#save_edit').click(function() {
      let id_gudang = $("#id_gudang").val()
      let nama_gudang = $('#nama_gudang_edit').val();

      $.ajax({
        url: '<?= site_url($site_url . '/edit') ?>',
        type: 'POST',
        data: {
          id         : id_gudang,
          nama_gudang: nama_gudang,
        },
        beforeSend : () => {
          $('#save_edit').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
        },
        success: function(res) {
          if (res.code == 200) {
            Swal.fire({
              title : "Success",
              text  : res.message,
              icon  : "success",
              button: "OK",
            })
            $('#modalEdit').modal('hide');
            $('#datatables').DataTable().draw();
            $('#save_edit').html('Save Changes')
          }
        },
        error: function(err) {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: err.responseJSON.message,
          })
          $('#save_edit').html('Save Changes')
        }
      });
    });

  });
</script>