<main role="main" class="container">
    <div>
        <div><br>
            <?php
            $role = $this->session->role;
            $kondisi = $this->session->kondisi;
            ?>
        </div>
        <div class="card bg-light mb-3 o-hidden border-0 shadow-lg my-5">
            <div class="card-header bg-primary">
                <ul class="nav nav-tabs card-header-tabs" role="tablist" id="myTab">
                    <li class="nav-item">
                        <a class="nav-link active bg-light" href="<?php echo base_url(); ?>libra/mengembalikan">
                            <h4>Detail Buku</h4>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                    </tr>
                    <?php
                    foreach ($libra as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row->id_buku; ?></td>
                            <td><?php echo $row->judul; ?></td>
                            <td><?php echo $row->penulis; ?></td>
                            <td><?php echo $row->kategori; ?></td>
                            <td><?php echo $row->stock; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <div class="btn-toolbar float-right">
                    <a href="<?php echo base_url(); ?>libra" class="btn btn-outline-warning mr-2" type="button">Kembali</a>
                    <!-- Button mengembalikan -->
                    <a href="<?php echo base_url(); ?>libra/mengembalikan_process" class="btn btn-outline-primary mr-2">Kembalikan Buku</a>
                </div>
            </div>
        </div>
    </div>
</main>

</body>

</html>