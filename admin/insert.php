   <?php
  //Menggabungkan dengan file koneksi yang telah kita buat
    include 'komponen/header.php';
    ?>

      <?php if (isset($_GET['pesan'])) { ?>
                           <?php if ($_GET['pesan'] == "berhasil") { 
				echo "<script>";
        echo 'setTimeout(function () { swal("Success!","Berhasil Menambahkan Data Film!","success");';
        echo '}, 100);
        </script>'; 
        ?>
                           <?php }elseif ($_GET['pesan'] == "gagal") { 
        echo "<script>";
        echo 'setTimeout(function () { swal("Error!","Gagal Menambahkan Data Film!","error");';
        echo '}, 100);
        </script>';
        ?>
                           <?php }elseif ($_GET['pesan'] == "ekstensi") {
        echo "<script>";
        echo 'setTimeout(function () { swal("Warning!","Ekstensi File Harus PNG Dan JPG!","warning");';
        echo '}, 100);
        </script>'; 
        ?>
                           <?php }elseif ($_GET['pesan'] == "size") { 
        echo "<script>";
        echo 'setTimeout(function () { swal("Warning!","	Size File Tidak Boleh Lebih Dari 2 MB!","warning");';
        echo '}, 100);
        </script>'; 
        ?>
            
            <?php } ?>
            <?php } ?>



    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <!-- <h6 class="h2 text-white d-inline-block mb-0">Default</h6> -->
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Data Film</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   <!-- Page content -->
   <div class="container-fluid mt--6">
       <div class="row">
           <div class="col">
               <div class="card-wrapper">
                   <!-- Custom form validation -->
                   <div class="card">
                       <div class="card-header">
                    <h3 class="mb-0">Tambah Data Film</h3>
                </div>
                           <!-- <h3>Tambah Film</h3> -->
                     <!--   </div> -->
                       <!-- Card body -->
                       <div class="card-body">
                           <div class="row">
                               <div class="col-lg-8">
                                   <!-- <p class="mb-0">
                      For custom form validation messages, you’ll need to add the novalidate boolean attribute to your <code>&lt;form&gt;</code>. This disables the browser default feedback tooltips, but still provides access to the form
                      validation APIs in JavaScript.
                      <br /><br />
                      When attempting to submit, you’ll see the<code>:invalid</code> and <code>:valid</code> styles applied to your form controls.
                    </p> -->
                               </div>
                           </div>
                           <!-- <hr /> -->
                           <form action="insert_act.php" method="post" enctype="multipart/form-data">
                               <div class="form-row">
                                   <!-- Dropzone Image -->
                                   <div class="col-md-4 mb-4">
                                       <div class="card">
                                           <div class="card-header">
                                               <div class="form-input">
                                                   <div class="preview">
                                                       <img id="file-ip-1-preview">
                                                   </div>
                                                   <label for="file-ip-1">Upload Image</label>
                                                   <input type="file" id="file-ip-1" accept="image/*" name="photo"
                                                       onchange="showPreview(event);">
                                               </div>
                                           </div>
                                       </div>

                                       <div class="col-md-12 mb-12">

                                           <label class="form-control-label" for="link"> Link :</label>
                                           <input type="text" class="form-control" id="link" name="link"
                                               placeholder="Enter Link" value="" required>
                                       </div>
                                   </div>
                                   <div class="col-md-4 mb-4">
                                       <label class="form-control-label" for="id"> ID :</label>

                                       <!-- Kode PHP Untuk ID Otomatis -->

                                       <?php
                      include 'koneksi.php';
                      $query = mysqli_query($koneksi, "SELECT max(id_film) as kodeTerbesar FROM film");
                      $data = mysqli_fetch_array($query);
                      $kodeFilm = $data['kodeTerbesar'];
                      // $no = 1;
                      $urutan = (int) substr($kodeFilm, 3, 4) ;
                      $urutan++;
                      $huruf = "MVE";
                      $kode = $huruf . sprintf("%04s", $urutan);
                      
                       ?>

                                       <!-- End ID Otomatis -->
                                       <input type="text" class="form-control" id="id" name="id" placeholder="Enter Id"
                                           value="<?php echo $kode; ?>" readonly>
                                       <br>
                                       <label class="form-control-label" for="name"> Movie Name :</label>
                                       <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter movie name" value="" required>
                                       <br>
                                       <label class="form-control-label" for="production"> Production :</label>
                                       <input type="text" class="form-control" id="production" name="production"
                                           placeholder="Enter production" value="" required>
                                       <br>
                                       <div class="col-md-20 mb-12">
                                           <label class="form-control-label" for="director"> Director :</label>
                                           <input type="text" class="form-control" id="director" name="director"
                                               placeholder="Enter Director" value="" required>
                                       </div>
                                   </div>
                                   <div class="col-md-2 mb-3">
                                       <label class="form-control-label" for="quality"> Quality : </label>
                                       <select class="form-control" name="quality" id="quality">
                                           <option value="">choose quality</option>
                                           <option value="Blueray">Blueray</option>
                                           <option value="Web-DL">Web-DL</option>
                                           <option value="HD-Rip">HD-Rip</option>
                                           <option value="DVD-Rip">DVD-Rip</option>
                                           <option value="CAM/HDCAM">CAM/HDCAM</option>
                                       </select>
                                       <!-- <div class="valid-feedback">
                        Good Job!
                      </div>
                          <div class="invalid-feedback">
                           Please fill in this column!
                      </div> -->
                                       <br>
                                       <label class="form-control-label" for="resulation"> Resulation : </label>
                                       <select class="form-control" name="resulation" id="resulation">
                                           <option value="">choose resolution</option>
                                           <option value="720p">720p</option>
                                           <option value="1080p">1080p</option>
                                           <option value="1440p">1440p</option>
                                           <option value="4K">4K</option>
                                           <option value="8K">8K</option>
                                       </select>
                                       <br>
                                       <label class="form-control-label" for="release"> Release :</label>
                                       <input class="form-control datepicker" value="mm-dd-yyyy" id="release"
                                           name="release" placeholder="Select date" required>
                                       <br>
                                       <label class="form-control-label" for="example-time-input"> Time :</label>
                                       <input class="form-control" type="time" name="duration" value="00:00:00"
                                           id="example-time-input">
                                   </div>
                                   <div class="col-md-2 mb-3">
                                       <label class="form-control-label" for="imdb"> IMDB Rating :</label>
                                       <input type="text" class="form-control" name="imdb" id="imdb"
                                           placeholder="Enter IMDB" value="" required>
                                       <br>
                                       <label class="form-control-label" for="country"> Country :</label>
                                       <input type="text" class="form-control" id="country" name="country"
                                           placeholder="Enter country" value="" required>
                                       <br>
                                       <div class="card">
                                           <div class="card-header">
                                               <label class="form-control-label" for="gendre"> Gendre :</label>
                                           </div>
                                           <!-- Card body -->
                                           <div class="card-body">
                                               <div class="custom-control custom-checkbox">
                                                   <input class="custom-control-input" id="animation" value="animation"
                                                       name="gendre[]" type="checkbox">
                                                   <label class="custom-control-label" for="animation">Animation</label>
                                               </div>
                                               <div class="custom-control custom-checkbox">
                                                   <input class="custom-control-input" id="horor" value="horor"
                                                       name="gendre[]" type="checkbox">
                                                   <label class="custom-control-label" for="horor">Horor</label>
                                               </div>
                                               <div class="custom-control custom-checkbox">
                                                   <input class="custom-control-input" id="romance" value="romance"
                                                       name="gendre[]" type="checkbox">
                                                   <label class="custom-control-label" for="romance">Romance</label>
                                               </div>
                                               <div class="custom-control custom-checkbox">
                                                   <input class="custom-control-input" id="sci-fi" value="sci-fi"
                                                       name="gendre[]" type="checkbox">
                                                   <label class="custom-control-label" for="sci-fi">Sci-fi</label>
                                               </div>
                                               <div class="custom-control custom-checkbox">
                                                   <input class="custom-control-input" id="adventure" value="adventure"
                                                       name="gendre[]" type="checkbox">
                                                   <label class="custom-control-label" for="adventure">Adventure</label>
                                               </div>
                                               <div class="custom-control custom-checkbox">
                                                   <input class="custom-control-input" id="action" value="action"
                                                       name="gendre[]" type="checkbox">
                                                   <label class="custom-control-label" for="action">Action</label>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-4 mb-4">
                                       <div class="card">
                                           <div class="card-header">
                                               <label class="form-control-label" for="actors"> Actors :</label>
                                           </div>
                                           <!-- Card body -->
                                           <div class="card-body">
                                               <form>
                                                   <input type="text" id="actors" class="form-control" name="actors" 
                                                       value="" data-toggle="tags" required />
                                               </form>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-8 mb-8">
                                       <div class="card">
                                           <!-- Card header -->
                                           <div class="card-header">
                                               <label class="form-control-label" for="synopsis"> Synopsis :</label>
                                           </div>

                                           <!-- Card body -->
                                           <div class="card-body">
                                               <div class="form-group">
                                                   <textarea class="form-control" name="synopsis" id="synopsis" rows="4" placeholder="Enter Synopsis" 
                                                       required></textarea>
                                               </div>

                                           </div>

                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <button class="btn btn-primary" name="submit" type="submit"> Submit form </button>
                                   </div>

                           </form>
                       </div>
                   </div>
               </div>
           </div>


           <?php
    include 'komponen/footer.php';
    ?>



           <style>
           }

           .form-input {
               width: 350px;
               padding: 20px;
               background: #fff;
               box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                   3px 3px 7px rgba(94, 104, 121, 0.377);
           }

           .form-input input {
               display: none;


           }

           .form-input label {
               display: block;
               width: 45%;
               height: 45px;
               margin-left: 25%;
               line-height: 50px;
               text-align: center;
               background: #1172c2;

               color: #fff;
               font-size: 15px;
               font-family: "Open Sans", sans-serif;
               text-transform: Uppercase;
               font-weight: 600;
               border-radius: 5px;
               cursor: pointer;
           }

           .form-input img {
               width: 100%;
               display: none;

               margin-bottom: 30px;
           }
           </style>



           <!-- Optional JS -->
           <script>
           // Example starter JavaScript for disabling form submissions if there are invalid fields
           (function() {
               'use strict';
               window.addEventListener('load', function() {
                   // Fetch all the forms we want to apply custom Bootstrap validation styles to
                   var forms = document.getElementsByClassName('needs-validation');
                   // Loop over them and prevent submission
                   var validation = Array.prototype.filter.call(forms, function(form) {
                       form.addEventListener('submit', function(event) {
                           if (form.checkValidity() === false) {
                               event.preventDefault();
                               event.stopPropagation();
                           }
                           form.classList.add('was-validated');
                       }, false);
                   });
               }, false);
           })();
           </script>





           <script type="text/javascript">
           function showPreview(event) {
               if (event.target.files.length > 0) {
                   var src = URL.createObjectURL(event.target.files[0]);
                   var preview = document.getElementById("file-ip-1-preview");
                   preview.src = src;
                   preview.style.display = "block";
               }
           }
           </script>