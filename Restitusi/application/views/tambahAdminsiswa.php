<!-- page content -->
        <div role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Tambahkan Restitusi</h3>
              </div>
            </div>

             <!--  <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                   <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Silahkan Input Restitusi Anda</h2>
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

<!-- <script src="<?=base_url('assets/backend/js/jquery.min.js');?>"></script> 
<script>
  $(function () {
    $("#chkPassport").click(function () {
      if ($(this).is(":checked")) {
        $("#dvPassport").show();   
        $("input.check2").prop("disabled", true);
        $("input.check3").prop("disabled", true);
      } 
      else {
        $("#dvPassport").hide();
        $("input.check2").prop("disabled", false);
        $("input.check3").prop("disabled", false);
      }
          
    });

    $("#chkPassport2").click(function () {
      if ($(this).is(":checked")) {
        $("#dvPassport2").show();   
         $("input.check1").prop("disabled", true);
        $("input.check3").prop("disabled", true);
      } 
      else {
        $("#dvPassport2").hide();
        $("input.check1").prop("disabled", false);
        $("input.check3").prop("disabled", false);
      }
          
    });

    $("#chkPassport3").click(function () {
      if ($(this).is(":checked")) {
        $("#dvPassport3").show();   
         $("input.check1").prop("disabled", true);
        $("input.check2").prop("disabled", true);
      } 
      else {
        $("#dvPassport3").hide();
        $("input.check1").prop("disabled", false);
        $("input.check2").prop("disabled", false);
      }
          
    });
  });
</script> -->




     <form role="form" method="post" action="<?php echo base_url();?>index.php/DashadminSiswa/uploadAdminsiswa" enctype="multipart/form-data" class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">NIP <span class="required">*</span>
              </label>
              <div class="col-md-10 col-sm-6 col-xs-12">
                <input type="text" name="nip" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <br> 
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">Nama<span class="required">*</span></label>
              <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="text" name="nama_pegawai" required="required" class="form-control col-md-7 col-xs-12">
            </div>
           </div>

           <br> 
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-3 col-xs-12">No. Restitusi<span class="required">*</span></label>
              <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="text" name="no_restitusi" required="required" class="form-control col-md-7 col-xs-12">
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


      <!-- <div class="form-group">
        
        <label class="control-label col-md-2 col-sm-3 col-xs-12">Jenis Perjalanan Dinas<span class="required">*</span></label>
          <div class="col-md-10 col-sm-6 col-xs-12">

          <label for="chkPassport">
            <input type="checkbox" id="chkPassport" name="cb1" value="1" class="check1"/>Perjalanan Dinas Tanpa Restitusi
          </label>

          <br>
          <label for="chkPassport2">
            <input type="checkbox" id="chkPassport2" name="cb2" value="2" class="check2"/>Perjalanan Menggunakan Restitusi
          </label>

          <br>
          <label for="chkPassport3">
            <input type="checkbox" id="chkPassport3" name="cb3" value="2" class="check3"/>Perjalanan Menggunakan Restitusi B 
          </label>
          </div>
      </div> -->
      

<!-- Perjalanan Dinas Tanpa Restitusi  -->
     <!--  <div id="dvPassport" style="display: none">

          <div class="form-group" >
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Upload Foto <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="file" name="userfile[6]" multiple="multiple">
            </div>
          </div>

           <div class="form-group" >
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Upload Foto <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="file" name="userfile[7]" multiple="multiple">
            </div>
          </div>


      </div> -->

<!-- Perjalanan Menggunakan Restitusi -->
     <!--  <div id="dvPassport2" style="display: none">

         <div class="form-group" >
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Upload Foto <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="file" name="userfile[8]" multiple="multiple">
            </div>
          </div>
        
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Pembayaran Hotel<span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="file" name="userfile[9]" multiple="multiple">
            </div>
          </div> 

          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Pembayaran Makan<span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="file" name="userfile[10]" multiple="multiple">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Pembayaran Tiket Pesawat<span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-6 col-xs-12">
              <input type="file" name="userfile[11]" multiple="multiple">
            </div>
          </div>

      </div> -->


<!-- Perjalanan Menggunakan Restitusi B -->

     <!--  <div id="dvPassport3" style="display: none"> -->

         <div class="form-group" >
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Formulir Laporan SPPD<span class="required">*</span>
            </label>
            <div class="control-label col-md-2 col-sm-2 col-xs-12">
             <input type="file" name="userfile[0]" multiple="multiple">
            </div>
          </div>
        
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Tiket Pesawat (PP)<span class="required">*</span>
            </label>
            <div class="control-label col-md-2 col-sm-3 col-xs-12">
              <input type="file" name="userfile[1]" multiple="multiple">
            </div>
          </div> 

          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Kwitansi Pembelian Tiket<span class="required">*</span>
            </label>
            <div class="control-label col-md-2 col-sm-3 col-xs-12">
              <input type="file" name="userfile[2]" multiple="multiple">
            </div>
          </div> 

          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Boarding Pass<span class="required">*</span>
            </label>
            <div class="control-label col-md-2 col-sm-3 col-xs-12">
              <input type="file" name="userfile[3]" multiple="multiple">
            </div>
          </div> 

          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">Kwitansi Biaya Penginapan<span class="required">*</span>
            </label>
            <div class="control-label col-md-2 col-sm-3 col-xs-12">
              <input type="file" name="userfile[4]" multiple="multiple">
            </div>
          </div> 

          <div class="form-group">
            <label class="control-label col-md-2 col-sm-3 col-xs-12">SPPD Manual<span class="required">*</span>
            </label>
            <div class="control-label col-md-2 col-sm-3 col-xs-12">
              <input type="file" name="userfile[5]" multiple="multiple">
            </div>
          </div> 

        <br>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a href="<?=base_url('index.php/DashadminSiswa');?>"> <button class="btn btn-primary" type="button">Batalkan</button></a>
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" class="btn btn-success">Kirim</button>
            </div>
          </div>
          </form>
</div></div></div></div></div>
       <!-- /page content -->