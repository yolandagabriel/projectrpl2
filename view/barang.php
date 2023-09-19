<?php
//$halaman = "Barang";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';

//cara memanggil C_barang 
include_once '../controller/C_barang.php';

$barang = new C_barang();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <a href="tambah_barang.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang</a>

        <h1 class="h3 mb-2 text-gray-800">Barang</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
    
    <div class="card-body">
        <div class="table-responsive">
        <div class="dataTables_length" id="dataTable_length">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="dataTable_length">
                    <label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
     
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        entries
                </select></label>
                </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                        </label>
               </div>
               </div>
                    </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
            <?php 
             $nomor = 1;
             foreach($barang->tampil() as $b){
            ?>
                <tr>
                    <td><?= $nomor++ ?></td>
                    <td><?= $b->nama_barang ?></td>
                    <td><?= $b->qty ?></td>
                    <td><?= $b->harga ?></td>
                    <td><?= $b->photo ?></td>
                    <td>
                        <center>
                            <a href="edit_barang.php?id<?= $b->id ?>"><button type="button" 
                           class="btn btn-round btn-primary">Edit</button></a>
    
                           <a onclick="return confirm('Apakah yakin data akan dihapus?')" 
                           href="../routes/r_barang.php?id=<?= $b->id ?>&aksi=hapus" 
                           class="btn btn-round btn-danger">Hapus</a>
                        </center>
                    </td>
              
                </tr>
                <?php } ?>

                </tbody>

            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>

<?php
include_once 'template/footer.php';
?>




