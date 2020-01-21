<!-- page content --> 
        <div role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Dashboard Restitusi</h3>
              </div>
            </div>
          



            <!--   <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="date" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                   </span>
                  </div>
                </div>
              </div>
            </div> -->

        
            <div class="clearfix"></div>

            <div class="row">
            <div class="x_content">
              <a href="<?=base_url('index.php/DashadminSiswa/index');?>"><button type="button" class="btn btn-primary">Tambah Restitusi</button></a>
              </div>
            </div>
            
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

                    <table id="tabel-data" class="table basic-striped">
                      <thead>
                        <tr>
                          <!-- <th>No</th>-->
                          <th>Tanggal</th>
                          <th>NIP</th>
                          <th>Nama</th>
                          <th>No. Restitusi</th>
                          <th>Formulir SPPD</th>
                          <th>Tiket Pesawat</th>
                          <th>Kwitansi Tiket Pesawat</th>
                          <th>Boarding Pass</th>
                          <th>Kwitansi Penginapan</th>
                          <th>SPPD Manual</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php $no=1; foreach($berita as $a){ ?>
                        <tr>
                         <!--  <th scope="row"><?= $no++?></th> -->
                          <td><?= $a['tgl_post']?></td>
                          <td><?= $a['nip']?></td>
                          <td><?= $a['nama_pegawai']?></td>
                          <td><?= $a['no_restitusi']?></td>
                          
                          <td>
                              <img style="width: 100px;" style="height: 100px"  src="<?php echo base_url("gambar/".$a['tiket_pesawat'])  ?>">
                          </td>

                          <td>
                          
                              <img style="width: 100px;" style="height: 100px"  src="<?php echo base_url("gambar/".$a['tiket_hotel'])  ?>">
                          </td>

                          <td>
                          
                              <img style="width: 100px;" style="height: 100px"  src="<?php echo base_url("gambar/".$a['foto3'])  ?>">
                          </td>

                          <td>
                          
                              <img style="width: 100px;" style="height: 100px"  src="<?php echo base_url("gambar/".$a['foto4'])  ?>">
                          </td>

                          <td>
                          
                              <img style="width: 100px;" style="height: 100px"  src="<?php echo base_url("gambar/".$a['foto5'])  ?>">
                          </td>

                          <td>
                          
                              <img style="width: 100px;" style="height: 100px"  src="<?php echo base_url("gambar/".$a['foto6'])  ?>">
                          </td>
                         
                          <td>
                            
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
        </div>


            <script>
  $(document).ready(function(){
    $('#tabel-data').DataTable();
});
  </script>

        <!-- /page content