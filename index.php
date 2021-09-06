<?php 
// koneksi ke database 
include 'koneksi.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test-APP-MLM</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body>

	<section class="header">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#">APP-MLM</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNav">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link" aria-current="page" href="index.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="cari.php">Cari</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</section>
<div class="container">

	<div class="row justify-content-center mt-5">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-center bg-dark">
					<h3 style="color:white;">Form input member</h3>
				</div>
				<div class="body">
					<div class="row justify-content-center mt-3 mb-3">
						<div class="col-md-6">
							<form method="post">
									<div class="form-floating mb-3">
									  <input type="text" class="form-control" name="id" placeholder="ID">
									  <label for="floatingInput">ID</label>
									</div>
								<div class="form-floating mb-3">
								  <input type="text" class="form-control" name="nama" placeholder="Nama">
								  <label for="floatingPassword">Nama</label>
								</div>
								<div class="form-floating mb-3">
								  <input type="text" class="form-control" name="alamat" placeholder="Alamat">
								  <label for="floatingPassword">Alamat</label>
								</div>
								<div class="form-floating mb-3">
								  <input type="number" class="form-control" name="notelp" placeholder="Notelp">
								  <label for="floatingPassword">No telepon</label>
								</div>
								<div class="form-group mb-3">
								 	<select class="form-select" name="upline" aria-label="Default select example">
									  <option selected>-- Pilih Nama Upline --</option>
									  <?php 

									  	$query = mysqli_query($db,"SELECT * FROM user ORDER BY nama ASC");
									  	while ($data = mysqli_fetch_assoc($query)) {?>
									
									  <option value="<?=$data['nama']?>"><?=$data['nama']?></option>

									<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<button class="btn btn-success btn-md" name="simpan">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</body>
</html>




<?php 
	
	//jika tombol simpan di klik
	if (isset($_POST['simpan'])) {

		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$notelp = $_POST['notelp'];

		$up = $_POST['upline'];

	// Cek apakah sudah mempunyai 2 upline atau belum
		$querycek = mysqli_query($db,"SELECT * FROM member WHERE upline='$up'");
		$cek = mysqli_num_rows($querycek);

		if ($cek == 2) {
			
			echo "<script>alert('Data upline sudah memenuhi kuota , silahkan pilih upline lain') </script>";
			echo "<script>location='index.php'</script>";


		}else{
	// Simpan data
		mysqli_query($db,"INSERT INTO user VALUES('$id','$nama','$alamat','$notelp')");

		mysqli_query($db,"INSERT INTO member (nama_user,downline) VALUES ('$up','$nama')");
		mysqli_query($db,"INSERT INTO member (nama_user,upline) VALUES ('$nama','$up')");

		echo "<script>alert('Data Berhasil Disimpan')</script>";
		echo "<script>location='index.php'</script>";

		}
 
	}

 ?>