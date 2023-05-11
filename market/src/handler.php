<?php
require_once('/var/www/html/marketPlace_notes/crestapp/src/crest.php');

$domain = $_REQUEST['DOMAIN'];
$result = CRest::call(
    'profile', [],
    $_REQUEST['DOMAIN']
);
//CRest::writeToLog($result, 'result');
?>
