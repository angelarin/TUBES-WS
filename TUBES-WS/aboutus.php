<?php
require_once realpath(__DIR__.'')."/vendor/autoload.php";
require_once __DIR__."/html_tag_helpers.php";
$uri_rdf = 'http://localhost/tubes ws/biodata.rdf';
$data = \EasyRdf\Graph::newAndLoad($uri_rdf);
$doc = $data->primaryTopic();
?>
Nama Depan : <?= $doc->get('foaf:givenName') ?> <br>
Nama Belakang : <?= $doc->get('foaf:familyName') ?> <br>
<?php
foreach ($doc->all('foaf:account') as $akun) { 
echo $akun->get('foaf:page');
echo '<br>';
}
?>