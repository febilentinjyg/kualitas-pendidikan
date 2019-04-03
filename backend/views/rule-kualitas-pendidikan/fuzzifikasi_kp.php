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
          <table id="example1" class="table table-bordered table-striped" style="width:1000px !important;">
              <thead>
                  <tr >
                      <th>Kota/Kabupaten</th>
                      <th colspan="3">Angka Partisipasi</th>
                      <th colspan="3">Tingkat Pelayanan</th>
                      <th colspan="3">Kualitas Output</th>
                  </tr>
                  <tr>
                    <th></th>
                    <th>Kurang Baik</th>
                    <th>Baik</th>
                    <th>Sangat Baik</th>
                    <th>Kurang Baik</th>
                    <th>Baik</th>
                    <th>Sangat Baik</th>
                    <th>Kurang Baik</th>
                    <th>Baik</th>
                    <th>Sangat Baik</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
          
                  foreach ($output as $key => $value) {
                      if($value['indikator'] == 'angka_partisipasi'){
                        echo '<tr>';
                        echo '<td>'.$value['nama_kota'].'</td>'; 
                        echo '<td>'.$value['kurang_baik'].'</td>';
                        echo '<td>'.$value['baik'].'</td>';
                        echo '<td>'.$value['sangat_baik'].'</td>';
                      }
                      if($value['indikator'] == 'tingkat_pelayanan'){
                        echo '<td>'.$value['kurang_baik'].'</td>';
                        echo '<td>'.$value['baik'].'</td>';
                        echo '<td>'.$value['sangat_baik'].'</td>';
                      }
                      if($value['indikator'] == 'kualitas_output'){
                        echo '<td>'.$value['kurang_baik'].'</td>';
                        echo '<td>'.$value['baik'].'</td>';
                        echo '<td>'.$value['sangat_baik'].'</td>'; 
                        echo '</tr>';
                      }
                  } 
              ?>  
              </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th>Kurang Baik</th>
                    <th>Baik</th>
                    <th>Sangat Baik</th>
                    <th>Kurang Baik</th>
                    <th>Baik</th>
                    <th>Sangat Baik</th>
                    <th>Kurang Baik</th>
                    <th>Baik</th>
                    <th>Sangat Baik</th>
                  </tr>
                  <tr >
                      <th>Kota/Kabupaten</th>
                      <th colspan="3">Angka Partisipasi</th>
                      <th colspan="3">Tingkat Pelayanan</th>
                      <th colspan="3">Kualitas Output</th>
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
