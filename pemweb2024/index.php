<?php
//sertakan file koneksi ke database 
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input
    if (empty($_POST['name']) || empty($_POST['email'])) {
        $message = "Mohon isi semua kolom.";
    } else {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $address = htmlspecialchars($_POST['address']);
        $phone = htmlspecialchars($_POST['phone']);

        // Simpan data ke database
        try {
            $stmt = $pdo->prepare("INSERT INTO rentals (name, email, address, phone) VALUES (:name, :email, :addres, :phone)");
            $stmt->execute(['name' => $name, 'email' => $email, 'address' => $address, 'phone' => $phone]);
            $message = "Terima kasih, $name! Penyewaan Anda telah diterima.";
        }catch (Exception $e) {
            $message = "Terjadi kesalahan: " . $e->getMessage();
        }

        // Menggunakan alert box untuk menampilkan pesan
        echo "<script>
        alert('$message');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furdor Adventure</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   <header>
<nav>
    <div class="logo">
        <img src="img/logo.png" alt="Furdor Adventure" width="100"> 

    </div>
    <ul class="nav links">
        <li><a href="#tentangkami" >tentang kami</a></li>
        <li><a href="#product">product</a></li>
        <li><a href="#testimoni" >testimoni</a></li>
        <li><a href="#location" >lokasi</a></li>
        <li><a href="#contact" >kontak</a></li>
     </ul>
     <a href="#"   class="rent-now">RENT NOW</a>
    </nav>
    <div class="hero-section">
        <h1>Furdor Adventure</h1>
        <p>selamat datang di rental perlengkapan pendaki kami
             destinasi terpercaya bagi para petualang yang siap menjelajahi
            keindahan alam dengan mendaki gunung</p>
        <a herf="#" class="rent-now">RENT NOW</a>
        </div>
    </header>
    
    
    <!--section about -->

    <section id="about">
        <h2>tentang kami</h2>
        <p>Furdor Adventure adalah penyedia layanan penyewaan 
            alat camping terpercaya,dengan fokus pada pengalaman luar
            ruangan yang tak terlupakan,kami menyediakan alat camping
            berkualitas untuk memastikan
            anda merasakan petualangan dengan maksimal
        </p>
        <div class="features">
             <div class="feature-item">
                <h1>harga terjangkau</h1>
                <p>furdor menyediakan harga sewa
                    terjangkau dan terhitung sangat ramah dikantong</p>
                </div>
                <div class="feature-item">
                    <h3>Bisa Diantar</h3>
                    <p>furdoor menyediakan alat camping yang bisa diantar kerumah anda</p>

                </div>
                <div class="feature-item">
                    <h3>Higienis Dan Wangi</h3>
                    <p>Furdoor menyediakan alat camping yang higienis dan wangi</p>

                </div>
            </div>
        </section>

        <!--product section-->
        <section id="product">
            <h2>produk kami</h2>
            <div class="product-slider">
            <div class="product-item">
                <img src="img/tenda-java.png" alt="tenda dome borneo 4 red">
                <p>tendaki - tenda dome borneo 4 red</p>
                <p>Rp.800.0000/hari - Kabupaten Bojonegoro</p>
            </div>

            <div class="product-item">
                <img src="img/tas-douter.png" alt="Tas Douter AC Lite 50+20" width="120">
                <p>tas douter ac lite 50+20</p>
                <p>Rp.900.000/hari - Kabupaten Bojonegoro</p>
        </div>

        <div class="product-item">
            <img src="img/tanda-java.png" alt="Tanda java 4 light">
            <p>Tanda java 4 light </p>
            <p>Rp.650.00/hari - Kabupaten Bojonegoro</p>
        </div>
        </div>
    </section>

    <!--testiominal section-->
    <section id="testimonials">
        <h2>testimoni</h2>
        <div class="testimonial-item">
            <p>"Tempat Persewaan Perlengkapan Outdoor Di Kecamatan Bululawang.Lokasi Yang Tidak Jauh
                Cocok Apabila Ada Teman Yang Hendak Melakukan Aktivitas Camping Atau Outbon Di Daerah"
                <p>-Clarisa Merise, Local Guide</p>
        </div>
    </section>
   
    <!--Location Section-->
    <section id="location">
        <h2>Lokasi kami</h2>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.1763777781844!2d112.62114897434886!3d-8.039870994102025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6286b634c552b%3A0x54db1268a1c2d7cd!2sBululawang%2C%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1692617173747!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!--Formulir penyewaan-->
    <section>
        <h2>Formulir penyewaan</h2>
        <form id="rent-form" method="POST" action="">
            <input type="text" id="name" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="alamat" name="alamat" placeholder="Alamat" required>
            <input type="no.telp" name="no.telp" placeholder="No.telp" required>
           <button type="submit">Submit</button>
        </form>
    </section>

    <!--Footer Section-->
    <footer>
        <div class="join-us">
            </h2>Ayo Gabung Bersama Kami</h2>
            <a href="#" class="join-now">Gabung Sekarang</a>
        </div>
        <div class="footer-info">
            <p>Kunjungi Kami</p>
            <p>JL. Suropati Raya No. 20 RT,29 RW,07 Kecamatan bululawang</p>
            <p>Malang,Jawa Timur 65171</p>
            <p>0857-1267-8678</p>
            <p>furdor-adventure@gmail.com</p>
        </div>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>    
    