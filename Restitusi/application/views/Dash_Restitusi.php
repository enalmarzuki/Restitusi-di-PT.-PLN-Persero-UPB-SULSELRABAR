<!-- page content --> 
        <div role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard Restitusi</h3>
              </div>
            </div>
          
            <div class="clearfix"></div>

            <!-- <div class="row">
            <div class="x_content">
              <a href="<?=base_url('index.php/DashadminSiswa/index');?>"><button type="button" class="btn btn-primary">Tambah Restitusi</button></a>
            </div> -->
            
            
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Restitusi</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="tabel-data" class="table table-striped">
                      <thead>
                        <tr>
                          <div class="a">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>No. Restitusi</th>
                            <th>Status</th>
                            <th>Komentar</th>
                            <th width="250px">Aksi</th>
                          </div>
                        </tr>
                      </thead>
                      <tbody>
                       <?php $no=1; foreach($restitusi as $a){ ?>
                        <tr>
                          <th scope="row"><?= $no++?></th>

                          <td><?= $a['tgl_post']?></td>

                          <td><?= $a['nip']?></td>

                          <td><?= $a['name']?></td>

                          <td> <a href="<?=base_url('index.php/C_Restitusi/report')?>/<?= $a['no_restitusi']?>"><span style=" color: #0000FF"><?= $a['no_restitusi']?></span></td>

                          <td><?= $a['status']?></td>

                          <td><?= $a['komentar']?></td>
                         
                          <td>

                            <a href="<?=base_url('index.php/C_Restitusi/agendarestitusi')?>/<?= $a['no_restitusi']?>" class="btn btn-primary">Agenda</a>
                           
                            <a href="<?=base_url('index.php/C_Restitusi/editrestitusi')?>/<?= $a['no_restitusi']?>" class="btn btn-success">Update</a>

                            <a href="<?=base_url('index.php/C_Restitusi/deleterestitusi')?>/<?= $a['no_restitusi']?>" class="btn btn-danger">Hapus</a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
               </div>
                </div>
              </div>
            </div>
          </div>
              <div class="clearfix"></div>
            </div>
        </div>
<script>
  $(document).ready(function(){
    $('#tabel-data').DataTable();
  });
</script>

        <!-- /page content -->