<?php
$nope=$_GET['nope'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM tbl_pengaduan WHERE no_pelapor ='$nope'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Persetujuan</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="no_pelapor" class="col-sm-3 control-label">Nomor Siskamling</label>
                            <div class="col-sm-9">
								<input type="text" name="no_pelapor" value="<?=$data['no_pelapor']?>" class="form-control" id="inputEmail3" placeholder="Nomor Pelapor" readonly="true">
                            </div>
                        </div>

						<div class="form-group">
                            <label for="penindakan" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="penindakan" class="form-control" id="inputEmail3" placeholder="Nama Penidak">
                            </div>
                        </div>

						<div class="form-group">
                            <label for="tgl_penindakan" class="col-sm-3 control-label">Tanggal Dimulai</label>
                            <div class="col-sm-3">
                                <input type="date" name="tgl_penindakan" class="form-control" id="inputEmail3" placeholder="Tanggal Penindakan">
                            </div>
                        </div>

						 <div class="form-group">
                            <label for="ket" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" name="ket" class="form-control" id="inputEmail3" placeholder="Keterangan">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                               <button type="submit" name="simpan" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan </button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=pengaduan&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Arsip
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
 if(isset($_POST['simpan'])){
    //Ambil data dari form
    $no_pelapor=$_POST['no_pelapor'];
	$penindakan=$_POST['penindakan'];
	$tgl_penindakan=$_POST['tgl_penindakan'];
    $ket=$_POST['ket'];
    //buat sql
    $sql="INSERT INTO tbl_penindakan VALUES ('$no_pelapor','$penindakan','$tgl_penindakan','Belum Kembali','','$ket','')";
	$sqlArsip="UPDATE tbl_pengaduan SET status='Ditindak' WHERE no_pelapor='$nope'";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Peminjaman Error");
	$queryArsip=  mysqli_query($koneksi, $sqlArsip) or die ("SQL Simpan Arsip Error");
    if ($query){
        echo "<script>window.location.assign('?page=penindakan&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
