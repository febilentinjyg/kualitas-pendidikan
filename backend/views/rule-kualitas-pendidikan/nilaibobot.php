<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Kualitas Pendidikan';
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
          <table id="example1" class="table table-bordered table-striped" style="width:650px !important;">
              <thead>
                  <tr >
                      <th>No</th>
                      <th>Kota/Kabupaten</th>
                      <th>Angka Partisipasi</th>
                      <th>Tingkat Pelayanan</th>
                      <th>Kualitas Output</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $i=0; 
                  foreach ($output as $key => $value) {
                      echo '<tr>';
                      echo '<td>'.($i+1).'</td>';
                      echo '<td>'.$value['nama_kota'].'</td>'; 
                      echo '<td>'.$value['defuzzifikasi_angka_partisipasi'].'</td>'; 
                      echo '<td>'.$value['defuzzifikasi_tingkat_pelayanan'].'</td>';
                      echo '<td>'.$value['defuzzifikasi_kualitas_output'].'</td>';
                      echo '</tr>';
                      $i++;
                  } 
              ?>  
              </tbody>
                <tfoot>
                  <tr >
                      <th>No</th>
                      <th>Kota/Kabupaten</th>
                      <th>Angka Partisipasi</th>
                      <th>Tingkat Pelayanan</th>
                      <th>Kualitas Output</th>
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