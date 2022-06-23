<?php

include("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('?hal=admin-master/kategori/list-pegawai');
}

//ambil id dari query string
$id_pegawai = $_GET['id'];

// buat query untuk ambil data dari database
$select_pegawai	= mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai=$id_pegawai");
$row_pegawai 		= mysqli_fetch_array($select_pegawai);

if(isset($_POST['simpan'])){
	
    // buat query update
    $edit_pegawai = mysqli_query($koneksi,"UPDATE pegawai SET nama_pegawai='".$_POST['nama_pegawai']."', alamat_pegawai='".$_POST['alamat_pegawai']."', password_pegawai='".$_POST['password_pegawai']."', notelp_pegawai='".$_POST['notelp_pegawai']."' WHERE id_pegawai=$id_pegawai");

    // apakah query update berhasil?
    if($edit_pegawai){
?>
		<script type="text/javascript">
		alert("Update Berhasil!");location.href="index.php?hal=admin-master/pegawai/list-pegawai";
		</script>
<?php
    }else{
		echo "<script>alert('Update Gagal!');location.href='index.php?hal=admin-master/pegawai/edit-pegawai&id=".$id_pegawai."';</script>";
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
	  <header class="panel-heading">EDIT PEGAWAI</header>
	   <div class="panel-body">	
		<form action="" method="POST">
        <p>
            <label for="nama_pegawai">Nama Pegawai </label><br />
            <input type="text" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai" value="<?=$row_pegawai['nama_pegawai']; ?>" required />
        </p>
		
		<p>
            <label for="alamat_pegawai">Alamat Pegawai </label><br />
            <input type="text" id="alamat_pegawai" name="alamat_pegawai" placeholder="Alamat Pegawai" value="<?=$row_pegawai['alamat_pegawai']; ?>" required />
        </p>
        <p>
            <label for="password_pegawai">Password Pegawai </label><br />
            <input type="text" id="password_pegawai" name="password_pegawai" placeholder="Password Pegawai" value="<?=$row_pegawai['password_pegawai']; ?>" required />
        </p>
		
		<p>
            <label for="notelp_pegawai">Nomor Telpon Pegawai </label><br />
            <input type="text" id="notelp_pegawai" name="notelp_pegawai" placeholder="Nomor Telpon" value="<?=$row_pegawai['notelp_pegawai']; ?>" required />
        </p>        
        <p>
            <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan" />
			<a href="index.php?hal=admin-master/kategori/list-pegawai" class="btn btn-danger">BATAL</a>
		</p>
		</form>
	   </div>
	 </section>
	</div>
</div>

