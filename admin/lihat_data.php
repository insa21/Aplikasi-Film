<?php
include 'komponen/header.php';
?>
<!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <!-- <h6 class="h2 text-white d-inline-block mb-0">Default</h6> -->
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Lihat Data Film</li>
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
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Semua Film</h3>
                    <!-- <p class="text-sm mb-0">
                        This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal
                        setup in order to get started fast.
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; -->
                        <!-- <button class="btn btn-primary" type="button">Button</button> -->
                        <!-- <a href="insert.php" class="btn btn-primary">Tambah Data</a> -->
                    <!-- </p> -->
                </div>

                <?php if (isset($_GET['pesan'])) { ?>
                <?php if ($_GET['pesan'] == "berhasil") { 
				echo "<script>";
        echo 'setTimeout(function () { swal("Success!","Berhasil Mengupdate Data Film!","success");';
        echo '}, 100);
        </script>'; 
        ?>
                <?php }elseif ($_GET['pesan'] == "gagal") { 
        echo "<script>";
        echo 'setTimeout(function () { swal("Error!","Gagal Mengupdate Data Film!","error");';
        echo '}, 100);
        </script>';
        ?>
                <?php }elseif ($_GET['pesan'] == "hapus") {
        echo "<script>";
        echo 'setTimeout(function () { swal("success!","Data Berhasil Dihapus!","success");';
        echo '}, 100);
        </script>'; 
        ?>
                <?php }elseif ($_GET['pesan'] == "gagalhapus") {
        echo "<script>";
        echo 'setTimeout(function () { swal("Error!","Gagal Menghapus Data Film!","error");';
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
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:150px;">Action</th>
                                <th>#</th>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Gendre</th>
                                <th>Director</th>
                                <th>Actor</th>
                                <th>Country</th>
                                <th>Duration</th>
                                <th>Quality</th>
                                <th>Release</th>
                                <th>IMDB</th>
                                <th>Resulation</th>
                                <th>Production</th>
                                <th>Synopsis</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="width:150px;">Action</th>
                                <th>#</th>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Gendre</th>
                                <th>Director</th>
                                <th>Actor</th>
                                <th>Country</th>
                                <th>Duration</th>
                                <th>Quality</th>
                                <th>Release</th>
                                <th>IMDB</th>
                                <th>Resulation</th>
                                <th>Production</th>
                                <th>Synopsis</th>
                                <th>Link</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
				include 'koneksi.php';

				$no = 1;
				$get_data = mysqli_query($koneksi,"SELECT * FROM film");
				while ($data = mysqli_fetch_array($get_data)) {
					?>
                            <tr>
                                 <td>
                                    <a href="edit.php?id=<?php echo $data['id_film'] ?>"
                                        class="btn btn-warning text-white "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg></a>
                                    <a href="delete.php?id=<?php echo $data['id_film'] ?>"
                                        class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></a>
                                </td>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['id_film']; ?></td>
                                <td>
                                    <?php 
					                 		if ($data['photo_film'] == "") { ?>
                                    <img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+FILM"
                                        style="width:100px;height:100px;">
                                    <?php }else{ ?>
                                    <img src="foto/<?php echo $data['photo_film']; ?>"
                                        style="width:100px;height:100px;">
                                    <?php } ?>
                                </td>
                                <td><?php echo $data['name_film']; ?></td>
                                <td><?php echo $data['gendre_film']; ?></td>
                                <td><?php echo $data['director_film']; ?></td>
                                <td><?php echo $data['actors_film']; ?></td>
                                <td><?php echo $data['country_film']; ?></td>
                                <td><?php echo $data['duration_film']; ?></td>
                                <td><?php echo $data['quality_film']; ?></td>
                                <td><?php echo $data['release_film']; ?></td>
                                <td><?php echo $data['imdb_film']; ?></td>
                                <td><?php echo $data['resulation_film']; ?></td>
                                <td><?php echo $data['production_film']; ?></td>
                                <td><?php echo $data['synopsis_film']; ?></td>
                                <td><?php echo $data['link_film']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <?php 
include 'komponen/footer.php';
?>