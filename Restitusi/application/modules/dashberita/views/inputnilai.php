<!-- page content -->
        <div role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Input Nilai</h3>
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
                <h2>Silahkan Input Nilai</h2>
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

                <form role="form" method="post" action="<?=base_url('dashberita/updateBerita')?>" enctype="multipart/form-data" class="form-horizontal form-label-left">

                <input value="<?= $berita['id_berita'];?>" type="hidden" name="id_berita">
                <input value="<?= $berita['foto_berita'];?>" type="hidden" name="foto_berita">

                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Bhs. Indonesia <span class="required">*</span>
                    </label>
                    <div class="col-md-10 col-sm-6 col-xs-12">
                      <input type="text" name="bindo" value="<?= $berita['bindo'];?>" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Matematika <span class="required">*</span>
                    </label>
                    <div class="col-md-10 col-sm-6 col-xs-12">
                      <input type="text" name="mtk" value="<?= $berita['mtk'];?>" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Bhs. Inggris <span class="required">*</span>
                    </label>
                    <div class="col-md-10 col-sm-6 col-xs-12">
                      <input type="text" name="bhs_inggris" value="<?= $berita['bhs_inggris'];?>" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  
            <br>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="<?=base_url('dashberita');?>"> <button class="btn btn-primary" type="button">Batalkan</button></a>
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Kirim</button>
              </div>
            </div>

          </form>
          <!-- /page content -->