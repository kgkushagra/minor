<?php include('config/db_connect.php');
include('templates/header.php');
if (isset($_POST['order'])) {
    $text = $_POST['title_to_order'];
    $img = "<img alt='testing' src='barcode.php?size=39&text=" . $text . "&print=true'/>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Handling Geolocation Errors</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        // Set up global variable
        var result;

        function showPosition() {
            // Store the element where the page displays the result
            result = document.getElementById("result");

            // If geolocation is available, try to get the visitor's position
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
                result.innerHTML = "Getting the position information...";
            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
        };

        // Define callback function for successful attempt
        function successCallback(position) {
            result.innerHTML = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
        }

        // Define callback function for failed attempt
        function errorCallback(error) {
            if (error.code == 1) {
                result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
            } else if (error.code == 2) {
                result.innerHTML = "The network is down or the positioning service can't be reached.";
            } else if (error.code == 3) {
                result.innerHTML = "The attempt timed out before it could get the location data.";
            } else {
                result.innerHTML = "Geolocation failed due to unknown error.";
            }
        }

        //var BingMapsKey='Anqx738AcOvOEu8OAz7xM6XYW53n7cbS4lCyUPTqvGlTCF2m_QTYtAZlqF3WFgcg';

        function loadMapScenario() {
            var map = new Microsoft.Maps.Map(document.getElementById('myMap'), {});
            Microsoft.Maps.loadModule('Microsoft.Maps.Search', function() {
                var searchManager = new Microsoft.Maps.Search.SearchManager(map);
                var reverseGeocodeRequestOptions = {
                    location: new Microsoft.Maps.Location(position.coords.latitude, position.coords.longitude),
                    callback: function(answer, userData) {
                        map.setView({
                            bounds: answer.bestView
                        });
                        map.entities.push(new Microsoft.Maps.Pushpin(reverseGeocodeRequestOptions.location));
                        document.getElementById('printoutPanel').innerHTML =
                            answer.address.formattedAddress;
                    }
                };
                searchManager.reverseGeocode(reverseGeocodeRequestOptions);
            });

        }
    </script>
    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=Anqx738AcOvOEu8OAz7xM6XYW53n7cbS4lCyUPTqvGlTCF2m_QTYtAZlqF3WFgcg&callback=loadMapScenario' async defer></script>
    <script type="text/javascript" src="//js.maxmind.com/js/apis/geoip2/v2.1/geoip2.js"></script>

    <script type="text/javascript">
        var onSuccess = function(location) {
            console.log(
                "Lookup successful:\n\n" +
                JSON.stringify(location, undefined, 4)
            );
            console.log(location);

            const city = document.getElementById('city');

            city.setAttribute("value", location.city.names.en);
            const region = document.getElementById('region');



            var htmlText = location.subdivisions.map(function(o) {
                return `${o.names.en} `;
            });
            region.setAttribute("value", htmlText);



            const postalcode = document.getElementById('postal-code');

            postalcode.setAttribute("value", location.postal.code);
            const country = document.getElementById('country');

            country.setAttribute("value", location.country.names.en);
        };


        var onError = function(error) {
            alert(
                "Error:\n\n" +
                JSON(error, undefined, 4)
            );
        };

        geoip2.city(onSuccess, onError);
    </script>

</head>

<body style='display:grid; grid-row-gap: 6px; '>
    <div style="position:relative;left:35vw;">
        <?php echo $img; ?>

    </div>
    <div id='myMap' style='width: 50vw; height: 50vh; justify-self: center; '></div>

    <!-- <button type="button" onclick="showPosition();">Show Position</button> -->
    <div class="container" style='justify-self: center;'>
        <div class="row">
            <form class="form-horizontal" style="position:relative; left:150px;">
                <fieldset>
                    <!-- Address form -->

                    <h2>Address</h2>

                    <!-- full-name input-->
                    <div class="control-group">
                        <label class="control-label">Full Name</label>
                        <div class="controls">
                            <input id="full-name" name="full-name" type="text" placeholder="full name" class="input-xlarge" value="<?php echo $_SESSION['username']; ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <!-- address-line1 input-->
                    <div class="control-group">
                        <label class="control-label">Address Line 1</label>
                        <div class="controls">
                            <input id="address-line1" name="address-line1" type="text" placeholder="address line 1" class="input-xlarge">
                            <p class="help-block">Street address, P.O. box, company name, c/o</p>
                        </div>
                    </div>
                    <!-- address-line2 input-->
                    <div class="control-group">
                        <label class="control-label">Address Line 2</label>
                        <div class="controls">
                            <input id="address-line2" name="address-line2" type="text" placeholder="address line 2" class="input-xlarge">
                            <p class="help-block">Apartment, suite , unit, building, floor, etc.</p>
                        </div>
                    </div>
                    <!-- city input-->
                    <div class="control-group">
                        <label class="control-label">City / Town</label>
                        <div class="controls">
                            <input id="city" name="city" type="text" placeholder="city" class="input-xlarge">
                            <p class="help-block" value=""></p>
                        </div>
                    </div>
                    <!-- region input-->
                    <div class="control-group">
                        <label class="control-label">State / Province / Region</label>
                        <div class="controls">
                            <input id="region" name="region" type="text" placeholder="state / province / region" class="" value="" style="width:400px;">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <!-- postal-code input-->
                    <div class="control-group">
                        <label class="control-label">Zip / Postal Code</label>
                        <div class="controls">
                            <input id="postal-code" name="postal-code" type="text" placeholder="zip or postal code" class="input-xlarge" value="">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <!-- country select -->
                    <div class="control-group">
                        <label class="control-label">Country</label>
                        <div class="controls">
                            <input id="country" name="country" class="input-xlarge" value="">
                            <img src="" alt="">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>