<?php
include("koneksi.php");
if(isset($_GET['id_pelanggan'])){

    // ambil id dari query string
    $id_pelanggan = $_GET['id_pelanggan'];

    // buat query hapus
	$select_transaksi	= mysqli_query($koneksi, "SELECT * FROM transaksi WHERE pelanggan_id=$id_pelanggan");
	$num_transaksi		= mysqli_num_rows($select_transaksi);
	if($num_transaksi > 0){
	?>
			<script type="text/javascript">
			 alert("Pelanggan Gagal Dihapus!\nKarena Sudah Dilakukan Transaksi!");location.href="index.php?hal=admin-master/pelanggan/list-pelanggan";
			</script>
	<?php
	}else{
		$delete_pelanggan = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan=$id_pelanggan");

		// apakah query hapus berhasil?
		if( $delete_pelanggan ){
	?>
			<script type="text/javascript">
			 alert("Pelanggan Berhasil Dihapus!");location.href="index.php?hal=admin-master/pelanggan/list-pelanggan";
			</script>
	<?php
		} else {
	?>
			<script type="text/javascript">
			 alert("Pelanggan Gagal Dihapus!");location.href="index.php?hal=admin-master/pelanggan/list-pelanggan";
			</script>
	<?php
		}

	}	
}
?>