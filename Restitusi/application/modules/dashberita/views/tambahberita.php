<!-- page content -->
        <div role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Tambahkan Siswa</h3>
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
              <h2>Silahkan Input Biodata Siswa</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
          <br/>

          <form role="form" method="post" action="<?=base_url('dashberita/uploadBerita')?>" enctype="multipart/form-data" class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">NIM <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="nim" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <br>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Password <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="pass" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>


            <br>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Nama Siswa <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="nama_siswa" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <br> 
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span></label>
              <div class="col-md-10 col-sm-6 col-xs-12">
              <select name="jk" required="required" class="form-control col-md-7 col-xs-12">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
           </div>

            <br>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Alamat <span class="required">*</span></label>
             <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
              </div>
           </div>

           <br>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Nama Bapak / Wali <span class="required">*</span></label>
             <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="nama_bapak_w" required="required" class="form-control col-md-7 col-xs-12">
              </div>
           </div>

           <br>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Nama Ibu / Wali <span class="required">*</span></label>
             <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="nama_ibu_w" required="required" class="form-control col-md-7 col-xs-12">
              </div>
           </div>

           <br>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Pekerjaan Bapak / Wali <span class="required">*</span></label>
             <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="pekerjaan_bapak_w" required="required" class="form-control col-md-7 col-xs-12">
              </div>
           </div>

           <br>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Pekerjaan Ibu / Wali <span class="required">*</span></label>
             <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="pekerjaan_ibu_w" required="required" class="form-control col-md-7 col-xs-12">
              </div>
           </div>

           <br>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">No. Hp Orang Tua / Wali <span class="required">*</span></label>
             <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name=" no_hp" required="required" class="form-control col-md-7 col-xs-12">
              </div>
           </div>       

          <br>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Upload Foto <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="file" name="foto_berita">
            </div>
          </div>
          <br>
          
          </div>
          <br>

          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a href="<?=base_url('dashberita');?>"> <button class="btn btn-primary" type="button">Batalkan</button></a>
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" class="btn btn-success">Kirim</button>
            </div>
          </div>

        </form>
        <!-- /page content -->