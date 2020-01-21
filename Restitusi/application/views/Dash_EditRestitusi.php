<!-- page content -->
  <div role="main">
      <div class="page-title">
        <div class="title_left">
          <h3>Persetujuan Restitusi</h3>
        </div>


        
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Silahkan Memberi Persetujuan</h2>
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

          <form role="form" method="post" action="<?=base_url('index.php/C_Restitusi/updaterestitusi')?>" enctype="multipart/form-data" class="form-horizontal form-label-left">

          <!-- <input value="<?= $restitusi['no_restitusi'];?>" type="hidden" name="no_restitusi"> -->
          <input value="<?= $restitusi['id_restitusi'];?>" type="hidden" name="id_restitusi"> 
          

          <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Id. Restitusi <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="id_restitusi" value="<?= $restitusi['id_restitusi'];?>" 
                required="required" class="form-control col-md-7 col-xs-12" disabled>
              </div>
            </div>
          

           <!--  <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">No. Restitusi <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="no_restitusi" value="<?= $restitusi['no_restitusi'];?>" 
                required="required" class="form-control col-md-7 col-xs-12" disabled>
              </div>
            </div> -->

           
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Status <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <select type="text" name="status" value=""
                  required="required" class="form-control col-md-7 col-xs-12">
                  <option value="" selected="selected" disabled>-- Pilih --</option>
                  <option value="Di Terima">Ya</option>
                  <option value="Di Tolak">Tidak</option>
                </select>
              </div>
            </div>

          
             <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Komentar <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="komentar" value="<?= $restitusi['komentar'];?>" 
                required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <!-- <br>
            <div class="form-group">
              <label for="chkPassport" class="control-label col-md-2 col-sm-3 col-xs-12">Komentar
                <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
              <textarea name="komentar" class="form-control" value="<?= $restitusi['komentar'];?>"  placeholder="Enter..." ></textarea>
            </div>
           </div> -->

            <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a href="<?=base_url('index.php/C_Restitusi');?>"> 
                <button class="btn btn-primary" type="button">Batalkan</button></a>
              <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Kirim</button>
            </div>
          </div>
      
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


        </form>
<!-- /page content -->



            

          


        