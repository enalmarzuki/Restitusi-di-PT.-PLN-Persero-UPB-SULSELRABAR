<!-- page content --> 
        <div role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard Report</h3>
              </div>
            </div>
          
            <div class="clearfix"></div>
            
            
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Report</h2>
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
                         
                          <!-- <th>Tanggal</th> -->
                          <th>NIP</th>
                          <th>Nama</th>
                          <th>No. Restitusi</th>
                          <th>Formulir SPPD</th>
                          <th>Tiket Pesawat</th>
                          <th>Tiket Pesawat</th>
                          <th>Boarding Pass</th>
                          <th>Kwitansi Penginapan</th>
                          <th>SPPD Manual</th>
                         <!--  <th>Komentar</th> -->
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach($restitusi_report as $a){ ?>
                        <tr>
                         
                         <!--  <td><?= $a['tgl_post']?></td> -->
                          <td><?= $a['nip']?></td>
                          <td><?= $a['name']?></td>
                          <td><?= $a['no_restitusi'];?></td>
                          
                          <td>
                             <!--  <img style="width: 100px;" style="height: 100px"  src="<?php echo base_url("gambar/".$a['tiket_pesawat'])  ?>"> -->
                             <img width="100px" height="100px;"  src="<?= $a['foto_formulir_sppd'];?>" >
                          </td>

                          <td>
                              <img width="100px" height="100px;"  src="<?= $a['foto_tiket_pesawat']?>" >
                          </td>

                          <td>
                              <img width="100px" height="100px;"  src="<?= $a['foto_kwitansi_tiket']?>" >
                          </td>

                          <td>
                              <img width="100px" height="100px;"  src="<?= $a['foto_boarding_pass']?>" >
                          </td>

                          <td>
                              <img width="100px" height="100px;"  src="<?= $a['foto_kwitansi_penginapan']?>" >
                          </td>

                          <td>
                              <img width="100px" height="100px;"  src="<?= $a['foto_sppd_manual']?>" >
                          </td>

                          <!-- <td><?= $a['komentar'];?></td> -->
                         
                          <td>
                          
                            <a href="<?=base_url('index.php/c_report/laporan_pdf')?>/<?= $a['no_restitusi']?>" class="btn btn-success">Download</a>

                            <a href="<?=base_url('index.php/c_report/laporan_pdf2')?>/<?= $a['no_restitusi']?>" class="btn btn-success">Download2</a>

                          </td>
                        </tr>
                       <?php } ?>
                      </tbody>
                    </table>
                  
                </div>
              </div>
            </div>
</div>
              <div class="clearfix"></div>

            </div>
        </div>
        