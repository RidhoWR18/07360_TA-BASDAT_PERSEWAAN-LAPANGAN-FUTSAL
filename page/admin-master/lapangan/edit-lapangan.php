<?php

include("koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('?hal=admin-master/kategori/list-lapangan');
}

//ambil id dari query string
$id_lapangan = $_GET['id'];

// buat query untuk ambil data dari database
$select_lapangan	= mysqli_query($koneksi, "SELECT * FROM lapangan WHERE id_lapangan=$id_lapangan");
$row_lapangan 		= mysqli_fetch_array($select_lapangan);

if(isset($_POST['simpan'])){
	
    // buat query update
    $edit_lapangan = mysqli_query($koneksi,"UPDATE lapangan SET nama_lapangan='".$_POST['nama_lapangan']."',harga_per_jam=".$_POST['harga_per_jam'].",status=".$_POST['status']." WHERE id_lapangan=$id_lapangan");

    // apakah query update berhasil?
    if($edit_lapangan){
?>
		<script type="text/javascript">
		alert("Update Berhasil!");location.href="index.php?hal=admin-master/lapangan/list-lapangan";
		</script>
<?php
    }else{
		echo "<script>alert('Update Gagal!');location.href='index.php?hal=admin-master/lapangan/edit-lapangan&id=".$id_lapangan."';</script>";
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
	  <header class="panel-heading">EDIT LAPANGAN</header>
	   <div class="panel-body">	
		<form action="" method="POST">
        <p>
            <label for="nama_lapangan">Nama Lapangan </label><br />
            <input type="text" id="nama_lapangan" name="nama_lapangan" placeholder="Nama Lapangan" value="<?=$row_lapangan['nama_lapangan']; ?>" required />
        </p>
		
		<p>
            <label for="harga_per_jam">Harga/Jam </label><br />
            <input type="text" id="harga_per_jam" name="harga_per_jam" placeholder="Harga/Jam" value="<?=$row_lapangan['harga_per_jam']; ?>" required />
        </p>
		
		<p>
            <label for="status">Status </label><br />
            <select name="status">
                <option value='1'>Tersedia</option>
                <option value="0">Terpakai</option>
            </select>
        </p>
        
        <p>
            <input type="submit" class="btn btn-success" value="SIMPAN" name="simpan" />
			<a href="index.php?hal=admin-master/kategori/list-lapangan" class="btn btn-danger">BATAL</a>
		</p>
		</form>
	   </div>
	 </section>
	</div>
</div>

