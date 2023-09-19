<?php
//$halaman = "Barang";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';

include_once '../controller/C_barang.php';

$barang = new C_barang();
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form edit barang</h6>
    </div>
        <div class="table-responsive">
        <body class="bg-gradient-primary">

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-12">
                    <div class="p-5">
                      
                    <form action="../routes/r_barang.php?aksi=edit" method="POST" class="user" 
                    enctype="multipart/form-data">

            <?php 
             $nomor = 1;
             foreach($barang->edit('id') as $e){
            ?>
                
                        <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="id"
                                    placeholder="id" name="id" hidden>
                            </div>
                
                        <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama"
                                    placeholder="nama barang" name="nama">
                            </div>
                
                         <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="jumlah"
                                    placeholder="jumlah" name="qty">
                            </div>
                
                         <div class="form-group">
                                <input type="number" class="form-control form-control-user" id="harga"
                                    placeholder="harga/satuan" name="harga">
                            </div>

                        <div class="form-group">
                                <input type="file" class="form-control-file" id="photo"
                                    placeholder="photo" name="photo">
                            </div>
                    
                        <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-user btn-block"
                                value ="Next" id="" name="selanjutnya">
                            </div>
                            <?php } ?>
                        </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>

</div>
 </div>
 </div>
</div>
</div>

<?php
include_once 'template/footer.php';
?>