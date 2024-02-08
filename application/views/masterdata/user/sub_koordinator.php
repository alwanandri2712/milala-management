<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i> Tambah</button>
                </div>
            </div><!-- card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dashboard mg-b-0" id="datatables-ajax">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>ID</th>
                                <th>Images</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Status Account</th>
                                <th>Last Login</th>
                            </tr>
                        </thead>
                    </table>
                </div><!-- table-responsive -->
            </div>
        </div><!-- card -->
    </div><!-- col -->
</div><!-- row -->

<!-- modal add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdd">Tambah Sub Koordinator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <label for="">Foto <span style="color:red">* Opsional</span></label>
                        <input type="file" class="form-control" id="foto_user">
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-control-label">Role <span style="color:red">*</span></label>
                        <select class="form-control" id="id_role_add">
                            <option value="7" selected>Sub Koordinator</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-control-label">Fullname <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="fullname" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-control-label">Phone <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="phone" placeholder="Ex : 089523xxxxx" required>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-control-label">Jenis Kelamin <span style="color:red">* Opsional</span></label>
                        <select class="form-control" id="jenis_kelamin">
                            <option value="">=== SELECT JENIS KELAMIN ===</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-control-label">Username <span style="color:red">* Opsional</span></label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan Username" required>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-control-label">Password <span style="color:red">*</span></label>
                        <input type="password" class="form-control" id="password" placeholder="Password" requored>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_add">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- modal edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit">Edit Sub Koordinator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <img src="" height="200" width="200" id="image_edit" class="img-thumbnail" alt="Foto Users">
                    </div>
                    <div class="col-12">
                        <label for="">Foto</label>
                        <input type="file" class="form-control" id="foto_user_edit">
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-control-label">Role <span style="color:red">*</span></label>
                        <select class="form-control" id="id_role_edit">
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r->id_role ?>"> <?= $r->nama_role ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-control-label">Fullname <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="fullname_edit" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-control-label">Phone <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="phone_edit" placeholder="Ex : 089523xxxxx" required>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-control-label">Jenis Kelamin <span style="color:red">*</span></label>
                        <select class="form-control" id="jenis_kelamin_edit">
                            <option value="">=== SELECT JENIS KELAMIN ===</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-control-label">Username <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="username_edit" placeholder="Ex : Alwan Gantenk" required>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-control-label">Password <span style="color:red">*</span></label>
                        <input type="password" class="form-control" id="password_edit" placeholder="Password" required>
                    </div>
                    <div class="col-md-12">
                        <label for=""> Status </label>
                        <select name="" class="form-control" id="status_edit">
                            <option value="" selected disabled>== Pilih Status ==</option>
                            <option value="0">Aktif</option>
                            <option value="1">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id_users">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_edit">Save changes</button>
            </div>
        </div>
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
                        url: "<?= site_url($site_url . '/delete') ?>",
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            Swal.fire("Yeay! Your data has been deleted!", {
                                icon: "success",
                            }).then(function() {
                                $('#datatables-ajax').DataTable().draw();
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

    function editRow(id) {
        $.ajax({
            url: "<?= site_url($site_url . '/edit') ?>",
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'JSON',
            success: function(response) {
                $('#image_edit').attr("src", '<?= base_url() ?>' + 'upload/users/' + response.foto)
                $('#jenis_kelamin_edit').val(response.jenis_kelamin);
                $('#id_role_edit').val(response.id_role);
                $('#fullname_edit').val(response.fullname);
                $('#phone_edit').val(response.phone);
                $('#username_edit').val(response.username);
                $('#status_edit').val(response.is_delete);
                $('#id_users').val(response.id_user);
                $('#modalEdit').modal('show');
            },
            error: function(data) {
                swal("Error", "Gagal Fetch Data", "error");
            }
        })
    }

    function verify(id) {
        Swal.fire({
                title: 'Apakah kamu yakin Verifikasi User ini ? ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Verifikasi !'
            })
            .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url($site_url . '/verify') ?>",
                        type: 'POST',
                        data: {
                            id: id,
                        },
                        success: function(res) {
                            if (res.code == 200) {
                                Swal.fire({
                                    title: "Success",
                                    text: res.message,
                                    icon: "success",
                                    button: "OK",
                                });
                                $('#datatables').DataTable().draw();
                            }
                        },
                        error: function(err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: err.responseJSON.message,
                            })
                        }
                    })
                } else {
                    Swal.fire("Your data is safe!");
                }
            });
    }

    function dataTablesUsers(role, selectGetText) {
        let roleText = selectGetText != undefined ? "Role " + selectGetText : "All Users"
        table = $('#datatables-ajax').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url($site_url . '/ajax_datatable') ?>",
                "type": "POST",
                "data": {
                    role: role
                }
            },
            responsive: true,
            autoWidth: false,
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
            },
            dom: 'Blfrtip', // munculin export & show  entry
            "buttons": [{
                    "extend": 'excel',
                    "text": 'Export Excel',
                    "titleAttr": 'Excel',
                    "title": "Report Users " + roleText + " - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-success rounded mb-3'
                },
                {
                    "extend": 'pdf',
                    "text": 'Export PDF',
                    "titleAttr": 'PDF',
                    "title": "Report Users " + roleText + " - <?= date('Y-m-d') ?>",
                    "action": newexportaction,
                    "className": 'btn-danger rounded mb-3',
                    "orientation": 'landscape',
                    "pageSize": 'LEGAL'
                },
            ],

        });
    }

    var table;
    $(document).ready(function() {
        dataTablesUsers();

        $("#role_filter").change(function() {
            table.destroy();
            let selectGetText = $(this).find("option:selected").text();
            dataTablesUsers($(this).val(), selectGetText);
        });

        $('#id_role_add').select2({
            placeholder: '=== SELECT ROLE ==='
        });

        $('#role_filter').select2();

        $('#save_add').click(function() {
            let formData = new FormData();
            formData.append('foto_user', $('#foto_user').prop('files')[0] == undefined ? 'kosong' : $('#foto_user').prop('files')[0])
            formData.append('id_role', $('#id_role_add').val())
            formData.append('fullname', $('#fullname').val())
            formData.append('phone', $('#phone').val())
            formData.append('jenis_kelamin', $('#jenis_kelamin').val())
            formData.append('username', $('#username').val())
            formData.append('password', $('#password').val())

            $.ajax({
                url: '<?= site_url($site_url . '/add') ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#save_add').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(res) {
                    if (res.code == 200) {
                        Swal.fire({
                            title: "Berhasil",
                            text: res.message,
                            icon: "success",
                            button: "OK",
                        })

                        $('#modalAdd').modal('hide');
                        $('#datatables-ajax').DataTable().draw();
                        $('#save_add').html('Save changes')
                        $('#id_role').val('')
                        $('#email').val('')
                        $('#phone').val('')
                        $('#username').val('')
                        $('#password').val('')
                    }
                },
                error: function(err) {
                    $('#save_add').html('Save changes')
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                }
            });
        });

        $('#save_edit').click(function() {
            let formData = new FormData();
            formData.append('foto_user', $('#foto_user_edit').prop('files')[0] == undefined ? 'kosong' : $('#foto_user_edit').prop('files')[0])
            formData.append('id_user', $('#id_users').val())
            formData.append('id_role', $('#id_role_edit').val())
            formData.append('fullname', $('#fullname_edit').val())
            formData.append('phone', $('#phone_edit').val())
            formData.append('jenis_kelamin', $('#jenis_kelamin_edit').val())
            formData.append('username', $('#username_edit').val())
            formData.append('status', $('#status_edit').val())

            $.ajax({
                url: '<?= site_url($site_url . '/update') ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#save_edit').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(res) {
                    if (res.code == 200) {
                        Swal.fire({
                            title: "Berhasil",
                            text: res.message,
                            icon: "success",
                            button: "OK",
                        })

                        $('#modalEdit').modal('hide');
                        $('#datatables-ajax').DataTable().draw();
                        $('#save_edit').html('Save changes')
                    }
                },
                error: function(err) {
                    $('#save_edit').html('Save changes')
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                }
            })
        })

    })
</script>