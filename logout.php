

<?php
require 'clases/AutoCarga.php';

$sesion = new Session();
$sesion->destroy();
$sesion->sendRedirect("sas.html");

