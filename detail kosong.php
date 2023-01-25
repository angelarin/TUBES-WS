<?php 
include('bagian/head.php');
include('koneksi.php');
require_once "lib/EasyRdf.php";

EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
EasyRdf_Namespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
EasyRdf_Namespace::set('db', 'http://dbpedia.org/');
EasyRdf_Namespace::set('dbr', 'http://dbpedia.org/resource/');
EasyRdf_Namespace::set('dbp', 'http://dbpedia.org/property/');
EasyRdf_Namespace::set('dbo', 'http://dbpedia.org/ontology/');
EasyRdf_Namespace::set('owl', 'http://www.w3.org/2002/07/owl#');

$sparql = new EasyRdf_Sparql_Client('http://dbpedia.org/sparql');
//$namaNovel = $_POST['namaNovel'];

?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="pencarian.php">Pencarian</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <!-- <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="#sinopsis">Preview</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
        
        <header class="intro">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="text-white-50 mx-auto my-0 text-uppercase"> Perpustakaan Novel </h1>
                        <h2 class="text-white mx-auto mt-2 mb-5"> KELOMPOK 8 WEB SEMANTIK </h2>
                        <!-- <form>
                            <input type="text" class="border-0" name="cari" style="outline: none; width: 87%; background-color: white;" value="<?= @$_GET['cari']; ?>" name="email" placeholder="Masukkan judul novel">
                            <input type="submit" id="submitName" value="Search">
                        </form> -->
                    </div>
                </div>
            </div>
        </header>
        
        <section class="contacts" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                    </div>
                </div>
            </div>
        </section>
        <section class="sinopsis bg-light" id="sinopsis">
            <div class="container px-4 px-lg-5">
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7">
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                        </div>
                    </div>
                </div>
                    
        <section id="bg-light" class="">
            <div class="container" data-aos="fade-up">
                        
                    <?php
                    if(isset($_POST['namaNovel'])){
                        $result = $sparql->query(
                            'SELECT DISTINCT ?author ?name ?title {'.
                                '?keyword a dbo:Book;'.
                                'dbp:name ?title;'.
                                'dbp:author ?author.'.
                                '?author dbp:name ?name.'.    
                                'filter regex(?keyword, "'.str_replace(' ', '_', ucwords($_POST['namaNovel'])).'","i").'.
                              '}'
                              );
                        
                              foreach ($result as $row) {
                                echo "<tr> 
                                <td>".$no++."</td>
                                <td>". $row->title. "</td> 
                                <td>". $row->name . "</td>
                                <td class='d-flex justify-content-center align-items-center'>
                                <form method='POST' action='detail.php'>
                                    <input type='hidden' value='" . $row->name . "' name='namaNovel'/>
                                    <button type='submit' name='novelName'>
                                        <span>Detail</span>
                                    </button>
                                </form>
                            </td>
                                </tr>";    
                            }
            }
    ?>