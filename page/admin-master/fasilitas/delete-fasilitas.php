<?php
include("koneksi.php");

if(isset($_GET['id_fasilitas'])){

	$select_detail	= mysqli_query($koneksi, "SELECT * FROM detail_fasilitas WHERE fasilitas_id=".$_GET['id_fasilitas']);
	$num_detail		= mysqli_num_rows($select_detail);
	if($num_detail > 0){
	?>
			<script type="text/javascript">
			 alert("Fasilitas Gagal Dihapus!\nKarena Masuk ke Dalam Lapangan!");location.href="index.php?hal=admin-master/fasilitas/list-fasilitas";
			</script>
	<?php
	}else{
		$delete_fasilitas = mysqli_query($koneksi, "DELETE FROM fasilitas WHERE id_fasilitas=".$_GET['id_fasilitas']);

		if($delete_fasilitas){
	?>
			<script type="text/javascript">
			 alert("Fasilitas Berhasil Dihapus!");location.href="index.php?hal=admin-master/fasilitas/list-fasilitas";
			</script>
	<?php
		} else {
	?>
			<script type="text/javascript">
			 alert("Fasilitas Gagal Dihapus!");location.href="index.php?hal=admin-master/fasilitas/list-fasilitas";
			</script>
	<?php
		}

	}	
}
?>