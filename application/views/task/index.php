<div class="row row-xs">
  <div class="col-lg-12 col-xl-12 mg-t-10">
    <div class="card shadow-ppq">
      <!-- Card header -->
      <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
        <button type="button" class="btn btn-primary float-right" id="add_role"><i class="fas fa-plus"></i> Tugas Baru</button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-flush" id="datatables">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th>Judul</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created By</th>
                <th>Created Date</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Category Pengeluaran -->
<div class="modal fade" id="modalAddRole" tabindex="-1" role="dialog" aria-labelledby="modalAddMitra" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="modal-title-mitra">Tambah Role</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="no_telp">Nama Role</label>
              <input type="text" class="form-control" id="nama_role_add" placeholder="Nama Role">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="no_telp">Status</label>
              <select name="" class="form-control" id="status_add">
                <option value="">-- Pilih Status --</option>
                <option value="0" selected>Aktif</option>
                <option value="1">Tidak Aktif</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_role">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Role -->
<div class="modal fade" id="modalEditRole" tabindex="-1" role="dialog" aria-labelledby="modalAddMitra" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="modal-title-mitra">Edit Role</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-mitra">
        <div class="modal-body">
          <input type="hidden" class="form-control" id="update_id_role">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="no_telp">Nama Role</label>
                <input type="text" class="form-control" id="update_nama_role_edit" placeholder="Nama Role">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Status</label>
                <select name="" class="form-control" id="update_status_edit">
                  <option value="">-- Pilih Status --</option>
                  <option value="0">Aktif</option>
                  <option value="1" selected>Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="id_role">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save_edit_role">Simpan</button>
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
        // console.log(response.data[0].id_role)
        $("#update_id_role").val(response.data[0].id_role)
        $("#update_nama_role_edit").val(response.data[0].nama_role)
        $("#update_status_edit").val(response.data[0].is_delete)
        $('#modalEditRole').modal('show');
      },
      error: function(data) {
        swal("Error", "Gagal Fetch Data", "error");
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
      'rowCallback': function(row, data, index) {
        if (data.status_hide == "0") {
          $('td', row).css('background-color', 'rgba(255, 0, 0, 0.15)');
        } else if (data.status_hide == "1") {
          $('td', row).css('background-color', 'rgba(255,255,0,0.3)');
        } else if (data.status_hide == "2") {
          $('td', row).css('background-color', 'rgba(0, 255, 0, 0.15)');
        }
      },
    });


    /* Show modal Tambah category pengeluaran */
    $('#add_role').click(function() {
      $('#modalAddRole').modal('show');
    });


    /* Proses Save category */
    $('#save_role').click(function() {
      let nama_role = $('#nama_role_add').val();
      let status = $('#status_add').val();
      $.ajax({
        url: '<?= site_url($site_url . '/add') ?>',
        type: 'POST',
        data: {
          nama_role: nama_role,
          is_delete: status
        },
        beforeSend: function() {
          $('#save_role').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
        },
        success: function(response) {
          Swal.fire("Yeay! Your data has been saved!", {
            icon: "success",
          }).then(function() {
            $('#save_role').html('Save')
            $('#modalAddRole').modal('hide');
            $('#datatables').DataTable().draw();
          });
        },
        error: function(response) {
          $('#save_role').html('Save')
          Swal.fire("Error", "Gagal Menambah Data", "error");
        }
      });
    });

    // Update
    $('#save_edit_role').click(function() {
      let id_role = $("#update_id_role").val()
      let nama_role = $('#update_nama_role_edit').val();
      let status = $('#update_status_edit').val();
      $.ajax({
        url: '<?= site_url($site_url . '/edit') ?>',
        type: 'POST',
        data: {
          id: id_role,
          nama_role: sanitizeHTML(nama_role),
          is_delete: sanitizeHTML(status)
        },
        success: function(response) {
          Swal.fire("Yeay! Your data has been saved!", {
            icon: "success",
          }).then(function() {
            $('#modalEditRole').modal('hide');
            $('#datatables').DataTable().draw();
          });
        },
        error: function(response) {
          Swal.fire("Error", "Gagal Menambah Data", "error");
        }
      });
    });

  });
</script>