<?php
include("koneksi.php");

if(isset($_GET['id_lapangan'])){

    // buat query hapus
	$selectDetailTransaksi	= mysqli_query($koneksi, "SELECT * FROM detail_transaksi WHERE lapangan_id=".$_GET['id_lapangan']);
	$num_detail				= mysqli_num_rows($selectDetailTransaksi);

	$selectDetailFasilitas	= mysqli_query($koneksi, "SELECT * FROM detail_fasilitas WHERE lapangan_id=".$_GET['id_lapangan']);
	$num_fasilitas			= mysqli_num_rows($selectDetailFasilitas);
	if($num_detail > 0){
	?>
			<script type="text/javascript">
			 alert("Lapangan Gagal Dihapus!\nKarena Sudah Dilakukan Transaksi!");location.href="index.php?hal=admin-master/lapangan/list-lapangan";
			</script>
	<?php
	}else if($num_fasilitas > 0){
	?>
			<script type="text/javascript">
			 alert("Lapangan Gagal Dihapus!\nKarena Sudah Ada Fasilitas!");location.href="index.php?hal=admin-master/lapangan/list-lapangan";
			</script>
	<?php
	}else{
		$delete_lapangan = mysqli_query($koneksi, "DELETE FROM lapangan WHERE id_lapangan=".$_GET['id_lapangan'])or die(mysqli_error($koneksi));

		// apakah query hapus berhasil?
		if( $delete_lapangan ){
	?>
			<script type="text/javascript">
			 alert("Lapangan Berhasil Dihapus!");location.href="index.php?hal=admin-master/lapangan/list-lapangan";
			</script>
	<?php
		} else {
	?>
			<script type="text/javascript">
			 alert("Lapangan Gagal Dihapus!");location.href="index.php?hal=admin-master/lapangan/list-lapangan";
			</script>
	<?php
		}

	}	
}
?>