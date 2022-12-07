<?php 
include 'koneksi.php';

if (isset($_POST['submit'])) {
$id = $_POST['id'];
$foto_nama = $_FILES['photo']['name'];
$foto_size = $_FILES['photo']['size'];
$name = $_POST['name'];
// $gendre = $_POST['gendre'];
$gendre = implode(", ", $_POST['gendre']);
$director = $_POST['director'];
$actors = $_POST['actors'];
$country = $_POST['country'];
$duration = $_POST['duration'];
$quality = $_POST['quality'];
$release = $_POST['release'];
$imdb = $_POST['imdb'];
$resulation = $_POST['resulation'];
$production = $_POST['production'];
$synopsis = $_POST['synopsis'];
$link = $_POST['link'];
// konversi dari link url menjadi link yt embed
$result = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","http://www.youtube.com/embed/$1",$link);


if ($foto_size > 2097152) {
	header("location:insert.php?pesan=size");
}else{

	// Mengecek apakah Ada file yang diupload atau tidak
	if ($foto_nama != "") {

		// Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
		$ekstensi_izin = array('png','jpg','jepg');
		// Memisahkan nama file dengan Ekstensinya
		$pisahkan_ekstensi = explode('.', $foto_nama); 
		$ekstensi = strtolower(end($pisahkan_ekstensi));
		// Nama file yang berada di dalam direktori temporer server
		$file_tmp = $_FILES['photo']['tmp_name'];   
		// Membuat angka/huruf acak berdasarkan waktu diupload
		$tanggal = md5(date('Y-m-d h:i:s'));
		// Menyatukan angka/huruf acak dengan nama file aslinya
		$foto_nama_new = $tanggal.'-'.$foto_nama; 

		// Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
		if(in_array($ekstensi, $ekstensi_izin) === true)  {
			// Memindahkan File kedalam Folder "FOTO"
            move_uploaded_file($file_tmp, 'foto/'.$foto_nama_new);

            // Query untuk memasukan data kedalam table film
            $query = mysqli_query($koneksi, "INSERT INTO film VALUES ('$id', '$foto_nama_new', '$name', '$gendre', 
            '$director', '$actors', '$country', '$duration', '$quality', '$release', '$imdb', '$resulation', '$production', '$synopsis', '$result')");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
            	header("location:insert.php?pesan=berhasil");
            } else {
                header("location:insert.php?pesan=gagal");
            }

        } else { 
        	header("location:insert.php?pesan=ekstensi");        }

    }else{

    	// Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
    	 $query = mysqli_query($koneksi, "INSERT INTO film (id_film, name_film, gendre_film, director_film, actors_film, country_film, duration_film, quality_film,
          release_film, imdb_film, resulation_film, production_film, synopsis_film, link_film) VALUES (('$id', '$name', '$gendre', '$director', 
          '$actors', '$country', '$duration', '$quality', '$release', '$imdb', '$resulation', '$production', '$synopsis', '$result')");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
            	header("location:insert.php?pesan=berhasil");
            } else {
                header("location:insert.php?pesan=gagal");
            }

    }
	

}
}

?>