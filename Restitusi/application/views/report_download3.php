<!DOCTYPE html>
<html lang="en">
<head>
    <style> 

    	body{
        	margin: 1cm;
        }

        #header_pln_kiri { 
            width:100%;
            float: left;
        }

        #header_pln_kiri img{

            background-repeat:no-repeat;
            float:left;
            height: 88px;
            width: 60px;
        }

        #header_pln_kiri h3{
            font:Tahoma, Geneva, sans-serif;
            margin-left:70px;
            margin-top: 0px;
            margin-bottom: 0px;
            text-align:left;
        }

        #header_pln_kiri p{

            font-size:14px;
            margin-left:70px;
            margin-top: 0px;
            margin-bottom: 0px;
            text-align:left;
        }

        #body p{
        	margin-right: 90px;
        	margin-left: 0px;
        	margin-top: 0px;
        	margin-bottom: 0px;
        	padding: 0px;
            font-size: 13pt;
            text-align: right;
        }

        #head p{
        	line-height: 10px;
        	text-align: left;
        	font-size: 13pt;
        	margin-top: 10px;
        }

		#text-ttd{
            float:left;
        }

        #text-ttd img{
            float:left;
            width: 250px;
            height: 150px;
        }

        #text-ttd-name{
        	padding-top: 150px;
        }

        #text-ttd2{
            float:right;
            padding-right: 70px;
        }

        #text-ttd22{
            float:right;
            padding-right: 50px;
        }

        #text-ttd2 img{
            float:left;
            width: 250px;
            height: 150px;
        }

        #kiri {
            width:50%;
            height:100px;
            background-color:#FF0;
            float:left;
        }

        #kiri img{
            width:50%;
            height:100px;
            background-color:#FF0;
            float:left;
        }

        #kanan p{
            margin-top: 0px;
            width:50%;
            height:100px;
            background-color:#0C0;
            float:right;
        }

        #kanan img{
            margin-top: 0px;
            width:50%;
            height:100px;
            background-color:#0C0;
            float:right;
        }

        #customers {
		  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		  border: 0px solid #ffffff;
		}

		#customers2 {
		  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		#customers2 td{
		  border: 1px solid #ddd;
		  padding: 8px;
		}


		#customers2 th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: center;
		  background-color: #4CAF50;
		  color: white;
		}

		#table{
			padding-top: 5px;
		}

		#table2{
			padding-top: 5px;
		}

		#isi{
			margin-top: 100px;
		}

   
    </style>

    <meta charset="utf-8">
    <title>Berkas Restitusi</title>
    
