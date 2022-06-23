<?php
 session_start();
 include 'page/koneksi.php';
 
if(isset($_POST['login']) && !empty($_POST['login'])){
	 $username 	= mysqli_real_escape_string($koneksi, $_POST['nama_pegawai']);
	 $password	= mysqli_real_escape_string($koneksi, $_POST['password']);
	 
	 $select_user	= mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nama_pegawai='$username' AND password_pegawai='$password'");
	 $num_user		= mysqli_num_rows($select_user);
	 $row_user		= mysqli_fetch_array($select_user);
	 if($num_user > 0){
		$_SESSION['id_pegawai'] = $row_user['id_pegawai'];
		header('location: page/index.php');
	 }else{
?>
		<script type="text/javascript">
		 alert("Pengguna Tidak Ditemukan!");location.href="index.php";
		</script>
<?php
	 }
}
?>