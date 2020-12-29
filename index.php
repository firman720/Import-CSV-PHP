<?php
	include"config.php";
	$sqldata = 'SELECT * FROM siswa';
?>
<html>
<head>
	<title>Input Data Masal</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row mt-4">
			<div class="col-lg-9">
				<h4>Data</h4>
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Umur</th>
							<th>Kelas</th>
						</tr>

					</thead>
					<tbody>
					<?php 
						$run = mysql_query($sqldata);
						while ($siswa = mysql_fetch_array($run)) {
						@$no++;
					?>
						<tr>
							<td><?=$no?></td>
							<td><?=$siswa['nama']?></td>
							<td><?=$siswa['umur']?></td>
							<td><?=$siswa['kelas']?></td>
						</tr>
					<?php
						}$no=1;
					?>
					</tbody>
				</table>
			</div>
			<div class="col-lg-3">
				<h4>Form Data</h4>
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="file" name="data">
					<input type="submit" name="input" value="INSERT" class="btn btn-primary mt-3">
				</form>
			</div>
		</div>
	</div>
<script type="text/javascript" src="css/bootstrap.min.js"></script>
</body>
</html>

<?php
	if(isset($_POST['input'])){

		$datanama  =  $_FILES['data']['name'];
		$datatmp   =  $_FILES['data']['tmp_name'];	
		$exe       =  pathinfo($datanama, PATHINFO_EXTENSION);
		$folder    = 'file/';
         
		if($exe=='csv'){
			$upload = move_uploaded_file($datatmp, $folder.$datanama);
			if($upload){
				$open = fopen($folder.$datanama, 'r');
				while (($row = fgetcsv($open, 1000, ','))!==FALSE ) {
					    $sql = mysql_query("INSERT INTO siswa 
					    VALUES('','".$row[0]."','".$row[1]."','".$row[2]."') ")or die(mysql_error());

				}

			}else{
				echo "Gagal diupload";
			}
		}else{
			echo "Bukan File CSV";
		}

	}
?>