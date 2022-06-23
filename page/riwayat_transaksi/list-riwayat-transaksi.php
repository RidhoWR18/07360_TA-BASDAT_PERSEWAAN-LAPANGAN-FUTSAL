<div class="list-jenis">
	<div class="row">
	 <div class="col-sm-12">
	  <section class="panel panel-default">
		<header class="panel-heading">RIWAYAT TRANSAKSI</header>
		<div class="panel-body">
		  <table class="table table-bordered" id="example" style="text-align: center;">
			<thead>
			 <tr>
			  <th>
			   NO
			  </th>
			  <th>
			   PELANGGAN
			  </th>
			  <th>
			   PEGAWAI
			  </th>
			  <th>
			   LAPANGAN
			  </th>
			  <th>
			   TANGGAL PESAN
			  </th>
			  <th>
			   TANGGAL BOOKING
			  </th>
			  <th>
			   DURASI
			  </th>
			  <th>
			   TOTAL RUPIAH
			  </th>
			 </tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			$select_transaksi = mysqli_query($koneksi, "SELECT pelanggan.*, pegawai.*, lapangan.*, transaksi.*, detail_transaksi.* FROM transaksi 
				INNER JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id_pelanggan
				INNER JOIN pegawai ON transaksi.pegawai_id = pegawai.id_pegawai
				INNER JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id
				INNER JOIN lapangan ON detail_transaksi.lapangan_id = lapangan.id_lapangan");
			while($row_transaksi = mysqli_fetch_array($select_transaksi)){
			  echo '<tr>';
			  echo '<td>'.$no++.'</td>';
			  echo '<td style="text-align: left !important;">'.$row_transaksi['nama_pelanggan'].'</td>';
			  echo '<td style="text-align: left !important;">'.$row_transaksi['nama_pegawai'].'</td>';
			  echo '<td style="text-align: left !important;">'.$row_transaksi['nama_lapangan'].'</td>';
			  echo '<td style="text-align: left !important;">'.date("Y-m-d", strtotime($row_transaksi['tanggal_pesan'])).'</td>';
			  echo '<td style="text-align: left !important;">'.$row_transaksi['tanggal_booking'].'</td>';
			  echo '<td style="text-align: left !important;">'.(int)date("H", strtotime($row_transaksi['durasi'])).' Jam</td>';
			  echo '<td style="text-align: left !important;">Rp. '.number_format($row_transaksi['total_bayar'], 0, ",", ".").'</td>';
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