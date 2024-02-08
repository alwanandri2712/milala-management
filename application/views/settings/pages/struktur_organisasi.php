<style>
    #picture__input {
        display: none;
    }

    .picture {
        width: 100%;
        height: 400px;
        aspect-ratio: 16/9;
        background: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #aaa;
        border: 2px dashed currentcolor;
        cursor: pointer;
        font-family: sans-serif;
        transition: color 300ms ease-in-out, background 300ms ease-in-out;
        outline: none;
        overflow: hidden;
    }

    .picture:hover {
        color: #777;
        background: #ccc;
    }

    .picture:active {
        border-color: turquoise;
        color: turquoise;
        background: #eee;
    }

    .picture:focus {
        color: #777;
        background: #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .picture__img {
        max-width: 100%;
    }
</style>

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
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image">
                                            <img src="<?= base_url($data_struktur_organisasi) ?>" alt="" id="picture__image">
                                        </span>
                                    </label>
                                    <input type="file" name="picture__input" id="picture__input" accept="image/*">
                                </div>
                            </div>
                        </div>
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

<script>
    const inputFile = document.querySelector("#picture__input");
    const pictureImage = document.querySelector(".picture__image");
    // const pictureImageTxt = "Choose an image";
    // pictureImage.innerHTML = pictureImageTxt;

    inputFile.addEventListener("change", function(e) {
        const inputTarget = e.target;
        const file = inputTarget.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener("load", function(e) {
                const readerTarget = e.target;

                const img = document.createElement("img");
                img.src = readerTarget.result;
                img.classList.add("picture__img");

                pictureImage.innerHTML = "";
                pictureImage.appendChild(img);
            });

            reader.readAsDataURL(file);
        } else {
            pictureImage.innerHTML = pictureImageTxt;
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#save').click(function() {
            let formData = new FormData();
            formData.append('image_struktur_organisasi', $('#picture__input').prop('files')[0] == undefined ? 'kosong' : $('#picture__input').prop('files')[0]);

            $.ajax({
                url: '<?= site_url($site_url . '/update_struktur_organisasi') ?>',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    // $("#save").prop('disabled', true);
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