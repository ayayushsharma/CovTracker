<?php
header("Content-type: text/css");

$connection = new mysqli("localhost", "admin", "1234", "grid");     //Connecting mysql databases to php
if ($connection->connect_error) die($connection->connect_error);

$result = $connection->query("SELECT * FROM input");                // holding the table first in $result

if (!$result) die($connection->error);

$result->data_seek(0);
$lat = $result->fetch_assoc()['lat'];
$result->data_seek(0);
$lon = $result->fetch_assoc()['lon'];

?>
table { margin:1em auto; border-collapse:collapse; background: url("http://open.mapquestapi.com/staticmap/v4/getmap?key=cXD2AafOWR9Hie9cxoJnIJ2N8b3b8mgz&size=720,720&zoom=12&center=<?= $lat ?>,<?= $lon ?>"); }
td {
width:69px; height:69px;
border:1px solid #ccc;
text-align:center;
font-family:sans-serif; font-size:13px;
opacity: 0.40;
}
#danger {
width:69px; height:69px;
background-color:red;
text-align:center;
font-weight:bold; color:orange;
opacity: 0.5;
}

p { width: 500px;
margin-top: 30px;
margin-left: auto;
margin-right: auto;
text-align: center;
color: #000000;
background-color: #ffffff;
border-bottom: 8px solid #bfd414;}