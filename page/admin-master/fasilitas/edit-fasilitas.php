<?php

include("koneksi.php");

if( !isset($_GET['id']) ){
    header('?hal=admin-master/fasilitas/list-fasilitas');
}

$select_fasilitas	= mysqli_query($koneksi, "SELECT * FROM fasilitas WHERE id_fasilitas=".$_GET['id']);
$row_fasilitas 		= mysqli_fetch_array($select_fasilitas);

if(isset($_POST['simpan'])){
	
    // buat query update
    $edit_fasilitas = mysqli_query($koneksi,"UPDATE fasilitas SET nama_fasilitas='".$_POST['fasilitas']."' WHERE id_fasilitas=".$_GET['id']);

    // apakah query update berhasil?
    if($edit_fasilitas){
?>
		<script type="text/javascript">
		alert("Update Berhasil!");location.href="index.php?hal=admin-master/fasilitas/list-fasilitas";
		</script>
<?php
    }else{
		echo "<script>alert('Update Gagal!');location.href='index.php?hal=admin-master/fasilitas/edit-fasilitas&id=".$_GET['id']."';</script>";
    }
}
?>

<style>

select {
  width: 30%;
  padding: 16px 20px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}


input[type=number]{
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

textarea{
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

</style>

<div class="row list-jenis">
	<div class="col-sm-12">
	 <section class="panel panel-default">
	  <header class="panel-heading">EDIT FASILITAS</header>
	   <div class="panel-body">	
		<form action="" method="POST">
        <p>
            <label for="fasilitas">Fasilitas </label><br />
            <input type="text" id="fasilitas" name="fasilitas" placeholder="Masukkan Fasilitas" value="<?=$row_fasilitas['nama_fasilitas']; ?>" required />
        </p>
        
        <p>
            <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan" />
			<a href="index.php?hal=admin-master/fasilitas/list-fasilitas" class="btn btn-danger">BATAL</a>
		</p>
		</form>
	   </div>
	 </section>
	</div>
</div>

