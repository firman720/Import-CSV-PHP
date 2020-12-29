<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "tutorial_crud";

$koneksi = mysql_connect($host,$user,$pass);
if($koneksi){
	//echo "Koneksi berhasil";
	if(mysql_select_db($db)){
		//echo "berhasil";
	}else{
		echo "Database tidak ditemukan";
	}

}else{
	echo "Koneksi gagal..";
}

?>