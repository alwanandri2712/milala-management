<style>
    #picture__input {
        display: none;
    }

    .picture {
        width: 100%;
        height: 300px;
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

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('news') ?>" class="btn btn-primary float-left"><i data-feather="arrow-left"></i> Back</a></a>
            <h3 class="card-title float-right">Tambah Berita</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <label class="picture" for="picture__input" tabIndex="0">
                                    <span class="picture__image"></span>
                                </label>
                                <input type="file" name="picture__input" id="picture__input" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="">Judul Berita</label>
                    <input type="text" class="form-control" id="news_title" placeholder="Masukkan Judul">
                </div>
                <div class="col-md-12">
                    <label for="">Kategori Berita</label>
                    <select name="" class="form-control" id="news_category">
                        <option value="" selected disabled>== Pilih Kategori ==</option>
                        <?php foreach ($kategori_berita as $kb) : ?>
                            <option value="<?= $kb->id ?>"> <?= $kb->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="">News Content</label>
                    <textarea name="content_news" id="content_news" cols="30" rows="10"></textarea>
                </div>
                <div class="col-md-12">
                    <label for="">&nbsp;</label>
                    <button class="btn btn-primary btn-block" id="submit_news"> <i data-feather="save"></i> Submit </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    
    const inputFile = document.querySelector("#picture__input");
    const pictureImage = document.querySelector(".picture__image");
    const pictureImageTxt = "Choose an image";
    pictureImage.innerHTML = pictureImageTxt;

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

    $(document).ready(function() {

        $('#submit_news').on('click', function() {
            let formData = new FormData();
            const editorContent = tinymce.activeEditor.getContent({ format: 'html' });

            formData.append('news_image', $('#picture__input').prop('files')[0]);
            formData.append('news_title', $('#news_title').val());
            formData.append('news_category', $('#news_category').val());
            formData.append('content_news', editorContent);

            $.ajax({
                type: 'POST',
                url: '<?= base_url('news/add') ?>',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $("#submit_news").prop('disabled', true);
                    $('#submit_news').html('<i class="fa fa-spin fa-spinner"></i> Loading...')
                },
                success: function(result) {
                    if (result.code == 200) {
                        Swal.fire({
                            title: "Success",
                            text: result.message,
                            icon: "success",
                            button: "OK",
                        })

                        $("#submit_news").prop('disabled', false);
                        $('#submit_news').html('<i data-feather="save"></i> Submit');

                        setTimeout(function() {
                            window.location.href = '<?= base_url('news') ?>';
                        },1000);
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: err.responseJSON.message,
                    })

                    $("#submit_news").prop('disabled', false);
                    $('#submit_news').html('<i data-feather="save"></i> Submit');
                }   

            })
        })
    })
</script>