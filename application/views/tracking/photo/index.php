<div class="row">
  <div class="col-lg-12 col-xl-12 mg-t-10">
    <div class="card bg-default">
      <div class="card-body">
        <input type="hidden" id="kordinat_lat_long">
        <div class="row justify-content-md-center">
          <div class="col-md-auto">
            <button type="button" id="switchFrontBtn" class="btn btn-xl btn-primary">
              <span style="font-size: 15px;">Front Cam</span>
            </button>
          </div>
          <div class="col-md-auto">
            <button type="button" id="switchBackBtn" class="btn btn-xl btn-primary">
              <span style="font-size: 15px;">Back Cam</span>
            </button>
          </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
          <button type="button" id="snapBtn" class="btn btn-xl btn-block btn-warning">
            <span style="font-size: 15px;">Take Photo<span>
          </button>
        </div>
        <br />
        <div class="row">
          <div class="col-md-12 text-center" id="resultCam">
            <video id="cam" autoplay muted playsinline>Not available</video>
            <canvas id="canvas" style="display:none"></canvas>
            <img width="1" height="1" id="photo" alt="The screen capture will appear in this box.">
          </div>
          <div class="col-md-12">
            <input type="text" class="form-control" id="title" placeholder="Judul Tracker"><br />
            <input type="text" class="form-control" id="fullname" placeholder="Nama Penerima Tracker"><br />
            <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="Deskripsi"></textarea>
          </div>
        </div>
        <br />
        <div class="d-flex justify-content-center">
          <button type="button" id="submitPhoto" class="btn btn-xl btn-success">
            <span style="font-size: 15px;">Submit Photos !<span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(e) {
    $("#submitPhoto").click(function(e) {
      var data64IMG = $("#photo").attr("src");
      ajaxSubmitAbsen(data64IMG);
    })
  })

  // reference to the current media stream
  var mediaStream = null;
  // $("#photo").remove()
  // Prefer camera resolution nearest to 1280x720.
  var constraints = {
    audio: false,
    video: {
      width: {
        ideal: 400
      },
      height: {
        ideal: 400
      },
      facingMode: "environment"
    }
  };

  function ajaxSubmitAbsen(data64IMG) {
    var dataAbsen = {
      image: data64IMG,
      lat_long: $("#kordinat_lat_long").val(),
      title: $("#title").val(),
      fullname: $("#fullname").val(),
      description: $("#description").val()
    };

    $.ajax({
      url: '<?= base_url('rewards/addPhotos') ?>',
      method: "POST",
      data: dataAbsen,
      cache: true,
      async: true,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function() {
        $("#snapBtn").prop("disabled", true);
      },
      success: (result) => {

        if (result.code == 200) {
          Swal.fire({
            title: "Success",
            text: result.message,
            icon: "success",
            button: "OK",
          });
          $("#snapBtn").prop("disabled", false);
          $("#title").val("");
          $("#fullname").val("");
          $("#description").val("");
          $("#kordinat_lat_long").val("");
          $("#photo").attr("src", "");
          $("#resultCam").html('<video id="cam" autoplay muted playsinline>Not available</video>');
          $("#canvas").hide();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: result.message,
          })
          $("#snapBtn").prop("disabled", false);
        }

      },
      error: (xhr, status, error) => {
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: error.responseJSON.message,
        })
        $("#snapBtn").prop("disabled", false);
      }
    })
  }

  async function getMediaStream(constraints) {
    try {
      mediaStream = await navigator.mediaDevices.getUserMedia(constraints);
      let video = document.getElementById('cam');
      video.srcObject = mediaStream;
      video.onloadedmetadata = (event) => {
        video.play();
      };
    } catch (err) {
      console.error(err.message);
    }
  };

  async function switchCamera(cameraMode) {
    try {
      // stop the current video stream
      if (mediaStream != null && mediaStream.active) {
        var tracks = mediaStream.getVideoTracks();
        tracks.forEach(track => {
          track.stop();
        })
      }

      // set the video source to null
      document.getElementById('cam').srcObject = null;

      // change "facingMode"
      constraints.video.facingMode = cameraMode;

      // get new media stream
      await getMediaStream(constraints);
    } catch (err) {
      console.error(err.message);
      alert(err.message);
    }
  }

  function takePicture() {
    let canvas = document.getElementById('canvas');
    let video = document.getElementById('cam');
    let photo = document.getElementById('photo');
    let context = canvas.getContext('2d');

    const height = video.videoHeight;
    const width = video.videoWidth;

    if (width && height) {
      $("#canvas").remove()
      $("#cam").remove()
      $("#photo").attr('width', 400).attr('height', 400);
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);
      var data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);

      // Submit Absen
      // ajaxSubmitAbsen(data);

    } else {
      clearphoto();
    }
  }

  function clearPhoto() {
    let canvas = document.getElementById('canvas');
    let photo = document.getElementById('photo');
    let context = canvas.getContext('2d');

    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);
    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
  }

  document.getElementById('switchFrontBtn').onclick = (event) => {
    switchCamera("user");
  }

  document.getElementById('switchBackBtn').onclick = (event) => {
    switchCamera("environment");
  }

  document.getElementById('snapBtn').onclick = (event) => {
    takePicture();
    event.preventDefault();
  }

  clearPhoto();
</script>