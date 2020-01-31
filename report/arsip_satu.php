<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Arsip</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT * FROM tbl_pengaduan WHERE id='" . $_GET ['id'] . "'";
        //proses query ke database
        $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
        //Merubaha data hasil query kedalam bentuk array
        $data = mysqli_fetch_array($query);
        ?>   

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Arsip Siskamling Air Joman </h2>
                        <h4>Jalan Air Joman Gg 366 <br> Air Joman, Sumatera Utara, 21212</h4>
                        <hr>
                        <h3>DATA ARSIP</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                            <tbody>
								<tr>
                                    <td>Nomor</td>  <td><?= $data['masalah'] ?></td>
                                </tr>
                                <tr>
                                    <td>Para Pihak</td>  <td><?= $data['nama_pelapor'] ?></td>
                                </tr>
								<tr>
                                    <td>Tanggal Mulai</td> <td><?= $data['tgl_masuk'] ?></td>
                                </tr>
								<tr>
                                    <td>Pengantar Berkas</td> <td><?= $data['pemberi'] ?></td>
                                </tr>
								<tr>
                                    <td>Penerima Berkas</td> <td><?= $data['penerima'] ?></td>
                                </tr>
                            </tbody>
                            <tfoot> 
                                <tr>
                                    <td colspan="2" class="text-right">
                                        Air Joman  <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Parto<strong></u><br>
                                        NIP.102871291416712
									</td>
								</tr>
							</tfoot> 
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>