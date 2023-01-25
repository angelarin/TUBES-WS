<?php 
include('bagian/head.php');
require_once "lib/EasyRdf.php";

EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
EasyRdf_Namespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
EasyRdf_Namespace::set('db', 'http://dbpedia.org/');
EasyRdf_Namespace::set('dbr', 'http://dbpedia.org/resource/');
EasyRdf_Namespace::set('dbp', 'http://dbpedia.org/property/');
EasyRdf_Namespace::set('dbo', 'http://dbpedia.org/ontology/');
EasyRdf_Namespace::set('owl', 'http://www.w3.org/2002/07/owl#');

$sparql = new EasyRdf_Sparql_Client('http://dbpedia.org/sparql');
$namaNovel = $_POST['namaNovel'];

$sparql_query = '
SELECT DISTINCT ?author ?name ?title ?bookname ?abstract ?country ?genre {
    ?bookname a dbo:Book.
    ?bookname dbp:name ?name;
    dbo:abstract ?abstract;
    dbp:country ?country;
    dbo:literaryGenre ?genre
    filter(lang(?abstract)="en")
    filter(lang(?name)="en")
    filter regex(?keyword, "'.str_replace(' ', '_', ucwords($namaNovel)).'","i").
  }
    ';

$result = $sparql->query($sparql_query);

foreach ($result as $row) {
    echo "<nav class='navbar navbar-expand-lg navbar-light fixed-top' id='mainNav'>
            <div class='container px-4 px-lg-5'>
                <a class='navbar-brand' href='pencarian.php'>Pencarian </a>
                <button class='navbar-toggler navbar-toggler-right' type='button' data-bs-toggle='collapse' data-bs-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
                    <i class='fas fa-bars'></i>
                </button>
                <div class='collapse navbar-collapse' id='navbarResponsive'>
                    <ul class='navbar-nav ms-auto'>
                    </ul>
                </div>
            </div>
        </nav>
        
        <header class='intro'>
            <div class='container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center'>
                <div class='d-flex justify-content-center'>
                    <div class='text-center'>
                        <h1 class='text-white-50 mx-auto my-0 text-uppercase'> Perpustakaan Novel </h1>
                        <h2 class='text-white mx-auto mt-2 mb-5'> KELOMPOK 8 WEB SEMANTIK </h2>
                    </div>
                </div>
            </div>
        </header>
        
        <section class='contacts' id='contact'>
            <div class='container px-4 px-lg-5'>
                <div class='row gx-4 gx-lg-5'>
                    <div class='col-md-10 col-lg-8 mx-auto text-center'>
                    </div>
                </div>
            </div>
        </section>
        <section class='sinopsis bg-light' id='sinopsis'>
            <div class='container px-4 px-lg-5'>
                <div class='row gx-0 mb-4 mb-lg-5 align-items-center'>
                    <div class='col-xl-8 col-lg-7'>
                    <div class='col-xl-4 col-lg-5'>
                        <div class='featured-text text-center text-lg-left'>
                        </div>
                    </div>
                </div>
                    
        <section id='bg-light' class='>
            <div class='container' data-aos='fade-up'>
                <div class='row gx-0'>
                    <div class='col-lg-6 d-flex flex-column justify-content-center' data-aos='fade-up' data-aos-delay='200'>
                        <div class='content rounded'>
                            <h3 class>". $result->name. "</h3>
                            <p style='text-align: justify;'>". $result->abstract. "</p>
                            <p style='text-align: justify;'>Country : ". $result->country. "</p>
                            <p style='text-align: justify;'>". $result->genre. "</p>
                        </div>
                    </div>
                </div>";
            }
?>