<!-- page content -->
        <div role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard Siswa</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
            <div class="x_content">
              <a href="<?php echo base_url();?>index.php/DashadminSiswa/tambahAdminsiswa"><button type="button" class="btn btn-primary">Tambah Siswa</button></a>
            </div>
            
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Siswa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table basic-striped">
                      <thead>
                        <tr>
                          <!--<th>No</th>-->
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Jenis Kelamin</th>
                          <th>Bhs. Indonesia</th>
                          <th>Matematika</th>
                          <th>Bhs. Inggris</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($siswa as $a){ ?>
                        <tr>
                          <!--<th scope="row"><?= $no++?></th>-->
                          <td><?= $a['nim']?></td>
                          <td><?= $a['nama_siswa']?></td>
                          <td><?= $a['alamat']?></td>
                          <td><?= $a['jk']?></td>
                          <td><?= $a['bindo']?></td>
                          <td><?= $a['mtk']?></td>
                          <td><?= $a['bhs_inggris']?></td>
                          <td>
                            <a href="<?=base_url('index.php/DashadminSiswa/editAdminsiswa')?>/<?= $a['nim']?>" class="btn btn-success">Edit</a>
                            <a href="<?=base_url('index.php/DashadminSiswa/deleteAdminsiswa')?>/<?= $a['nim']?>" class="btn btn-danger">Hapus</a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

            </div>
        </div>
        <!-- /page content -->