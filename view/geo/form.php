<!-- expand the page to make it look better -->
<div style="height:5vh;"></div>

<h1>Geo IP tool</h1>

<p>
    Get Geo data about an IP address. This will give you the location, coordinates and domain of the ip<br>
    IP-GEO-CT is compatible with both IPv4 and IPv6.
</p>

<form method="GET" id="geoform">
    <label for="ip">IP Address: </label>
    <input id="ipinput" type="text" name="ip" value="<?= $default_ip ?>">
    <input id="sendip" type="submit" name="check" value="Get IP Geo Data!" onSubmit="">
</form>

<!-- expand the page to make it look better -->
<div style="height:20vh;"></div>

<script src="js/geoip-submit.js" charset="utf-8"></script>
