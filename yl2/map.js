var map;
var marker;

function infoCallback(infowindow, marker) {
    return function() { infowindow.open(map, marker); };
}


function initMap() {
    var start = {
        lat: 58.247537,
        lng: 22.479283
    };

    map = new google.maps.Map(document.getElementById('map'), {

        center: start,
        zoom: 7
    });



    map.addListener('click', function(event) {

        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        var newPlace = {lat: lat, lng: lng};

        if (marker && marker.setMap) {
            marker.setMap(null);
        }
        
        marker = new google.maps.Marker({
            position: newPlace,
            map: map,
        });

        var form = '\
            <form action="submit.php" method="post">\
            <input type="text" name="lat" id="lat" value="'+lat+'" required hidden>\
            <input type="text" name="lng" id="lng" value="'+lng+'" required hidden>\
            <input type="text" name="title" id="title" placeholder="Markeri nimi" required>\
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Asukoha kirjeldus" required></textarea>\
            <input type="submit" value="Salvesta">\
            </form>\
            '

        // First infowindow
        var infowindow = new google.maps.InfoWindow({

            content: form
        });
        google.maps.event.addListener(marker, 'click', infoCallback(infowindow, marker));

        // Attach it to the marker we've just added
        
        document.getElementById("lat").value = lat;
        document.getElementById("lng").value = lng;

    });



    fetch('json.php')
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            /* console.log(data) */
            for (k in data) {
                /* console.log(data[k]); */
                var place = data[k];
                var lat = parseFloat(place.lat);
                var lng = parseFloat(place.lng);
                var title = place.name
                var position = {lat: lat, lng: lng};
                /* var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'; */
/*                 console.log(newMarker); */


                var infoHTML = "<div class=infowindow><h1>"+ title +"</h1><p>"+ place.description +"</p></div>"

                var genMarker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: title,
                })

                   // First infowindow
                var infowindow = new google.maps.InfoWindow({

                    content: infoHTML
                });

                // Attach it to the marker we've just added
                google.maps.event.addListener(genMarker, 'click', infoCallback(infowindow, genMarker));

            }
        })
    }

function addMarker(place) {
    new google.maps.Marker({
        position: place,
        map: map,
    });

}

