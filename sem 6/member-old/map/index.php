<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Google Maps JavaScript API</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="p.php" method="post">
<label for="">Address: <input id="map-search" class="controls" name="address" type="text" placeholder="Search Box" size="104"></label><br>
<label for="">Lat: <input type="text" id="latitude" class="latitude" name="lat"></label>
<label for="">Long: <input type="text" id="longitude" class="longitude" name="lng"></label>
<label for="">City <input type="text" id="reg-input-city" class="reg-input-city" name="city" placeholder="City"></label>
        <br>
<input type="submit" name="sbt" value="submit">
        <br>
        </form>    

    <br>
<div id="map-canvas"></div>

<script src="javascript.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDE5FltkyvmP3bBcv4iQN555pjA5lL6KyM&libraries=places&callback=initialize"></script>
        
</body>
</html>
