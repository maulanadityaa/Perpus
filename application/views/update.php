<div class="container">
    <div><br></div>
    <div class="card bg-light mb-3 o-hidden border-0 shadow-lg my-5">
        <?php foreach ($libra as $row) { ?>
            <div class="card-header text-white bg-primary ">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link bg-light" href="<?php echo base_url(); ?>libra/update/<?php echo $row->id_buku ?>">
                            <h4>Edit Buku</h4>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url(); ?>libra/update_process">

                    <div class="form-group">
                        <label for="id_buku">ID Buku</label>
                        <input type="number" class="form-control" id="id_buku" name="id_buku" value="<?= $row->id_buku ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $row->judul ?>">
                        <small class="text-danger"><?= form_error('judul'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $row->penulis ?>">
                        <small class="text-danger"><?= form_error('penulis'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $row->kategori ?>">
                        <small class="text-danger"><?= form_error('kategori'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="stcok">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="<?= $row->stock ?>">
                        <small class="text-danger"><?= form_error('stock'); ?></small>
                    </div>

                    <p align="right"><button type="submit" class="btn btn-outline-primary">Update</button>
                        <a href="<?php echo base_url(); ?>libra/" class="btn btn-outline-warning">Kembali</a></p>
                <?php } ?>
                </form>
            </div>
    </div>
</div>