<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Kualitas Output';
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
          <table id="example1" class="table table-bordered table-striped" >
              <thead>
                  <tr >
                      <th>ID Kota</th>
                      <th colspan="3">AM</th>
                      <th colspan="3">AL</th>
                      <th colspan="3">APS</th>
                      <th colspan="3">AU</th>
                      <th colspan="3">RIO</th>
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
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $i=0; 
                  foreach ($output as $key => $value) {
                      if($value['indikator'] == 'AM'){
                        echo '<tr>';
                        echo '<td>'.$value['nama_kota'].'</td>'; 
                        echo '<td>'.number_format($value['rendah'],3).'</td>';
                        echo '<td>'.number_format($value['tinggi'],3).'</td>';
                        echo '<td>'.number_format($value['sangat_tinggi'],3).'</td>';
                      }
                      if($value['indikator'] == 'AL'){
                        echo '<td>'.number_format($value['rendah'],3).'</td>';
                        echo '<td>'.number_format($value['tinggi'],3).'</td>';
                        echo '<td>'.number_format($value['sangat_tinggi'],3).'</td>'; 
                      }
                      if($value['indikator'] == 'APS'){
                        echo '<td>'.number_format($value['rendah'],3).'</td>';
                        echo '<td>'.number_format($value['tinggi'],3).'</td>';
                        echo '<td>'.number_format($value['sangat_tinggi'],3).'</td>';
                      }
                      if($value['indikator'] == 'AU'){
                        echo '<td>'.number_format($value['rendah'],3).'</td>';
                        echo '<td>'.number_format($value['tinggi'],3).'</td>';
                        echo '<td>'.number_format($value['sangat_tinggi'],3).'</td>'; 
                      }
                      if($value['indikator'] == 'RIO'){
                        echo '<td>'.number_format($value['rendah'],3).'</td>';
                        echo '<td>'.number_format($value['tinggi'],3).'</td>';
                        echo '<td>'.number_format($value['sangat_tinggi'],3).'</td>'; 
                        echo '</tr>';
                      }

                      $i++;
                  } 
              ?>  
              </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th>Rendah</th>
                    <th>Tinggi</th>
                    <th>Sangat Tinggi</th>
                    <th>Rendah</th>
                    <th>Tinggi</th>
                    <th>Sangat Tinggi</th>
                    <th>Rendah</th>
                    <th>Tinggi</th>
                    <th>Sangat Tinggi</th>
                    <th>Rendah</th>
                    <th>Tinggi</th>
                    <th>Sangat Tinggi</th>
                    <th>Rendah</th>
                    <th>Tinggi</th>
                    <th>Sangat Tinggi</th>
                  </tr>
                  <tr >
                      <th>Kota/Kabupaten</th>
                      <th colspan="3">AM</th>
                      <th colspan="3">AL</th>
                      <th colspan="3">APS</th>
                      <th colspan="3">AU</th>
                      <th colspan="3">RIO</th>
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
