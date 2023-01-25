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

$result = $sparql->query(
    'SELECT DISTINCT ?author ?name ?title ?abstract ?country ?genre ?genreee ?gambar{'.
        '?keyword a dbo:Book;'.
        'dbp:name ?title;'.
        'dbo:abstract ?abstract;'.
        'dbp:country ?country;'.
        'dbo:literaryGenre ?genreee;'.
        'dbp:author ?author.'.
        '?author dbp:name ?name.'.
        '?genreee rdfs:label ?genre.'.
        'OPTIONAL {?keyword dbo:thumbnail ?gambar}.'.
        'filter(lang(?abstract)="en")'.
        'filter(lang(?name)="en")'.    
        'filter regex(?keyword, "'.str_replace(' ', '_', ucwords($namaNovel)).'","i").'.
      '}'
      );
 
      $detail = [];
      foreach ($result as $row) {
          $detail = [
              'title' => $row->title,
              'abstract' => $row->abstract,
              'name' => $row->name,
              'country' => $row->country,
              'genre' => $row->genre,
              'gambar' => $row->gambar,
          ];
          break;
      
      }
?> 
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="pencarian.php">Pencarian Buku</a>
                <a class="navbar-brand" href="pencarianaut.php">Author</a>
                <button class="navbar-toggler navbar-toggler-right" type="dropdown" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
                <div class="row gx-0">
                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                        <div class="content rounded">
                            <h1 class><?= $detail['title'] ?></h1>
                            <h5 class> by <?= $detail['name'] ?></h5>
                            <p style="text-align: justify;"><?= $detail['abstract']; ?></p>
                            <p style="text-align: justify;">Country : <?= $detail['country']; ?></p>
                            <p style="text-align: justify;">Genre : <?= $detail['genre']; ?></p>
                            <img src="<?php echo $detail ['gambar']; ?>">
                        </div>
                    </div>
                </div>

                <footer class="footer bg-black text-center text-white-50"><div class="container px-6 px-lg-10 mb-10">Copyright &copy; Kelompok 8</div></footer>