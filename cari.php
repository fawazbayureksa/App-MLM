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
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-th="Toggle navigation">
		      <td class="navbar-toggler-icon"></td>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNav">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
					<h3 style="color:white;">Form Member</h3>
				</div>
				<div class="body">
					<div class="row justify-content-center">
						<div class="col-md-8">
							
							 <form class="d-flex mt-5 mb-3" method="get">
							      <input class="form-control" type="search" placeholder="Cari" name="nama"  aria-th="Search">
							      <button class="btn btn-primary btn-sm" name="cari" type="submit"> Cari</button>
						    </form>						    	
							<?php 
								if(isset($_GET['cari'])){
									$nama = $_GET['nama'];
									$data = mysqli_query($db,"SELECT * FROM user WHERE id like '%".$nama."%' OR nama like '%".$nama."%' OR no_telp like '%".$nama."%' ORDER BY id ASC");				
								$d = mysqli_fetch_assoc($data);
								?>
								<table>
									<tr>
										<th>ID </th>
										<td>: <?=$d['id']?></td>
									</tr>
				
									<tr>
										<th>Nama </th>
										<td>: <?=$d['nama']?></td>
									</tr>
									<tr>
										<th>Alamat </th>
										<td>: <?=$d['alamat']?></td>
									</tr>
									<tr>
										<th>No telepon </th>
										<td>: <?=$d['no_telp']?></td>
									</tr>
									
									<tr>
									<th>Downline  </th>
									<td>: -
										<!-- Menampilkan nama nama downline dari user yang di cari -->
												<?php 
													$id = $d['nama'];
													$queryx = mysqli_query($db,"SELECT * FROM member WHERE nama_user =  '$id'");
													while ($datx = mysqli_fetch_assoc($queryx)){
															
														echo' '.$datx['downline'];
														
													};
												 ?>

									</td>
									</tr>
									<tr>
										<th>Upline</th>
										<td>: -
											<!-- Menampilkan nama nama upline dari user yang di cari -->
											<?php 
													$id = $d['nama'];
													$query = mysqli_query($db,"SELECT * FROM member WHERE nama_user =  '$id'");
													while ($dat = mysqli_fetch_assoc($query)){
															echo " ".$dat['upline'];
													};
												 ?>
										</td>
									</tr>
								</table>
							<?php 
								}else{

									echo "<h4 class='text-center'>Silahkan Masukkan Data Pencarian</h4>";
								}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>