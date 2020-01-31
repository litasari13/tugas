<?php
$nope=$_GET['nope'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM tbl_penindakan WHERE no_pelapor ='$nope'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tanggal Selesai Penindakan</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="no_pelapor" class="col-sm-3 control-label">Nomor Pelapor</label>
                            <div class="col-sm-9">
								<input type="text" name="no_pelapor" value="<?=$data['no_pelapor']?>" class="form-control" id="inputEmail3" placeholder="Nomor Pelapor" readonly="true">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="penindakan" class="col-sm-3 control-label">Nama Penindak</label>
                            <div class="col-sm-9">
                                <input type="text" name="penindakan" value="<?=$data['penindakan']?>" class="form-control" id="inputEmail3" placeholder="Nama Penindak" readonly="true">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="tgl_penindakan" class="col-sm-3 control-label">Tanggal Penindakan</label>
                            <div class="col-sm-9">
                                <input type="text" name="tgl_penindakan" value="<?=$data['tgl_penindakan']?>" class="form-control" id="inputEmail3" placeholder="Tanggal Penindakan" readonly="true">
                            </div>
                        </div> 
						
						<div class="form-group">
                            <label for="tgl_selesai" class="col-sm-3 control-label">Tanggal Selesai</label>
                            <div class="col-sm-3">
                                <input type="date" name="tgl_selesai" class="form-control" id="inputEmail3" placeholder="Tanggal Selesai">
                            </div>
                        </div> 
						
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Tanggal</button>
								<a href="?page=penindakan&actions=tampil" class="btn btn-danger"><span class="fa fa-ban"></span> Batal</a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>

<?php 
if($_POST){
    //Ambil data dari form
	$tgl_penindakan =$_POST['tgl_penindakan'];
		$potTgl = substr($tgl_penindakan,8,2);
		$potBln = substr($tgl_penindakan,5,2);
		$potThn = substr($tgl_penindakan,0,4);
	$tgl_selesai=$_POST['tgl_selesai'];
		$potTglKem = substr($tgl_selesai,8,2);
		$potBlnKem = substr($tgl_selesai,5,2);
		$potThnKem = substr($tgl_selesai,0,4);
	$lama_penindakan = (($potThnKem - $potThn)*360)+(($potBlnKem - $potBln)*30)+($potTglKem - $potTgl);
    //buat sql
    $sql="UPDATE tbl_penindakan SET tgl_selesai='$tgl_selesai', lama_penindakan='$lama_penindakan' WHERE no_pelapor='$nope'";
	$sqlArsip="UPDATE tbl_pengaduan SET status='selesai' WHERE no_pelapor='$nope'";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");
	$queryArsip=  mysqli_query($koneksi, $sqlArsip) or die ("SQL Simpan Arsip Error");
    if ($query){
        echo "<script>window.location.assign('?page=penindakan&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>