<?php
require_once "lib/EasyRdf.php";

EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
EasyRdf_Namespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
EasyRdf_Namespace::set('db', 'http://dbpedia.org/');
EasyRdf_Namespace::set('dbr', 'http://dbpedia.org/resource/');
EasyRdf_Namespace::set('dbp', 'http://dbpedia.org/property/');
EasyRdf_Namespace::set('dbo', 'http://dbpedia.org/ontology/');
EasyRdf_Namespace::set('owl', 'http://www.w3.org/2002/07/owl#');

$sparql = new EasyRdf_Sparql_Client('http://dbpedia.org/sparql');
?>
<?php 
include('bagian/head.php');
include('koneksi.php');
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href=""></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <!-- <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="#sinopsis">Preview</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul> -->
                </div>
            </div>
        </nav>

        <header class="intro">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="text-white-50 mx-auto my-0 text-uppercase"> Perpustakaan Novel </h1>
                        <h2 class="text-white mx-auto mt-2 mb-5"> Anda bisa mencari penulis apapun sesuai keinginan hati. 
                            Silahkan masukkan nama penulis yang anda inginkan! </h2>
                        <form class="d-flex">
                            <input type="text" class="form-control col-sm-1" name="cari" style="outline: none; width: 87%; background-color: white;" value="<?= @$_GET['cari']; ?>" name="email" placeholder="Masukkan nama penulis!">
                            <button type="submit" id="submitName" value="Search" class ="btn btn-dark">Search </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <div class="container">
        
        <?php
                  if(isset($_GET['cari']))
                  {
                    // Ambil Data dari dbpedia
                    // yang dimaksukkan ke dalan variabel result
                      $result = $sparql->query(
                          'SELECT  ?nama ?name WHERE {'.
                            '?keyword a dbo:Writer;'.
                            'dbp:name ?nama.'.
                            'filter regex(?keyword, "'.str_replace(' ', '_', ucwords($_GET['cari'])).'","i").'.
                            '}'
                          );
  
                          echo" <div class='section-title mt-5'>
                                  <h2>Result</h2>
                                </div>";
  
                          echo "<div class='panel panel-body' >
                          <div class='table-responsive'>
                          
                          <table class='table table-hover' style='font-size: 13px;'>
                          
                            <thead>
                        <tr>
                            <th>No</th> 
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";
                    // Menampilkan data
                    // data yang telah dimasukkan kedalam variabel result kemudian di lakukan foeach kepada variabel row 
                    $no = 1;
  
                        foreach ($result as $row) {
                            echo "<tr> 
                            <td>".$no++."</td>
                             <td>". $row->nama. "</td> 
                            <td class='d-flex justify-content-center align-items-center'>
                            <form method='POST' action='detailaut.php'>
                                <input type='hidden' value='" . $row->nama . "' name='namaNovel'/>
                                <button type='submit' name='novelName'>
                                    <span>Detail</span>
                                </button>
                            </form>
                        </td>
                            </tr>";    
                        }
                }
          ?>
          <!-- <td>
            <a href="asd">sad</a>
          </td> -->
         </table>
          
        </div> 
      </section><!-- End Result Section -->