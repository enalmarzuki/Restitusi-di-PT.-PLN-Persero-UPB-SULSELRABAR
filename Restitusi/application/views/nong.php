<!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<label><h2><b>Join 2 Table CodeIgniter</b></h2></label>
<table>
  <tr>
    <th>No.</th>
    <th>nip</th>
    <th>nama</th>
    <th>nomor restitusi</th>    
  </tr>
  <?php 
  $no=1; 
  foreach ($join2 as $row) { ?>
  <tr>
  <td><?php echo $no++;?></td>
  <td><?php echo $row->nip;?></td>
  <td><?php echo $row->name;?></td>
  <td><?php echo $row->no_restitusi;?></td>
  </tr>
    <?php } ?>
    
</table>

</body>
</html>