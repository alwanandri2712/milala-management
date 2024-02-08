<div class="row row-xs">
    <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card shadow-ppq">
            <!-- Card header -->
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <h1><?= $tittle ?> <?= $tittle_2 ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="" class="font-weight-bold">Description</label>
                        <textarea class="form-control" id="description_tentang_kami" cols="30" rows="10"> <?= $data_tentang_kami ?> </textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">&nbsp;</label>
                        <button class="btn btn-primary btn-block" id="save">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function() {
        
        $('#save').click(function() {
            let formData = new FormData();
            const description_tentang_kami = tinymce.get('description_tentang_kami').getContent();

            formData.append('description_tentang_kami', description_tentang_kami);

            $.ajax({
                url: '<?= site_url($site_url . '/update_tentang_kami') ?>',
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

    });
</script>