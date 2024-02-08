<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <!-- <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <button type="button" class="btn btn-primary float-right" ><i class="fas fa-plus"></i> <?= $tittle_2 ?> Baru</button>
            </div> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dashboard mg-b-0" id="datatables">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Gambar</th>
                                <th>Nama Perusahaan</th>
                                <th>Status</th>
                                <th>Berkas</th>
                                <th>Dibuat Oleh</th>
                                <th>dibuat tanggal</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit Role -->
<div class="modal fade" id="modalEditMitra" tabindex="-1" role="dialog" aria-labelledby="modalEditMitra" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-mitra">View <?= $tittle_2 ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label for="">Logo Perusahaan</label><br><br>
                        <img src="" height="100" width="100" class="rounded-circle" id="logo_perusahaan" alt="Logo">
                        <!-- <input type="file" class="form-control mt-2" id="logo_perusahaan" accept="image/*"> -->
                    </div>
                    <div class="col-md-12 mt-4">
                        <label for=""> Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan"  placeholder="Nama Perusahaan">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Deskripsi Perusahaan</label>
                        <textarea class="form-control" id="description_perusahaan" cols="10" rows="5"></textarea>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> No Telephone</label>
                        <input type="number" class="form-control" id="no_telephone"  placeholder="No Telephone">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Alamat Email </label>
                        <input type="text" class="form-control" id="email" placeholder="Alamat Email">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Alamat Website </label>
                        <input type="text" class="form-control" id="website"  placeholder="Alamat Website">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Bidang Industri </label>
                        <input type="text" class="form-control" id="bidang_industri"  placeholder="Contoh : Teknologi Informasi">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Kepemilikan Perusahaan </label>
                        <select name="" class="form-control" id="kepemilikan_perusahaan">
                            <option value=""> == Pilih ==</option>
                            <option value="negara">Negara</option>
                            <option value="swasta" >Swasta</option>
                            <option value="koperasi" >Koperasi</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for=""> Skala Perusahaan </label>
                        <select name="" class="form-control" id="skala_perusahaan">
                            <option value=""> == Pilih ==</option>
                            <option value="mikro">Mikro</option>
                            <option value="kecil">Kecil</option>
                            <option value="menengah">Menengah</option>
                            <option value="besar">Besar</option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for=""> Negara </label>
                        <select name="" class="form-control" id="country">
                            <option value="indonesia"> Indonesia
                            <option>
                        </select>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for=""> Provinsi </label>
                        <input type="text" class="form-control" id="provinsi"  placeholder="Masukkan Provinsi">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for=""> Kabupaten </label>
                        <input type="text" class="form-control" id="kabupaten"  placeholder="Masukkan Kabupaten">

                    </div>

                    <div class="col-md-12 mt-2">
                        <label for=""> Alamat Perusahaan</label>
                        <textarea class="form-control" id="alamat_perusahaan" cols="10" rows="5"> </textarea>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <input type="hidden" id="id_company">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_edit"><i data-feather="save"></i> Simpan</button>
            </div> -->
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
                // $("#id_company").val(response.data[0].id)
                $('#logo_perusahaan').attr("src", '<?= base_url() ?>' + 'upload/company/logo/' + response.data[0].images)
                $("#nama_perusahaan").val(response.data[0].company_name)
                $("#description_perusahaan").val(response.data[0].deskripsi_perusahaan)
                $('#no_telephone').val(response.data[0].phone)
                $("#email").val(response.data[0].email)
                $('#website').val(response.data[0].website)
                $('#bidang_industri').val(response.data[0].bidang_industri)
                $('#kepemilikan_perusahaan').val(response.data[0].kepemilikan_perusahaan)
                $('#skala_perusahaan').val(response.data[0].skala_perusahaan)
                $('#provinsi').val(response.data[0].province)
                $('#kabupaten').val(response.data[0].bidang_industri)
                $('#alamat_perusahaan').val(response.data[0].address)
                
                $('#modalEditMitra').modal('show');
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: err.responseJSON.message,
                })
            }
        })
    }

    function verifikasi(id, user_id) {
        Swal.fire({
                title             : 'Apakah kamu yakin Verifikasi mitra ini ?',
                icon              : 'warning',
                showCancelButton  : true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor : '#d33',
                confirmButtonText : 'Yes, Verifikasi !'
            })
            .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        url: "<?= site_url($site_url . '/verifikasi') ?>",
                        type: 'POST',
                        data: {
                            id: id,
                            user_id: user_id
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
            responsive : true
        });

        /* Proses Save category */
        $('#save').click(function() {
            let formData = new FormData();
            formData.append('logo_mitra', $('#logo_mitra').prop('files')[0]);
            formData.append('mitra_name', $('#mitra_name').val());
            formData.append('status', $('#status_add').val());

            $.ajax({
                url: '<?= site_url($site_url . '/add') ?>',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $("#save").prop('disabled', true);
                    $('#save').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(result) {
                    if (result.code == 200) {
                        Swal.fire({
                            title: "Success",
                            text: result.message,
                            icon: "success",
                            button: "OK",
                        });
                        $("#save").prop('disabled', false);
                        $('#save').html('<i data-feather="save"></i> Save');
                        $('#modalAddMitra').modal('hide');
                        $('#datatables').DataTable().draw();
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                    $("#save").prop('disabled', false);
                    $('#save').html('<i data-feather="save"></i> Save');
                }
            });
        });

        // Update
        $('#save_edit').click(function() {
            let formData = new FormData();
            formData.append('id', $('#id_mitra').val());
            formData.append('logo_mitra', $('#logo_mitra_edit').prop('files')[0] == undefined ? 'kosong' : $('#logo_mitra_edit').prop('files')[0]);
            formData.append('mitra_name', $('#mitra_name_edit').val());
            formData.append('status', $('#update_status_edit').val());

            $.ajax({
                url: '<?= site_url($site_url . '/edit') ?>',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $("#save_edit").prop('disabled', true);
                    $('#save_edit').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(result) {
                    if (result.code == 200) {
                        Swal.fire({
                            title: "Success",
                            text: result.message,
                            icon: "success",
                            button: "OK",
                        });
                        $("#save_edit").prop('disabled', false);
                        $('#save_edit').html('<i data-feather="save"></i> Save');
                        $('#modalEditMitra').modal('hide');
                        $('#datatables').DataTable().draw();
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })
                    $("#save_edit").prop('disabled', false);
                    $('#save_edit').html('<i data-feather="save"></i> Save');
                }
            });
        });

    });
</script>