<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Penindakan</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM tbl_penindakan WHERE id='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Nomor Pelapor</td> <td><?= $data['no_pelapor'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Penindak</td> <td><?= $data['penindakan'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Penindakan</td> <td><?= $data['tgl_penindakan'] ?></td>
                        </tr>
						<tr>
                            <td>Tanggal Selesai</td> <td><?= $data['tgl_selesai'] ?></td>
                        </tr>
                        <tr>
                            <td>Lama Penindakan</td> <td><?= $data['lama_penindakan'] ?></td>
                        </tr>
						<tr>
                            <td>Keterangan</td> <td><?= $data['keterangan'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=penindakan&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Penindakan </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

