<?php
date_default_timezone_set("Asia/Jakarta");
$selectDataPelanggan    = mysqli_query($koneksi, "SELECT * FROM pelanggan");
$selectDataLapangan     = mysqli_query($koneksi, "SELECT * FROM lapangan WHERE status>0");

//unset($_SESSION['shopping_cart']);
//var_dump($_SESSION['shopping_cart']);


if (isset($_POST['submit'])) {
    if($_POST['action'] == 'proses') {

       $id_lapangan = $_POST['id_lapangan'];

       $row_lapangan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM lapangan WHERE id_lapangan=$id_lapangan"));

       $cartArray = array(
            $id_lapangan => array(
                'id_pegawai' => $_SESSION['id_pegawai'],
                'id_pelanggan' => $_POST['id_pelanggan'],
                'id_lapangan' => $_POST['id_lapangan'],
                'harga_per_jam' => $row_lapangan['harga_per_jam'],
                'tanggal_pesan' => date("Y-m-d"),
                'tanggal_booking' => date("Y-m-d H:i:s",strtotime($_POST['tanggal_booking'])),
                'durasi' => $_POST['durasi']
            )
       );

       if (empty($_SESSION['shopping_cart'])) {
            $_SESSION['shopping_cart'] = $cartArray;
            mysqli_query($koneksi, "INSERT INTO temp_cart VALUES('', ".$_SESSION['id_pegawai'].", ".$_POST['id_pelanggan'].", ".$_POST['id_lapangan'].", ".$row_lapangan['harga_per_jam'].", '".date("Y-m-d")."', '".date("Y-m-d H:i:s",strtotime($_POST['tanggal_booking']))."','".$_POST['durasi']."')")or die(mysqli_error($koneksi));
            mysqli_query($koneksi, "UPDATE lapangan SET status=0 WHERE id_lapangan=".$_POST['id_lapangan']);
       }else{
            $array_keys = array_keys($_SESSION['shopping_cart']);
            if (in_array($id_lapangan, $array_keys)) {
                $_SESSION['id_lapangan'] = $id_lapangan;
            }else{
                $_SESSION['shopping_cart'] = array_merge(
                    $_SESSION['shopping_cart'], $cartArray
                );

                mysqli_query($koneksi, "INSERT INTO temp_cart VALUES('', ".$_SESSION['id_pegawai'].", ".$_POST['id_pelanggan'].", ".$_POST['id_lapangan'].", ".$row_lapangan['harga_per_jam'].", '".date("Y-m-d")."', '".date("Y-m-d H:i:s",strtotime($_POST['tanggal_booking']))."','".$_POST['durasi']."')")or die(mysqli_error($koneksi));
                mysqli_query($koneksi, "UPDATE lapangan SET status=0 WHERE id_lapangan=".$_POST['id_lapangan']);
            }
       }
       header('location: '.$_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    if(!empty($_SESSION['shopping_cart'])){
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            if($_POST['id_lapangan'] == $value['id_lapangan']){
                unset($_SESSION['shopping_cart'][$key]);
                mysqli_query($koneksi, "UPDATE lapangan SET status=1 WHERE id_lapangan=".$_POST['id_lapangan']);
                mysqli_query($koneksi, "DELETE FROM temp_cart WHERE id_lapangan=".$_POST['id_lapangan']);
            }
            if(empty($_SESSION["shopping_cart"])){
                unset($_SESSION["shopping_cart"]);
            }
        }
        header('location: '.$_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['save']) && $_POST['action'] == 'save') {
    mysqli_query($koneksi, "INSERT INTO transaksi VALUES('', ".$_POST['id_pegawai'].", ".$_POST['id_pelanggan'].", '".$_POST['tanggal_pesan']."', ".$_POST['total_bayar'].")")or die(mysqli_error($koneksi));
    $last_id = mysqli_insert_id($koneksi);
    for ($a=0; $a < count($_POST['id_lapangan']); $a++) {
        mysqli_query($koneksi, "INSERT INTO detail_transaksi 
            VALUES(".$last_id.",".$_POST['id_lapangan'][$a].",
             '".$_POST['tanggal_booking'][$a]."', 
             '".$_POST['durasi'][$a]."')")or die(mysqli_error($koneksi));
    }
    unset($_SESSION['shopping_cart']);
    mysqli_query($koneksi, "DELETE FROM temp_cart WHERE id_pelanggan=".$_POST['id_pelanggan']." AND id_pegawai=".$_POST['id_pegawai'])or die(mysqli_error($koneksi));
    echo "<script>
        alert('Pemesanan Lapangan Berhasil');location.href='".$_SERVER['HTTP_REFERER']."';
    </script>";
}
?>
<div class="row" style="padding: 15px;padding-bottom: 0px;">
	<div class="col-md-12">
		<div class="panel panel-default" style="margin-bottom: 0px;">
			<div class="panel-body" style="padding: 10px;border-radius: 2px;">
			<form action="" method="POST">
                <input type="hidden" name="action" value="proses">
            <div class="row">
                <div class="form-group col-md-6">
                <label for="pelanggan">Pelanggan</label>
                <select id="pelanggan" name="id_pelanggan" class="form-control" <?php if(isset($_SESSION['shopping_cart'])) echo "readonly"; ?>>
                    <?php 
                        while($row_pelanggan = mysqli_fetch_array($selectDataPelanggan)){
                            if (isset($_SESSION['shopping_cart'])) {
                                foreach ($_SESSION['shopping_cart'] as $cart)
                                    if ($cart['id_pelanggan'] == $row_pelanggan['id_pelanggan']) {
                                         echo "<option value='".$row_pelanggan['id_pelanggan']."' selected>".$row_pelanggan['nama_pelanggan']."</option>";
                                     } 
                            }else{
                                echo "<option value='".$row_pelanggan['id_pelanggan']."'>".$row_pelanggan['nama_pelanggan']."</option>";
                            }
                        }
                    ?>
                </select>
                </div>
                <div class="form-group col-md-6">
                <label for="tgl">Tanggal Untuk Booking</label>
                <input type="datetime-local" id="tgl" name="tanggal_booking" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                <label for="durasi">Durasi Jam</label>
                <input type="time" class="form-control" name="durasi" id="durasi" min="01:00" max="24:00" value="01:00">
                </div>
                <div class="form-group col-md-6">
                <label for="lapangan">Lapangan</label>
                <select id="lapangan" name="id_lapangan" class="form-control">
                    <?php 
                        while($row_lapangan = mysqli_fetch_array($selectDataLapangan)){
                            echo "<option value='".$row_lapangan['id_lapangan']."'>".$row_lapangan['nama_lapangan']."</option>";
                        }
                    ?>
                </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Pesan</button>
            </form>
            <hr>
            <h2>Kartu</h2>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Pelanggan</th>
                    <th>Lapangan</th>
                    <th>Tanggal Booking</th>
                    <th>Harga/Jam</th>
                    <th>Durasi</th>
                    <th>Subtotal</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        if(isset($_SESSION['shopping_cart'])){
                            $nomor = 1;
                            $grand_total = 0;
                            foreach ($_SESSION['shopping_cart'] as $cart) {
                                $selectDataPelanggan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan=".$cart['id_pelanggan']));
                                $selectDataLapangan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM lapangan WHERE id_lapangan=".$cart['id_lapangan']));

                                echo "<tr>";
                                echo "<td>".$nomor++."</td>";
                                echo "<td>".$selectDataPelanggan['nama_pelanggan']."</td>";
                                echo "<td>".$selectDataLapangan['nama_lapangan']."</td>";
                                echo "<td>".date("Y-m-d H:i",strtotime($cart['tanggal_booking']))."</td>";
                                echo "<td>Rp. ".number_format($cart['harga_per_jam'], 0, ",", ".")."</td>";
                                echo "<td>".(int)date("H",strtotime($cart['durasi']))." Jam</td>";
                                echo "<td>Rp. ".number_format($cart['harga_per_jam']*date("H",strtotime($cart['durasi'])), 0, ",", ".")."</td>";
                                echo "<td>
                                    <form method='POST' action=''>
                                        <input type='hidden' name='id_lapangan' value='".$cart['id_lapangan']."'>
                                        <input type='hidden' name='action' value='delete'>
                                        <button type='submit' class='btn btn-danger btn-xs'>
                                            <span class='glyphicon glyphicon-trash'> </span>
                                        </button>
                                    </form>
                                </td>";
                                $grand_total += $cart['harga_per_jam']*date('H',strtotime($cart['durasi']));
                                echo "</tr>";
                            }
                                echo "<tr>";
                                echo "<td colspan='5'></td>";
                                echo "<td><b>Grand Total</b></td>";
                                echo "<td>Rp. ".number_format($grand_total, 0, ",", ".")."</td>";
                                echo "</tr>";

                    ?>
                                <tr>
                                    <td colspan="7"></td>
                                    <td>
                                        <form method="POST" action="">
                                            <?php 
                                            foreach ($_SESSION['shopping_cart'] as $cart)
                                            ?>
                                                <input type="hidden" name="id_pegawai" value="<?=$cart['id_pegawai'];?>">
                                                <input type="hidden" name="id_pelanggan" value="<?=$cart['id_pelanggan'];?>">
                                                <input type="hidden" name="tanggal_pesan" value="<?=$cart['tanggal_pesan']?>">
                                                <input type="hidden" name="total_bayar" value="<?=$grand_total?>">
                                            <?php
                                            foreach ($_SESSION['shopping_cart'] as $cart) {
                                            ?>
                                                <input type="hidden" name="id_lapangan[]" value="<?=$cart['id_lapangan']?>">
                                                <input type="hidden" name="tanggal_booking[]" value="<?=$cart['tanggal_booking']?>">
                                                <input type="hidden" name="durasi[]" value="<?=$cart['durasi']?>">
                                            <?php
                                            }
                                            ?>
                                            <input type="hidden" name="action" value="save">
                                            <button type="submit" class="btn btn-default btn-sm" name="save"><i class="glyphicon glyphicon-save"></i> Pesan</button>
                                        </form>
                                    </td>
                                </tr>
                    <?php
                        }
                    ?>
                </tbody>
              </table>
			</div>
		</div>
	</div>
</div>