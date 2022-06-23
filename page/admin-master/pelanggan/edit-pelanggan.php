<?php

include("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('?hal=admin-master/pelanggan/list-pelanggan');
}

//ambil id dari query string
$id_pelanggan = $_GET['id'];

// buat query untuk ambil data dari database
$select_pelanggan	= mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan=$id_pelanggan");
$row_pelanggan 		= mysqli_fetch_array($select_pelanggan);

if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $nama_pelanggan 	= $_POST['nama_pelanggan'];
    $notelp_pelanggan 	= $_POST['notelp_pelanggan'];
	
    // buat query update
    $edit_pelanggan = mysqli_query($koneksi,"UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', notelp_pelanggan='$notelp_pelanggan' WHERE id_pelanggan='$id_pelanggan'");

    // apakah query update berhasil?
    if($edit_pelanggan){
?>
		<script type="text/javascript">
		alert("Update Berhasil!");location.href="index.php?hal=admin-master/pelanggan/list-pelanggan";
		</script>
<?php
    }else{
		echo "<script>alert('Update Gagal!');location.href='index.php?hal=admin-master/pelanggan/edit-pelanggan&id=".$id_pelanggan."';</script>";
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
	  <header class="panel-heading">EDIT IDENTITAS PELANGGAN</header>
	   <div class="panel-body">	
		<form action="" method="POST">
        <p>
            <label for="nama_pelanggan">Nama Pelanggan </label><br />
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" value="<?=$row_pelanggan['nama_pelanggan']; ?>" required />
        </p>
		
		<p>
            <label for="notelp_pelanggan">Nomor Telepon </label><br />
            <input type="text" id="notelp_pelanggan" name="notelp_pelanggan" placeholder="Nomor Telepon" value="<?=$row_pelanggan['notelp_pelanggan']; ?>" required />
        </p>
        
        <p>
            <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan" />
			<a href="index.php?hal=admin-master/pelanggan/list-pelanggan" class="btn btn-danger">BATAL</a>
		</p>
		</form>
	   </div>
	 </section>
	</div>
</div>

