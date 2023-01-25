<?php 
include('bagian/head.php');
include('koneksi.php');
?>
<!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
            <a class="navbar-brand"></a>    
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pencarian
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="nav-item"><a class="nav-link" href="pencarian.php">Tugas 1</a></li>
            <li class="nav-item"><a class="nav-link" href="pencarianaut.php">Tugas 2</a></li>
            </div> -->
            <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="pencarian.php">Pencarian Buku</a>
                <a class="navbar-brand" href="pencarianaut.php">Author</a>
                <button class="navbar-toggler navbar-toggler-right" type="dropdown" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link" href="#sinopsis">Preview</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
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
        
        <section class="tentang text-center" id="tentang">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4"> NOVEL </h2>
                        <p class="text-white-50">
                        Novel adalah salah satu jenis karya sastra yang berbentuk prosa. Kisah di dalam novel merupakan hasil karya imajinasi yang membahas tentang permasalahan kehidupan seseorang atau berbagai tokoh. Cerita di dalam novel dimulai dengan munculnya persoalan yang dialamai oleh tokoh dan diakhiri dengan penyelesaian masalahnya.
                        </p>
                    </div>
                </div>
            </div>
</section>

    <!-- ======= Result Section ======= -->
    <!-- <div class="container">
        
        <?php
                  if(isset($_GET['cari']))
                  {
                    // Ambil Data dari dbpedia
                    // yang dimaksukkan ke dalan variabel result
                      $result = $sparql->query(
                        'SELECT DISTINCT ?author ?name ?title {'.
                            '?keyword a dbo:Book;'.
                            ' dbp:name ?title;'.
                            'dbp:author ?author.'.
                            '?author dbp:name ?name.'.    
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
                            <th>Title</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";
                    // Menampilkan data
                    // data yang telah dimasukkan kedalam variabel result kemudian di lakukan foeach kepada variabel row 
                    // $no = 1;
  
                    //     foreach ($result as $row) {
                    //         echo "<tr> 
                    //         <td>".$no++."</td>
                    //         <td>". $row->title. "</td> 
                    //         <td>". $row->name . "</td>
                    //         <td><button>Detail</button></td> 
                    //         </tr>";    
                        }
//}
          ?> -->
          <!-- <td>
            <a href="asd">sad</a>
          </td> -->
         <!-- </table>
          
        </div>
      </section>End Result Section -->
        <?php
            $sinopsis = mysqli_query($koneksi, "SELECT * FROM sinopsis WHERE id = 1");
            $data = mysqli_fetch_array($sinopsis);
        ?>
        <section class="sinopsis bg-light" id="sinopsis">
            <div class="container px-4 px-lg-5">
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="<?php echo $data['Gambar']?>" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4><?php 
                            echo $data['Judul']
                            ?> </h4>
                            <p class="text-black-50 mb-0"><?php echo $data['Deskripsi']?></p>
                        </div>
                    </div>
                </div>
        <?php
            $sinopsis = mysqli_query($koneksi, "SELECT * FROM sinopsis WHERE id = 2");
            $data = mysqli_fetch_array($sinopsis);
        ?>
                <section class="sinopsis bg-light">
                <div class="container px-5 px-lg-1">
                <div class="row gx-0 mb-4 mb-lg-5 align-items-right">
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-right">
                    <div class="col-lg-6"><img class="img-fluid" src="<?php echo $data['Gambar']?>" alt="..." /></div>
                    <div class="col-lg-6">
                        <div class="bg-white text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-black"><?php echo $data['Judul']?></h4>
                                    <p class="mb-0 text-black-50"><?php echo $data['Deskripsi']?></p>
                                    <hr class="d-none d-lg-block mb-0 ms-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            $sinopsis = mysqli_query($koneksi, "SELECT * FROM sinopsis WHERE id = 3");
            $data = mysqli_fetch_array($sinopsis);
        ?>
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-6"><img class="img-fluid" src="<?php echo $data['Gambar']?>" alt="..." /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-white text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-black"><?php echo $data['Judul']?> </h4>
                                    <p class="mb-0 text-black-50"><?php echo $data['Deskripsi']?></p>
                                    <hr class="d-none d-lg-block mb-0 me-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="contacts" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                    </div>
                </div>
            </div>
        </section>
        <section class="contact bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Instagram</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">@kelompok8WS</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">kelompok8ws@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+628123456789</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div> -->
            </div>
        </section>
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5 mb-5">Copyright &copy; Kelompok 8</div></footer>
        <?php
                $uri_rdf = 'http://localhost/TUBES-WS/biodata.rdf';
                $rdfdata = \EasyRdf\Graph::newAndLoad($uri_rdf);
                $doc = $rdfdata->primaryTopic();
                ?>
        <section class="mt-5 pb-5 shadow " id="tim">
            <div class="container pt-3 " >
                <div class="text-center pb-5">
                    <h1 class=" fs-1">Nama Kelompok</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-sm-7">
                    
                        <table class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                <th scope="col" class="fs-3">Nama :</th>
                                <th scope="col" class="fs-3">NIM :</th>
                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fs-3"><?= $doc->get('foaf:Name1') ?></td>
                                    <td class="fs-3"><?= $doc->get('foaf:NIM1') ?></td>
                                </tr>
                                <tr>
                                    <td class="fs-3"><?= $doc->get('foaf:Name2') ?></td>
                                    <td class="fs-3"><?= $doc->get('foaf:NIM2') ?></td>
                                </tr>
                                <tr>
                                    <td class="fs-3"><?= $doc->get('foaf:Name3') ?></td>
                                    <td class="fs-3"><?= $doc->get('foaf:NIM3') ?></td>
                                </tr>
                                <tr>
                                    <td class="fs-3"><?= $doc->get('foaf:Name4') ?></td>
                                    <td class="fs-3"><?= $doc->get('foaf:NIM4') ?> </td>
                                </tr>
                                <tr>
                                    <td class="fs-3"><?= $doc->get('foaf:Name5') ?></td>
                                    <td class="fs-3"><?= $doc->get('foaf:NIM5') ?> </td>
                                </tr>
                    
                                
                            </tbody>
                        </table>

                    </div>
             
                </div>



           

        </section>
        </section>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>