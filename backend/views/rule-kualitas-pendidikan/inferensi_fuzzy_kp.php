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
          <table id="example1" class="table table-bordered table-striped" >
              <thead>
                  <tr >
                      <th>No</th>
                      <th>AP</th>
                      <th>TP</th>
                      <th>KO</th>
                      <th>Nilai</th>
                      <?php
                        foreach ($kota as $key => $value) {
                          echo '<th>'.$value['nama'].'</th>';
                        }
                      ?>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $iterasi=1; 
                  foreach ($rule as $key => $value) {
                    if ($iterasi <= count($rule)){
                      foreach ($output as $i => $value1) {
                      echo '<tr>';
                      echo '<td>'.$iterasi.'</td>';
                      if ($rule[$i]['kriteria_angka_partisipasi']==1) {
                        echo '<td>'.'Kurang Baik'.'</td>';
                      }
                      elseif ($rule[$i]['kriteria_angka_partisipasi']==2) {
                        echo '<td>'.'Baik'.'</td>';
                      }
                      elseif ($rule[$i]['kriteria_angka_partisipasi']==3) {
                        echo '<td>'.'Sangat Baik'.'</td>';
                      }

                      if ($rule[$i]['kriteria_tingkat_pelayanan']==1) {
                        echo '<td>'.'Kurang Baik'.'</td>';
                      }
                      elseif ($rule[$i]['kriteria_tingkat_pelayanan']==2) {
                        echo '<td>'.'Baik'.'</td>';
                      }
                      elseif ($rule[$i]['kriteria_tingkat_pelayanan']==3) {
                        echo '<td>'.'Sangat Baik'.'</td>';
                      }

                      if ($rule[$i]['kriteria_kualitas_output']==1) {
                        echo '<td>'.'Kurang Baik'.'</td>';
                      }
                      elseif ($rule[$i]['kriteria_kualitas_output']==2) {
                        echo '<td>'.'Baik'.'</td>';
                      }
                      elseif ($rule[$i]['kriteria_kualitas_output']==3) {
                        echo '<td>'.'Sangat Baik'.'</td>';
                      } 
                      
                      echo '<td>'.$rule[$i]['nilai_kualitas_pendidikan'].'</td>';
                      foreach ($value1 as $j => $nilai) {
                        echo '<td>'.$nilai.'</td>';
                      }
                      echo '</tr>';
                      $iterasi++;
                    }
                    }
                  } 
              ?>  
              </tbody>
                <tfoot>
                  <tr >
                      <th>No</th>
                      <th>AP</th>
                      <th>TP</th>
                      <th>KO</th>
                      <th>Nilai</th>
                      <?php
                        foreach ($kota as $key => $value) {
                          echo '<th>'.$value['nama'].'</th>';
                        }
                      ?>
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