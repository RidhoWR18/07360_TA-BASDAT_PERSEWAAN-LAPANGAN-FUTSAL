<?php
include("koneksi.php");

if(isset($_GET['id_pegawai'])){

    // buat query hapus
	$selectTransaksi	= mysqli_query($koneksi, "SELECT * FROM transaksi WHERE pegawai_id=".$_GET['id_pegawai']);
	$num_detail				= mysqli_num_rows($selectTransaksi);
	if($num_detail > 0){
	?>
			<script type="text/javascript">
			 alert("Pegawai Gagal Dihapus!\nKarena Sudah Dilakukan Transaksi!");location.href="index.php?hal=admin-master/pegawai/list-pegawai";
			</script>
	<?php
	}else{
		$delete_pegawai = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai=".$_GET['id_pegawai'])or die(mysqli_error($koneksi));

		// apakah query hapus berhasil?
		if( $delete_pegawai ){
	?>
			<script type="text/javascript">
			 alert("Pegawai Berhasil Dihapus!");location.href="index.php?hal=admin-master/pegawai/list-pegawai";
			</script>
	<?php
		} else {
	?>
			<script type="text/javascript">
			 alert("Pegawai Gagal Dihapus!");location.href="index.php?hal=admin-master/pegawai/list-pegawai";
			</script>
	<?php
		}

	}	
}
?>