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

          <form role="form" method="post" action="<?=base_url('dashuser/uploadUser')?>" enctype="multipart/form-data" class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Username <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <br>
         
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Email <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
           <br>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Nomor Telpon <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="text" name="nomor_telpon" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <br>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
         
          <br><br><br><br><br><br><br>

          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a href="<?=base_url('dashuser');?>"> <button class="btn btn-primary" type="button">Batalkan</button></a>
              <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Kirim</button>
            </div>
          </div>

        </form>
        <!-- /page content -->