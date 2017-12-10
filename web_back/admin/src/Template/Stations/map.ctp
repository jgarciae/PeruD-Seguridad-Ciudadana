<div id="map" style="height: 500px; width: 950px;">
        
    </div>

 <script src="https://maps.google.com/maps/api/js?key=AIzaSyCILxmzsVKpgprW3wmiVyBk3-ylNy2g8Vc"></script>
 <script>
  // In the following example, markers appear when the user clicks on the map.
  // Each marker is labeled with a single alphabetical character.
  var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  var labelIndex = 0;

  var checkpoints = [];
  var sets = [
  	{"name":"HURTO DE VEHICULO", "color":"E74C3C"},
  	{"name":"ROBO AGRAVADO", "color":"8E44AD"},
  	{"name":"ROBO DE CELULAR", "color":"3498DB"},
  	{"name":"VIOLACION SEXUAL", "color":"16A085"},
  	{"name":"SECUESTRO", "color":"F1C40F"},
  	{"name":"VIOLENCIA FAMILIAR", "color":"7F8C8D"}
  ];

  var setNumber ={
  	"HURTO DE VEHICULO": 0,
  	"ROBO AGRAVADO": 1,
  	"ROBO DE CELULAR": 2,
  	"VIOLACION SEXUAL": 3,
  	"SECUESTRO": 4,
  	"VIOLENCIA FAMILIAR": 5
  };

  function initialize() {
    //alert("initialize");
    //var bangalore = { lat: -18.476185, lng: -70.320821 };
    var map;
    console.log(checkpoints);
    for (var i = 0; i < checkpoints.length; i++) {
        if(i==0){
            map = new google.maps.Map(document.getElementById('map'), {
              zoom: 16,
              center: checkpoints[i].location
            });
        }
        addMarker(checkpoints[i], map);
    }

    checkpoints = [];
    labelIndex = 0;

  }

  // Adds a marker to the map.
  function addMarker(checkpoint, map) {
    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.
    var color = sets[checkpoint.number].color;
    var marker = new google.maps.Marker({
      position: checkpoint.location,
      label: ""+checkpoint.label,
      title: checkpoint.title,
      icon: new google.maps.MarkerImage("http://www.googlemapsmarkers.com/v1/"+color+"/"),
      map: map
    });
  }

  //google.maps.event.addDomListener(window, 'load', initialize);
  //google.maps.event.addDomListener(document.getElementById('checkpoints-id'), 'click', initialize);
</script>


<script type="text/javascript">

$(document).ready(function() {
	var $url = "http://samiadmin.airefon.online/api/rest_reports/get_ratio_reports.json";
	//$url = "http://192.168.9.102/pd/web_back/admin/api/rest_reports/get_ratio_reports.json";

	var params = {"lat": "-16.391665", "lng": "-71.532138", "meters": 300, "last": 7};

	var settings = {
	  "url": $url,
	  "method": "POST",
	  "data": params
	}

	$.ajax(settings).done(function (response) {
	  //console.log(response.reports);
	  $.each(response.reports, function (i, item) {
	  	console.log(item);
	  	var pos = item.location.coordinates;
	  	checkpoints.push({location: {lat: parseFloat(pos[0]), lng: parseFloat(pos[1])}, label: item.intensity, title: item.modality, number: setNumber[item.modality]});
	  });
	  initialize();
	});

});

</script>



