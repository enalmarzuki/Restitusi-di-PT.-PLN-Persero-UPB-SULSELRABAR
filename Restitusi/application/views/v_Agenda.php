<!--page content --> 
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
                    <h2>Tabel Agenda</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                    	
                      <a href="<?=base_url('index.php/C_Restitusi/index');?>" class="btn btn-success">Kembali</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="tabel-data" class="table table-striped">
                      <thead>
                        <tr>
                          
                           
                            <!-- <th>No. Trip</th> -->
                            <th>Tujuan</th>
                            <th>Tempat Tujuan</th>
                            <th>Agenda</th>
                            <th>Tanggal Berangkat</th>
                            <th>Tanggal Pulang</th>
                            <th>Lama SPPD</th>
                            <th>Kendaraan</th>
                            <th>Biaya Transportasi</th>
                            <th>Biaya Penginapan</th>
                            <th>Jumlah Biaya</th>
                            <th>Aksi</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                       <?php $no=1; foreach($restitusi_agenda as $a){ ?>
                        <tr>
                         <!--  <th scope="row"><?= $no++?></th> -->

                          <!-- <td><?= $a['no_restitusi']?></td> -->

                          <td><?= $a['tujuan']?></td>

                          <td><?= $a['tempat_tujuan']?></td>

                          <td><?= $a['agenda']?></td>

                          <td><?= $a['tgl_berangkat']?></td>

                          <td><?= $a['tgl_pulang']?></td>

                          <td><?= $a['lama_sppd']?></td>

                          <td><?= $a['angkutan']?></td>

                          <td><?php echo "Rp. ".number_format($a['biaya_transportasi'], 0, ',', '.'); ?></td>

                        

                          <td><?php echo "Rp. ".number_format($a['biaya_penginapan'], 0, ',', '.'); ?></td>

                          <td><?php echo "Rp. ".number_format($a['jumlah'], 0, ',', '.'); ?></td>

                          <td>
                          	<a href="<?=base_url('index.php/c_report/laporan_pdf3')?>/<?= $a['no_restitusi']?>" class="btn btn-success">Download</a>
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

        <!-- /page content