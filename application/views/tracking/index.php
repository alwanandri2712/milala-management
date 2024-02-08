<div class="row row-xs">
  <div class="col-lg-12 col-xl-12 mg-t-10">
    <div class="card bg-default">
      <!-- <div id='loader-maps' style='display: none;'>
        <div style="position: absolute; top: 50%; left: 50%; z-index: 900; transform: translate(-50%, -50%);"><img src="assets/img/loader1.svg"></div>
      </div> -->
      <div id="maps-tracking" style="height:500px;"></div>
    </div>
  </div>
</div>

<script>
  window.onload = function() {
    initMap();
  };

  var InforObj = [];
  var sat_map_style = [{
      elementType: "geometry",
      stylers: [{
        color: "#242f3e"
      }]
    },
    {
      elementType: "labels.text.stroke",
      stylers: [{
        color: "#242f3e"
      }]
    },
    {
      elementType: "labels.text.fill",
      stylers: [{
        color: "#746855"
      }]
    },
    {
      featureType: "administrative.locality",
      elementType: "labels.text.fill",
      stylers: [{
        color: "#d59563"
      }],
    },
    {
      featureType: "poi",
      elementType: "labels.text.fill",
      stylers: [{
        color: "#d59563"
      }],
    },
    {
      featureType: "poi.park",
      elementType: "geometry",
      stylers: [{
        color: "#263c3f"
      }],
    },
    {
      featureType: "poi.park",
      elementType: "labels.text.fill",
      stylers: [{
        color: "#6b9a76"
      }],
    },
    {
      featureType: "road",
      elementType: "geometry",
      stylers: [{
        color: "#38414e"
      }],
    },
    {
      featureType: "road",
      elementType: "geometry.stroke",
      stylers: [{
        color: "#212a37"
      }],
    },
    {
      featureType: "road",
      elementType: "labels.text.fill",
      stylers: [{
        color: "#9ca5b3"
      }],
    },
    {
      featureType: "road.highway",
      elementType: "geometry",
      stylers: [{
        color: "#746855"
      }],
    },
    {
      featureType: "road.highway",
      elementType: "geometry.stroke",
      stylers: [{
        color: "#1f2835"
      }],
    },
    {
      featureType: "road.highway",
      elementType: "labels.text.fill",
      stylers: [{
        color: "#f3d19c"
      }],
    },
    {
      featureType: "transit",
      elementType: "geometry",
      stylers: [{
        color: "#2f3948"
      }],
    },
    {
      featureType: "transit.station",
      elementType: "labels.text.fill",
      stylers: [{
        color: "#d59563"
      }],
    },
    {
      featureType: "water",
      elementType: "geometry",
      stylers: [{
        color: "#17263c"
      }],
    },
    {
      featureType: "water",
      elementType: "labels.text.fill",
      stylers: [{
        color: "#515c6d"
      }],
    },
    {
      featureType: "water",
      elementType: "labels.text.stroke",
      stylers: [{
        color: "#17263c"
      }],
    },
  ];

  function addMarkerInfo() {
    var MarkerMaps = async () => {

      $.ajax({
        url: '<?= base_url('tracking/getMaps') ?>',
        method: "GET",
        beforeSend: () => {
          $("#loader-maps").show();
        },
        success: function(data) {

          var lat_long = [];
          for (var i = 0; i < data.length; i++) {

            lat_long.push(data[i].lat_long)
            // console.log(data[i])
            // console.log(data[i]);
            //   var contentString = '<p class="font-weight-bold text-black" id="btn-detail">Nama: ' + data[i].username ;
            var contentString = '<img style="width: 80px; height: 50px" src="' + data[i].image + '"></img><p class="font-weight-bold text-black" id="btn-detail">Title: ' + data[i].title +
              '</p>' + '<p class="text-black" id="btn-detail">Fullname:' + data[i].fullname + '<p class="text-black" id="btn-detail">Description:' + data[i].description + '<p class="font-weight-bold text-black"><a target="_blank" href="https://maps.google.com/maps?q=' + data[i].lat_long + '&hl=es;z=14&amp;">Klik Untuk Mengetahui Detail Posisi </a></p>' + '<button class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-lg" data-username="' + data[i].fullname.toUpperCase() + '" data-lat_long="' + data[i].lat_long + '"id="detail_info">Detail Info</button>';
            var icons = "https://i.ibb.co/1Qctzk1/map-marker.png"

            const marker = new google.maps.Marker({
              position: data[i].LatLng,
              icon: {
                url: icons,
              },
              map: map
            });
            const infowindow = new google.maps.InfoWindow({
              content: contentString,
              maxWidth: 250
            });

            marker.addListener('mouseover', function() {
              // map.setZoom(18);
              closeOtherInfo();
              map.setCenter(marker.getPosition());
              infowindow.open(marker.get('map'), marker);
              InforObj[0] = infowindow;
            });

            marker.addListener('click', function() {
              map.setZoom(15);
              closeOtherInfo();
              map.setCenter(marker.getPosition());
              infowindow.open(marker.get('map'), marker);
              InforObj[0] = infowindow;
            });
          }

        },
        error: function(err) {
          console.log(err);
        }
      })

    }
    MarkerMaps()
  }

  function closeOtherInfo() {
    if (InforObj.length > 0) {
      InforObj[0].set("marker", null);
      InforObj[0].close();
      InforObj.length = 0;
    }
  }

  function initMap() {
    var centerCords = {
      lat: -8.219233,
      lng: 114.369225
    };
    map = new google.maps.Map(document.getElementById('maps-tracking'), {
      center: centerCords,
      zoom: 10,
      styles: sat_map_style,
      streetViewControl: false,
      mapTypeControl: false,
      overviewMapControl: false,
      zoomControl: false,
      fullscreenControl: false,
      mapTypeId: 'roadmap'
    });
    addMarkerInfo();
  }
</script>