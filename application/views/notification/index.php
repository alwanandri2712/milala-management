<div class="row">
    <div class="col-md-12">
        <button class="float-right btn btn-sm btn-primary" id="mark_as_read">Mark as read All</button>
    </div>
    <div class="col-md-12 mt-4">
        <div class="media-body">
            <div class="timeline-group tx-13">
                <div id="list-data">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="text-center mg-t-20">
            <button class="btn btn-lg btn-primary" id="loadMore">Muat Lebih Banyak</button>
        </div>
    </div>

</div>


<script>
    function loadMore(limit) {
        $.ajax({
            type: "GET",
            url: "<?= site_url($site_url . '/list') ?>",
            data: {
                limit: limit,
            },
            dataType: "JSON",
            beforeSend: function() {
                $('#loadMore').html('<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>')
            },
            success: function(res) {
                let data = res.data
                let html = ''

                data.forEach(data => {

                    if (data.url != null) {

                        html += `
                        <div class="timeline-item">
                            <div class="timeline-time">${data.created_date}</div>
                            <div class="timeline-body">
                                <h6 class="mg-b-0">${data.title}</h6>
                                <p class="mt-3">${data.message} </p>
                                <nav class="nav nav-row mg-t-15">
                                    <a href="<?= base_url() ?>${data.url}" class="nav-link active"> Lihat Lebih Detail <i class="fa fa-angle-double-right"></i></a>
                                </nav>
                            </div>
                        </div>
                        `
                    } else {
                        html += `
                        <div class="timeline-item">
                            <div class="timeline-time">${data.created_date}</div>
                            <div class="timeline-body">
                                <h6 class="mg-b-0">${data.title}</h6>
                                <p class="mt-3">${data.message} </p>
                            </div>
                        </div>
                        `
                    }

                });

                $('#list-data').html(html);

                $('#loadMore').html('Muat Lebih Banyak')
            }
        });
    }

    $(document).ready(function() {
        let limit = 10
        loadMore(limit);

        $('#loadMore').click(function() {
            limit += 10
            loadMore(limit);
        })

        $('#mark_as_read').click(function() {
            $.ajax({
                type: "POST",
                url: "<?= site_url($site_url . '/mark_as_read_all') ?>",
                beforeSend: function() {
                    $('#mark_as_read').html('<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span>')
                },
                success: function(res) {
                    if (res.code == 200) {
                        Swal.fire({
                            title: "Berhasil",
                            text: res.message,
                            icon: "success",
                            button: "OK",
                        }).then(function() {
                            location.reload();
                        });
                    }
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Something went wrong!',
                    })
                }
            });
        })

    });
</script>