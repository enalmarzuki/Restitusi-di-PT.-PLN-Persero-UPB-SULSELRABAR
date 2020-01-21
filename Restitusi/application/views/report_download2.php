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
        	margin-top: 0px;
            font-size: 13pt;
            text-align: right;
        }

        #head p{
        	line-height: 10px;
        	text-align: left;
        	font-size: 13pt;
        	margin-top: 10px;
        }

        #text-isi p{
        	text-align: justify;
        	font-size: 13pt;
        	
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
            padding-right: 50px;
        }

        #text-ttd2 img{
            float:left;
            width: 250px;
            height: 150px;
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


    <main>
        <div id="container">
         
            <div id="body">

                <p><?php
	                	date_default_timezone_set('Asia/Jakarta');
	                	$tgl=date('d-m-Y');echo "Makassar, ".$tgl;
                	?>
                </p>
            </div>

                <div id="head">

	                <p>Kepada Yth.</p>
	                <p>	<?php $no=1; foreach($restitusi as $a){ ?>
	                		<?= $a['name']?>
	                	<?php } ?>  
	                </p>
	                <p>Di Tempat</p>
	            </div>

	            <div id="text-isi">
	            	<p line-height="20px";>Dengan Hormat,</p>
	            	<p>Kami selaku Admin Restitusi SPPD telah menerima dan menyetujui berkas restitusi yang telah diajukan pada tanggal 
		            	<?php $no=1; foreach($restitusi as $a){ ?>
		                		<?= $a['tgl_post']?>
		                <?php } ?>. Adapun berkas yang dilampirkan yaitu sebagai berikut : </p>

		            <ol>
		            	<li>Formulir SPPD</li>
		            	<li>Tiket Pesawat PP</li>
		            	<li>Kwitansi Tiket Pesawat</li>
		            	<li>Boarding Pass</li>
		            	<li>Kwitansi Penginapan</li>
		            	<li>SPPD Manual</li>
		            </ol>

		            <p>Demikian surat persetujuan ini kami buat agar dapa dipergunakan sebagaimana mestinya. Atas perhatiannya kami ucapkan terima kasih.</p>
	            </div>

	            <div id="text-ttd">

	            	<p align="left">Mengetahui,<br>Supv. SDM dan Sekertariat</p>
                    <img src="C:\xampp\htdocs\Restitusi\gambar\ttd.jpg">

                    <div id="text-ttd-name">
                    	<p>NAMA SUPERVISOR</p>
                    </div>
	            	
	            </div>

                <div id="text-ttd2">

                    <p align="left">Dibuat Oleh,<br>Admin Restitusi SPPD</p>
                    <img src="C:\xampp\htdocs\Restitusi\gambar\ttd.jpg">
                    <div id="text-ttd-name">
                    	<p>NAMA ADMIN SPPD</p>
                    </div>
                </div>
            </div>
        </div>
    </main> 
</body>
</html>