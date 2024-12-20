<?php
session_start();

    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../index.php");
        exit;
    }
    include ('../view/header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">DATA LAPORAN LAUNDRY KELUAR</div>
                        <div class="panel-body">                                    
                            <table class="table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Masuk</th>   
                                <th>Tanggal Keluar</th>                                 
                                <th>Nama Konsumen</th>
                                <th>Berat (kg)</th>
                                <th>Kategori</th>  
                                <th>Status</th>
                                <th>diambil</th>
                                <th>Harga Satuan</th>
                                <th>Harga Total</th>
                                </tr>            
		<?php 
		$no = 1;
		$sql = mysqli_query($conn,"select * from transaksi");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['masuk']; ?></td>
            <td><?php echo $data['keluar']; ?></td>
			<td><?php echo $data['nama_konsumen']; ?></td>
            <td><?php echo $data['berat']; ?></td>
            <td><?php echo $data['kategori']; ?></td>
            <td><?php echo $data['status']; ?></td>
            <td><?php echo $data['diambil']; ?></td>
            <td><?php echo $data['harga_satuan']; ?></td>
            <td><?php echo $data['harga_total']; ?></td>
            
		</tr>
		<?php 
		}
		?>
	</table>
    <script>
		window.print();
	</script>
</body>
</html>