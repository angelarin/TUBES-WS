<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'tubespws';

    $koneksi = mysqli_connect($host, $username, $password, $database) or die ('Gagal Terhubung ke database! Terjadi Kesalahan');
?>

<?php
    require_once realpath(__DIR__.'')."/vendor/autoload.php";
    require_once __DIR__."/html_tag_helpers.php";

    $uri_rdf = 'http://localhost/TUBES-WS/biodata.rdf';
    $rdfdata = \EasyRdf\Graph::newAndLoad($uri_rdf);
    $doc = $rdfdata->primaryTopic();

    require_once "lib/EasyRdf.php";

    EasyRdf_Namespace::set('db', 'http://dbpedia.org/');
    EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
    EasyRdf_Namespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
    EasyRdf_Namespace::set('dbo', 'http://dbpedia.org/ontology/');
    EasyRdf_Namespace::set('dbp', 'http://dbpedia.org/property/');
    EasyRdf_Namespace::set('dbr', 'http://dbpedia.org/resource/');
    EasyRdf_Namespace::set('geo', 'http://www.opengis.net/ont/geosparql#');

    $sparql = new EasyRdf_Sparql_Client('http://dbpedia.org/sparql');
?>