<!-- page content -->
        <div role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Tambahkan User</h3>
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
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Silahkan Input User</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
          <div class="x_content">
          <br/>

          <form role="form" method="post" action="<?=base_url('index.php/C_Pegawai/uploadUser')?>" enctype="multipart/form-data" class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">NIP <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="nip" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <br>

             <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Nama <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="nama_pegawai" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <br>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Email <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="email" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <br>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Password <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <br>

             <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Jabatan <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="Jabatan" value="Pegawai" required="required" disabled class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            
            <!-- <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Level User <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
              <select name="level_user" required="required" class="form-control col-md-7 col-xs-12">
                <option value="">-- Pilih Level User --</option>
                <option value="admin">Admin</option>
                <option value="pegawai">Pegawai</option>
              </select>
            </div>
           </div> -->
            
         <!-- <br>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Nama Pegawai <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="text" name="nama_pegawai" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div> -->

           <br>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Alamat <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <br> 
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Jenis Kelamin <span class="required">*</span></label>
              <div class="col-md-10 col-sm-6 col-xs-12">
              <select name="jk" required="required" class="form-control col-md-7 col-xs-12">
                <option value="" selected="selected" disabled>-- Pilih Jenis Kelamin --</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
           </div>

           <!-- <br>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">No. Hp <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="text" name="no_hp" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
 -->
          <br>
          <div class="form-group" >
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Upload Foto <span class="required">*</span>
            </label>
            <div class="control-label col-md-2 col-sm-3 col-xs-12">
              <input type="file" name="foto_pegawai" multiple="multiple">
            </div>
          </div>

          <br>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a href="<?=base_url('index.php/C_Pegawai');?>"> <button class="btn btn-primary" type="button">Batalkan</button></a>
              <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Kirim</button>
            </div>
          </div>

        </form></div></div></div></div></div>
        <!-- /page content -->