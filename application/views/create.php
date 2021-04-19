 <div class="container">
     <div><br><?php foreach ($id_buku as $maxId) { ?></div>
     <div class="card bg-light mb-3 o-hidden border-0 shadow-lg my-5">
         <div class="card-header bg-primary">
             <ul class="nav nav-tabs card-header-tabs" role="tablist" id="myTab">
                 <li class="nav-item">
                     <a class="nav-link  bg-light  active" href="<?php echo base_url(); ?>libra/create">
                         <h4>Tambah Buku</h4>
                     </a>
                 </li>
             </ul>
         </div>
         <div class="card-body">
             <form method="post" action="<?php echo base_url(); ?>libra/create_process">
                 <div class="form-group">
                     <label for="id_buku">ID Buku</label>
                     <input type="number" class="form-control" id="id_buku" name="id_buku" value="<?= $maxId->id_buku + 1;
                                                                                                } ?>">
                     <small class="text-danger"><?= form_error('id_buku'); ?></small>
                 </div>

                 <div class="form-group">
                     <label for="judul">Judul</label>
                     <input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul'); ?>">
                     <small class="text-danger"><?= form_error('judul'); ?></small>
                 </div>

                 <div class="form-group">
                     <label for="penulis">Penulis</label>
                     <input type="text" class="form-control" id="penulis" name="penulis" value="<?= set_value('penulis'); ?>">
                     <small class="text-danger"><?= form_error('penulis'); ?></small>
                 </div>

                 <div class="form-group">
                     <label for="kategori">Kategori</label>
                     <input type="text" class="form-control" id="kategori" name="kategori" value="<?= set_value('kategori'); ?>">
                     <small class="text-danger"><?= form_error('kategori'); ?></small>
                 </div>

                 <div class="form-group">
                     <label for="stcok">Stock</label>
                     <input type="number" class="form-control" id="stock" name="stock" value="<?= set_value('stock'); ?>">
                     <small class="text-danger"><?= form_error('stock'); ?></small>
                 </div>

                 <p align="right"><button type="submit" class="btn btn-outline-primary">Tambah</button>
                     <a href="<?php echo base_url(); ?>libra/" class="btn btn-outline-warning">Kembali</a></p>
             </form>
         </div>
     </div>
 </div>