<!-- page content -->
        <div role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard Guru</h3>
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
              <a href="<?=base_url('dashagenda/tambahagenda');?>"><button type="button" class="btn btn-primary">Tambah Guru</button></a>
            </div>
            
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Guru</h2>
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
                          <!-- <th>No</th>-->
                          <th>NIP</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>Mata Pelajaran</th>
                          <th>No. Handphone</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($agenda as $a){ ?>
                        <tr>
                          <!--<th scope="row"><?= $no++?></th>-->
                          <td><?= $a['nip']?></td>
                          <td><?= $a['nama_guru']?></td>
                          <td><?= $a['jk']?></td>
                          <td><?= $a['alamat']?></td>
                          <td><?= $a['mata_pelajaran']?></td> 
                          <td><?= $a['no_hp']?></td>
                          <td>
                            <a href="<?=base_url('dashagenda/editAgenda')?>/<?= $a['nip']?>" class="btn btn-success">Edit</a>
                            <a href="<?=base_url('dashagenda/deleteAgenda')?>/<?= $a['nip']?>" class="btn btn-danger">Hapus</a>
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