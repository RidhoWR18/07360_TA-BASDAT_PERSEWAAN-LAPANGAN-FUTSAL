<?php

include('koneksi.php');

?>

<?php
if(isset($_POST['daftar'])){
  if(!empty($_POST['nama_pelanggan']) && !empty($_POST['notelp_pelanggan'])){
	  
    $namapelanggan = $_POST['nama_pelanggan'];
	$notelppelanggan = $_POST['notelp_pelanggan'];

    $insert_kategori = mysqli_query($koneksi,"INSERT INTO pelanggan VALUES('','$namapelanggan', '$notelppelanggan');");

    if( $insert_kategori ) {
		header('Location: ?hal=admin-master/pelanggan/list-pelanggan');
    }else{
        header('Location: index.php');
    }
  }else{
	echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	       <strong>Input gagal</strong></div>';  
  }
} 

$select_pelanggan = mysqli_query($koneksi,"SELECT * FROM pelanggan");
?>

<style>

ul.ui-autocomplete {
width: auto;
border: none;
}

ul.ui-autocomplete li.ui-menu-item {
font-size: 15px;
padding: 3px;
border: none;
}

ul.ui-autocomplete li.ui-menu-item:hover {
border: none;
}

input[type=text] {
  background-color: white;
  padding: 5px 5px 5px 10px;
  margin-bottom: 8px;
  
}

input[type=number] {
  background-color: white;
  padding: 5px 5px 5px 10px;
  margin-bottom: 8px;
  
}


</style>
<div class="list-jenis">
	<div class="row">
	 <div class="col-sm-12">
	  <section class="panel panel-default">
		<header class="panel-heading">LIST PELANGGAN</header>
		<div class="panel-body">	
		 <nav>
			<button type="button" data-target="#ModalAdd" data-toggle="modal" class="btn btn-primary">
			 Tambah Baru <i class="fa fa-plus"></i>
			</button>
		 </nav>
		 <br>
		  <table class="table table-bordered" id="example" style="text-align: center;">
			<thead>
			 <tr>
			  <th>
			   NO
			  </th>
			  <th>
			   NAMA PELANGGAN
			  </th>
			  <th>
			   NO TELP
			  </th>
			  <th>
			   AKSI
			  </th>
			 </tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			while($row_pelanggan = mysqli_fetch_array($select_pelanggan)){
			  echo '<tr>';
			  echo '<td>'.$no++.'</td>';
			  echo '<td style="text-align: left !important;">'.$row_pelanggan['nama_pelanggan'].'</td>';
			  echo '<td style="text-align: left !important;">'.$row_pelanggan['notelp_pelanggan'].'</td>';
			  echo "<td><a href='?hal=admin-master/pelanggan/edit-pelanggan&id=".$row_pelanggan['id_pelanggan']."' class='btn btn-warning' role='button'><i class='glyphicon glyphicon-pencil'></i></a>
                        <a href='#modal_delete' data-id='".$row_pelanggan['id_pelanggan']."' data-toggle='modal' class='btn btn-danger buang' role='button'><i class='glyphicon glyphicon-trash'></i></a>
					</td>";
			  echo '</tr>';
			 }
			?>
			</tbody>
			</table>
		</div>
	  </section>
	 </div>
	</div>
</div>
 
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Pelanggan</h4>
					</div>
					<div class="modal-body">
						<form action="" name="modal_popup" method="post">
							<br>
							<input name="nama_pelanggan" type="text" class="form-control" placeholder="Masukkan nama pelanggan" required />
							<br>
							<input name="notelp_pelanggan" type="text" class="form-control" placeholder="Masukkan nomor telepon pelanggan" required />
							<br>
							<div class="modal-footer">
								<button class="btn btn-default" name="daftar" type="submit">
									Tambah
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Batal
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Apa anda yakin ingin menghapus data ini?</h4>
					</div>
                    <div class="modal-body">
					  <div class="alert alert-warning">Data yang sudah dihapus
					  <br> tidak akan bisa dikembalikan lagi!</div>
					</div>					
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:right;">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a href="#" role="button" class="btn btn-danger" id="delete_link">Delete</a>
					</div>
				</div>
			</div>
		</div>
<script>
$('.buang').click(function(){
    var id=$(this).data('id');
    $('#delete_link').attr('href','?hal=admin-master/pelanggan/delete-pelanggan&id_pelanggan='+id);
})
</script>

