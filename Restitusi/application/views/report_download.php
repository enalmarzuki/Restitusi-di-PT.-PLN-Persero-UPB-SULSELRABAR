<!DOCTYPE html>
<html lang="en">
<head>
    <style> 

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

        #body {
            padding-top: 3cm;
        }

        #label-img {
            margin-left: 3px;
        }

        #label-img p{
          font-weight: bold; 
        }

        #img-1{
            height: 20,769cm;
            width: 27,728cm;
        }

        #img-1 img{
            height: 20cm;
            width: 10cm;    
        }

        #img-2 img{
            height: 25cm;
            width: 15cm;
        }
   
    </style>

    <meta charset="utf-8">
    <title>Berkas Restitusi</title>
    
</head>
    <div id="header_pln_kiri"> 

        <img src="C:\xampp\htdocs\Restitusi\gambar\Logo_PLN.png" >

        <div>

            <h3>PT. PLN (PERSERO)<br>PEMBANGKITAN DAN PENYALURAN SULAWESI<br>UNIT PELAKSANA PENGATUR BEBAN SULSELRABAR</h3>
            <p>Jl. Letjend Hertasning Blok B Makassar | Telpon : (0411)440055-550066 <br>Call Center PLN : 123 | Website : www.pln.co.id | Kotak Pos : 90222</p>

            <hr width="100%" align="left">
        </div>
    </div>

<body>
    <main>
        <div id="container">
           <!--  <h2 align="center">Berkas Restitusi</h2> -->
         
            <div id="body">
                <!-- <pre><?php print_r($dataku); ?></pre> -->

                <table>
                    <tr>
                        <?php $no=1; foreach($restitusi as $a){ ?>
                            <td>Nip</td>
                            <td>:</td>
                            <td><?= $a['nip']?></td>
                        <?php } ?>
                    </tr>

                    <tr>
                        <?php $no=1; foreach($restitusi as $a){ ?>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $a['name']?></td>
                        <?php } ?>
                    </tr>

                    <tr>
                        <?php $no=1; foreach($restitusi as $a){ ?>
                            <td>No. Restitusi</td>
                            <td>:</td>
                            <td><?= $a['no_restitusi']?></td>
                        <?php } ?>
                    </tr>

                </table>

                <div id="label-img">
                    <?php $no=1; foreach($restitusi as $a){ ?>
                     
                        <p>Formulir SPPD</p>

                        <div id="img-1">
                            <img width="500px" height="1000px"  src="C:\xampp\htdocs\Android\KoneksiPHPRestitusiPLN\uploads\Foto Formulir SPPD <?= $a['no_restitusi']?>.jpg">
                        </div>

                        <p>Tiket Pesawat PP</p>

                        <div id="img-2">
                            <img src="C:\xampp\htdocs\Android\KoneksiPHPRestitusiPLN\uploads\Foto Tiker Pesawat PP <?= $a['no_restitusi']?>.jpg">
                        </div>

                        <p>Kwitansi Tiket PP</p>

                        <div id="img-2">
                            <img src="C:\xampp\htdocs\Android\KoneksiPHPRestitusiPLN\uploads\Foto Kwitansi Tiket <?= $a['no_restitusi']?>.jpg">
                        </div>

                        <p>Boarding Pass</p>

                        <div id="img-2">
                            <img src="C:\xampp\htdocs\Android\KoneksiPHPRestitusiPLN\uploads\Foto Boarding Pass <?= $a['no_restitusi']?>.jpg">
                        </div>

                        <p>Kwitansi Penginapan</p>

                        <div id="img-2">
                            <img src="C:\xampp\htdocs\Android\KoneksiPHPRestitusiPLN\uploads\Foto Kwitansi Penginapan <?= $a['no_restitusi']?>.jpg">
                        </div>

                        <p>SPPD Manual</p>

                        <div id="img-2">
                            <img src="C:\xampp\htdocs\Android\KoneksiPHPRestitusiPLN\uploads\Foto SPPD Manual <?= $a['no_restitusi']?>.jpg">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main> 
</body>
</html>