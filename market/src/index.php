<?php
require_once(__DIR__ . '/crest.php');

$result = CRest::call('profile', $_REQUEST['DOMAIN']);

echo '<pre>';
	print_r($result);
echo '</pre>';
