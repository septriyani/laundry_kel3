<?php 
    session_start();
    
    require 'functions.php';

    if(!isset($_SESSION["login"])) {
        header("Location: ../login");
        exit;
    }

    if(isset($_POST['tambah'])){
        if(tambah($_POST) > 0) {
            header("Location: tambah-sukses.php");
        } 
        else {
            header("Location: tambah-gagal.php");
        }
    }

    include ('../view/header.php');
?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                            
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Data Laundry Masuk</div>
                    <div class="panel-body">                                    
                        <form class="form-horizontal" role="form" action="" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama Konsumen :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_konsumen" placeholder="Bheta" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Berat (kg) :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="berat" placeholder="2" required>
                                </div>
                            </div>
                            <div class="form-group">
    <label class="control-label col-sm-2">Kategori :</label>
    <div class="col-sm-10">
        <select class="form-control" name="kategori" id="kategori" onchange="updateHarga()">
            <option value="Cuci" selected>cuci</option>
            <option value="Express">express</option>
            <option value="Cuci Setrika">cuci setrika</option>
            <option value="Dry Cleaning">dry cleaning</option>
            <option value="Karpet">karpet</option>
            <option value="Sprei">sprei</option>
            <option value="Gorden">gorden</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2">Harga (/kg):</label>
    <div class="col-sm-10">
        <input type="text" name="harga" id="harga" class="form-control" placeholder="4000" readonly>
    </div>
</div>

<script>
    function updateHarga() {
        var kategori = document.getElementById("kategori").value;
        var hargaInput = document.getElementById("harga");
        
        if(kategori == "Cuci") {
            hargaInput.value = "4000";
        } else if(kategori == "Express") {
            hargaInput.value = "15000";
        }else if(kategori == "Cuci Setrika") {
            hargaInput.value = "6000";
        } else if(kategori == "Dry Cleaning") {
            hargaInput.value = "25000";
        } else if(kategori == "Karpet") {
            hargaInput.value = "30000";
        } else if(kategori == "Sprei") {
            hargaInput.value = "20000";
        } else if(kategori == "Gorden") {
            hargaInput.value = "25000";
        }
    }

    // Initialize the price when the page loads
    window.onload = updateHarga;
</script>

                            <div class="text-center">
                                <button class="btn btn-primary" name="tambah" value="Tambah" type="submit">Tambah</button>
                            </div>
                        </form>                                    
                    </div>
                </div>                                                            
            </div>
        </div>
    </div>
</div>
            
<?php
    include('../view/footer.php');
?>