</head>
<body>
    <div id="header_pln_kiri"> 

        <img src="C:\xampp\htdocs\Restitusi\gambar\Logo_PLN.png" >

        <div>

            <h3>PT. PLN (PERSERO)<br>PEMBANGKITAN DAN PENYALURAN SULAWESI<br>UNIT PELAKSANA PENGATUR BEBAN SULSELRABAR</h3>
            <p>Jl. Letjend Hertasning Blok B Makassar | Telpon : (0411)440055-550066 <br>Call Center PLN : 123 | Website : www.pln.co.id | Kotak Pos : 90222</p>

            <hr width="100%" align="left">
        </div>
    </div>

    <div id="body">
    	<p><?php
			date_default_timezone_set('Asia/Jakarta');
			$tgl=date('d-m-Y');echo "Makassar, ".$tgl;
		?>
		</p>
	</div>

    <div id="text-ttd">

    	<table id="table">
            <tr>
                <td>Nomor</td>
                <td> : </td>
                <td> </td>
            </tr>

            <tr>
                <td>Lamp.</td>
                <td> : </td>
                <td>1 (satu) Berkas</td>
            </tr>

            <tr>
                <td>Perihal</td>
                <td> : </td>
                <td><span style="font-weight:bold; text-decoration: underline;"><i>Permohonan Perjalanan Dinas</i></span></td>
            </tr>
        </table>
    	<!-- <p align="left">Nomor : </p>
    	<p align="left">Lampiran : </p>
    	<p align="left">Perihal. : </p> -->

    </div>

    <div id="text-ttd22">
    	<table id="table2">
            <tr>
                <td align="left">Kepada Yth :</td>
            </tr>

            <tr>
                <td align="left"><span style="font-weight: bold;">Manager PT. PLN (Persero)</span></td>
            </tr>

            <tr>
                <td align="left"><span style="font-weight: bold;">UP2B SULSELRABAR</span></td>
            </tr>
        </table>
    	<!-- <p>Kepada Yth :<br><b>Manajer PT. PLN (Persero)<br>UPD2B Sulselrabar<br>di<br>Makassar</b></p> -->
    </div>

    <div id="isi">
        
        <p>Sehubungan dengan adanya kegiatan
            <?php $no=1; foreach($restitusi_agenda as $a){ ?>
                <?= $a['agenda']?>
            
            di kantor <?= $a['tempat_tujuan']?>, maka dengan ini diberitahukan bahwa : 
            <?php } ?> 
        </p>

        <table id="customers2" width="100%">
            <tr>
                <th width="5%">No</th>
                <th>Nama</th>
                <th width="20%">No. Induk</th>
                <th>Jabatan</th>
            </tr>

            <?php $no=1; foreach($restitusi_agenda as $a){ ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $a['name']?></td>
                <td><?= $a['nip']?></td>
                <td><?= $a['jabatan']?></td>
            </tr>
             <?php } ?>
        </table>

        <p>Ditugaskan untuk melakukan perjalan dinas sebagai berikut :</p>

        <table id="customers">
            <tr>
                <td align="Center" width="5%">a.</td>
                <td align="left" width="40%">Tempat tujuan </td>
                <td align="Center"  width="5%">: </td>
                <td align="left"><?php $no=1; foreach($restitusi_agenda as $a){ ?>
                    <?= $a['tempat_tujuan']?>
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <td align="Center" width="5%">b.</td>
                <td align="left">Alat angkutan yang digunakan </td>
                <td align="Center"  width="5%">: </td>
                <td align="left"><?php $no=1; foreach($restitusi_agenda as $a){ ?>
                    <?= $a['angkutan']?>
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <td align="Center" width="5%">c.</td>
                <td align="left">Lama perjalanan dinas </td>
                <td align="Center"  width="5%">: </td>
                <td align="left"><?php $no=1; foreach($restitusi_agenda as $a){ ?>
                    <?= $a['lama_sppd']?>
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <td align="Center" width="5%">d.</td>
                <td align="left">Tanggal berangkat </td>
                <td align="Center"  width="5%">: </td>
                <td align="left"><?php $no=1; foreach($restitusi_agenda as $a){ ?>
                    <?= $a['tgl_berangkat']?>
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <td align="Center" width="5%">e.</td>
                <td align="left">Tanggal kembali </td>
                <td align="Center"  width="5%">: </td>
                <td align="left"><?php $no=1; foreach($restitusi_agenda as $a){ ?>
                    <?= $a['tgl_pulang']?>
                    <?php } ?>
                </td>
            </tr>

             <tr>
                <td align="Center" width="5%">f.</td>
                <td align="left">Atas beban/biaya </td>
                <td align="Center"  width="5%">: </td>
                <td align="left">UP2B Sulselrabar</td>
            </tr>

            <tr>
                <td align="Center" width="5%">g.</td>
                <td align="left">Maksud perjalanan dinas </td>
                <td align="Center"  width="5%">: </td>
                <td align="left"><?php $no=1; foreach($restitusi_agenda as $a){ ?>
                    <?= $a['agenda']?>
                    <?php } ?>
                </td>
            </tr>

        </table>

        <p>Sehubungan dengan hal tersebut di atas. harap dapat diterbitkan Surat Perintah Perjalanan Dinas untuk pegawai
        yang bersangkutan.</p>

    </div>

   <!--  <div id="text-ttd">
        <p align="Center">Mengetahui,<br>MANAGER</p>
        <img src="C:\xampp\htdocs\Restitusi\gambar\ttd.jpg">
        <p align="Center">GOKLAS BATAPAN MUDA</p>
    </div>

    <div id="text-ttd2">
        <p align="Center">Dibuat Oleh,<br>ASMAN FASOP</p>
        <img src="C:\xampp\htdocs\Restitusi\gambar\ttd.jpg">
        <p align="Center">ANWARUDDIN</p>
    </div> -->

    <div id="text-ttd">
    	<p>Mengetahui,<br>MANAGER</p>
    	<img src="C:\xampp\htdocs\Restitusi\gambar\ttd.jpg">

    	<div id="text-ttd-name">
    		<p>GOKLAS BATAPAN MUDA</p>
    	</div>

    </div>

    <div id="text-ttd2">
    	<p>Dibuat Oleh,<br>ASMAN FASOP</p>
    	<img src="C:\xampp\htdocs\Restitusi\gambar\ttd.jpg">

    	<div id="text-ttd-name">
    		<p>ANWARUDDIN</p>
    	</div>

    </div>
</body>
</html>