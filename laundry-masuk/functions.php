<?php
    require('../koneksi.php');

    function tampil($query) {
        global $conn;

        $result = mysqli_query($conn, $query);

        $rows = [];

        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function tambah($data) {
        global $conn;
    
        $nama = htmlspecialchars($data["nama_konsumen"]);
        $berat = floatval($data["berat"]);
        $kategori = htmlspecialchars($data["kategori"]);
    
        // Determine the price based on category
        if ($kategori == "Cuci") {
            $harga = 4000;
        } elseif ($kategori == "Express") {
            $harga = 8000;
        } elseif ($kategori == "Cuci Setrika") {
            $harga = 6000;
        } elseif ($kategori == "Dry Cleaning") {
            $harga = 25000;
        } elseif ($kategori == "Karpet") {
            $harga = 30000;
        } elseif ($kategori == "Sprei") {
            $harga = 20000;
        } elseif ($kategori == "Gorden") {
            $harga = 25000;
        } else {
            $harga = 0; // Handle invalid category if necessary
        }
    
    
        $total = $berat * $harga;
    
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO transaksi(masuk, keluar, nama_konsumen, berat, kategori, status, harga_satuan, harga_total) VALUES (NOW(), NOW() + INTERVAL 3 DAY, ?, ?, ?, 'Belum diambil', ?, ?)");
        $stmt->bind_param("sdssd", $nama, $berat, $kategori, $harga, $total);
        $stmt->execute();
        
        return mysqli_affected_rows($conn);
    }
    

    function ubah($data) {
        global $conn;
    
        $id = intval($data["id"]);
        $nama = htmlspecialchars($data["nama_konsumen"]);
        $berat = floatval($data["berat"]);
        $kategori = htmlspecialchars($data["kategori"]);
    
        // Determine the price based on the category
        if ($kategori == "Normal") {
            $harga = 4000;
        } elseif ($kategori == "Expert") {
            $harga = 8000;
        } else {
            $harga = 0; // Handle invalid category if necessary
        }
    
        $total = $berat * $harga;
    
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE transaksi SET nama_konsumen = ?, berat = ?, kategori = ?, harga_satuan = ?, harga_total = ? WHERE id = ?");
        $stmt->bind_param("sdsdsi", $nama, $berat, $kategori, $harga, $total, $id);
        $stmt->execute();
    
        return mysqli_affected_rows($conn);
    }
    

    function hapus($id) {
        global $conn;
        
        $id = intval($id); // Ensure id is an integer

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM transaksi WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return mysqli_affected_rows($conn);
    }
?>
