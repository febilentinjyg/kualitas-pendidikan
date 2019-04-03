<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Tingkat Pelayanan';
?>
<!-- DataTables CSS -->
<head>

  <!-- Bootstrap 3.3.7 -->
  <link href="http://localhost/tugasAkhir/vendor/bower/admin-lte/dist/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="http://localhost/tugasAkhir/vendor/bower/admin-lte/dist/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">

</head>

<script src="http://localhost/tugasAkhir/vendor/bower-asset/datatables/media/js/jquery.js"></script>

  <section class="content">                    
      <div class="box-body" style=" overflow-x : scroll;">
          <table id="example1" class="table table-bordered table-striped" style="width:1000px !important;">
              <thead>
                  <tr >
                      <th>Kota/Kabupaten</th>
                      <th colspan="3">RMG</th>
                      <th colspan="3">RMS</th>
                      <th colspan="3">RMK</th>
                      <th colspan="3">RKRK</th>
                      <th colspan="3">PRKB</th>
                      <th colspan="3">PGLM</th>
                  </tr>
                  <tr>
                    <th></th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $i=0; 
                  foreach ($output as $key => $value) {
                      if($value['indikator'] == 'RMG'){
                        echo '<tr>';
                        echo '<td>'.$value['nama_kota'].'</td>'; 
                        echo '<td>'.$value['rendah'].'</td>';
                        echo '<td>'.$value['tinggi'].'</td>';
                        echo '<td>'.$value['sangat_tinggi'].'</td>';
                      }
                      if($value['indikator'] == 'RMS'){
                        echo '<td>'.$value['rendah'].'</td>';
                        echo '<td>'.$value['tinggi'].'</td>';
                        echo '<td>'.$value['sangat_tinggi'].'</td>'; 
                      }
                      if($value['indikator'] == 'RMK'){
                        echo '<td>'.$value['rendah'].'</td>';
                        echo '<td>'.$value['tinggi'].'</td>';
                        echo '<td>'.$value['sangat_tinggi'].'</td>';
                      }
                      if($value['indikator'] == 'RKRK'){
                        echo '<td>'.$value['rendah'].'</td>';
                        echo '<td>'.$value['tinggi'].'</td>';
                        echo '<td>'.$value['sangat_tinggi'].'</td>';
                      }
                      if($value['indikator'] == 'PRKB'){
                        echo '<td>'.$value['rendah'].'</td>';
                        echo '<td>'.$value['tinggi'].'</td>';
                        echo '<td>'.$value['sangat_tinggi'].'</td>';
                      }
                      if($value['indikator'] == 'PGLM'){
                        echo '<td>'.$value['rendah'].'</td>';
                        echo '<td>'.$value['tinggi'].'</td>';
                        echo '<td>'.$value['sangat_tinggi'].'</td>';
                        echo '</tr>';
                      }
                      // echo '<td>'.$value['apm'].'</td>';
                      // echo '<td>'.$value['apk'].'</td>';
                      // echo '<td>'.$value['apk'].'</td>';
                      
                      $i++;
                  } 
              ?>  
              </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                    <th>R</th>
                    <th>T</th>
                    <th>ST</th>
                  </tr>
                  <tr >
                      <th>Kota/Kabupaten</th>
                      <th colspan="3">RMG</th>
                      <th colspan="3">RMS</th>
                      <th colspan="3">RMK</th>
                      <th colspan="3">RKRK</th>
                      <th colspan="3">PRKB</th>
                      <th colspan="3">PGLM</th>
                  </tr>
                </tfoot>
          </table>
        </div><!-- /.box-body -->
    </section>


<!-- DataTables -->
<script src="http://localhost/tugasAkhir/vendor/bower-asset/datatables/media/js/jquery.dataTables.min.js"></script>

<script src="http://localhost/tugasAkhir/vendor/bower-asset/datatables/dataTables.bootstrap.min.js"></script>

<script src="http://localhost/tugasAkhir/vendor/bower/adminlte/dist/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js"></script>

<!-- page script -->
<script>
  jQuery( document ).ready(function( $ ) {
    $('#example1').DataTable();
});
</script>
