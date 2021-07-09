<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="/mapon-project/assets/plugins/datapicker/datepicker3.css">
    <link rel="stylesheet" href="/mapon-project/assets/plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/mapon-project/assets/plugins/select2/select2.min.css">

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img src="/mapon-project/assets/img/logo.svg" width="100" alt="">
            </a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false"><?= $email ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/mapon-project/main/logout">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>

<div class="container">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="row">
        <div class="col-md-8">
            <div id="map" style="width: 100%; height: 400px; background-color: #c8c8c8">
            </div>
            <h4>Date range you are looking at:</h4>
            <p><?= $dateFrom ?> - <?= $dateTo ?></p>
        </div>
        <div class="col-md-4">
            <h4>Date Range</h4>
            <hr>
            <form action="<?= FOLDER_PATH . '/main/getDataByRange' ?>" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="date-from">From</label>
                    <input id="date-from" name="date-from" type="text" class="form-control" placeholder="Select Start Date" required>
                </div>
                <div class="form-group">
                    <label for="date-to">To</label>
                    <input id="date-to" name="date-to" type="text" class="form-control" placeholder="Select End Date" required>
                </div>
                <div class="form-group">
                    <?php !empty($error_message) ? print($error_message) : '' ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" onclick="">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<!-- MomentJS  -->
<script src="/mapon-project/assets/js/moment.js"></script>

<script type="application/javascript"
        src="/mapon-project/assets/plugins/datapicker/bootstrap-datepicker.js"></script>
<script type="application/javascript"
        src="/mapon-project/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script type="application/javascript"
        src="/mapon-project/assets/plugins/select2/select2.full.min.js"></script>



<script type="application/javascript">

    $("#date-from").datepicker({
        autoclose: true,
        language:'es'
    });

    $("#date-to").datepicker({
        autoclose: true,
        daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]
    }).on('changeDate', function(e) {
        dateTo = e.date;
        dateFrom = $("#date-from").val();
        diff = moment(dateTo).diff(dateFrom, 'days');

        if(!(diff <= 30) )
        {
            alert("Maximum range must be 30 days");
            $("#date-to").val('');
            $("#date-from").val('');
        }

        if(!(diff > 0))
        {
            alert("The start date must be less than the end date");
            $("#date-from").val('');
            $("#date-to").val('');
        }

    });

    function initMap() {

        const unitsData = <?= $unitsData ?>;
        const unitsRoutesData = <?= $unitsRoutesData ?>;

        console.log(unitsData);
        console.log(unitsRoutesData);

        const stopImage = window.location.origin + '/mapon-project/assets/img/beachflag.png';
        const truckImage = window.location.origin + '/mapon-project/assets/img/truck.png';

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6,
            center: {lat: unitsData.data.units[0].lat, lng: unitsData.data.units[0].lng}
        });

        for (var i = 0; i < unitsData.data.units.length; i++) {
            const location = {lat: unitsData.data.units[i].lat, lng: unitsData.data.units[i].lng};
            const marker = new google.maps.Marker({
                position: location,
                map: map,
                title: 'Unit | ' + unitsData.data.units[i].type + ' - ' + unitsData.data.units[i].label + ' - ' + unitsData.data.units[i].number,
                icon: {
                    url: truckImage,

                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(18, 18),
                    scaledSize: new google.maps.Size(50, 27)
                }
            });

            const infoWindow = new google.maps.InfoWindow();
            marker.addListener("click", function () {
                infoWindow.close();
                infoWindow.setContent('<div id="content">' +
                    '<h3>Unit</h3>' +
                    '<div id="bodyContent">' +
                    "<p><b>Type: </b>" + unitsData.data.units[i].type + "</p>" +
                    '<p><b>Label:</b> ' + unitsData.data.units[i].label +
                    "</p>" +
                    '<p><b>Number:</b> ' + unitsData.data.units[i].number +
                    "</p>" +
                    "</div>" +
                    "</div>");
                infoWindow.open(marker.getMap(), marker);
            });
        }


        for (var j = 0; j < unitsRoutesData.data.units.length; j++) {
            for (var k = 0; k < unitsRoutesData.data.units[j].routes.length; k++) {
                const location = {
                    lat: unitsRoutesData.data.units[j].routes[k].start.lat,
                    lng: unitsRoutesData.data.units[j].routes[k].start.lng
                };

                const routeEndTime = unitsRoutesData.data.units[j].routes[k].end.time;
                const routeStartTime = unitsRoutesData.data.units[j].routes[k].start.time;
                const timeStop = moment(routeEndTime).diff(routeStartTime, 'minute');
                const date = moment(routeStartTime).format('DD-MM-yyyy');
                const infoWindow = new google.maps.InfoWindow();


                if (unitsRoutesData.data.units[j].routes[k].type == 'route') {
                    const decodeRoute = unitsRoutesData.data.units[j].routes[k].decoded_route.points;

                    const flightPath = new google.maps.Polyline({
                        path: decodeRoute,
                        geodesic: true,
                        strokeColor: "#FF0000",
                        strokeOpacity: 1.0,
                        strokeWeight: 2
                    });
                    flightPath.setMap(map);

                }

                if (unitsRoutesData.data.units[j].routes[k].type == 'stop') {

                    const marker = new google.maps.Marker({
                        position: location,
                        map: map,
                        title: unitsRoutesData.data.units[j].routes[k].type,
                        icon: unitsRoutesData.data.units[j].routes[k].type == 'stop' ? stopImage : ''
                    });

                    var address = unitsRoutesData.data.units[j].routes[k].start.address;
                    marker.addListener("click", function () {
                        infoWindow.close();
                        infoWindow.setContent(
                            '<div id="content">' +
                            '<h3>Stop</h3>' +
                            '<div id="bodyContent">' +
                            '<p><b>Address: </b> ' + address +
                            "</p>" +
                            '<p><b>Time: </b> ' + timeStop + ' minutes' +
                            '<p><b>Date: </b> ' + date +
                            "</p>" +
                            "</div>" +
                            "</div>");
                        infoWindow.open(marker.getMap(), marker);
                    });
                }
            }
        }
    }




</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgsrMOtd2CqJb4-TxQY11klK1s-GSPr7M&callback=initMap"
        type="text/javascript"></script>
</body>
</html>