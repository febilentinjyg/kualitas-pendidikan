<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
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

<h2>Rule Kualitas Pendidikan</h2>
<section class="content">                    
            <div class="box-body" style=" overflow-x : scroll;">
                <table id="example1" class="table table-bordered table-striped" style="width:800px !important;">
                    <thead>
                        <tr >
                            <th>No</th>
                            <th>Angka Partisipasi</th>
                            <th>Tingkat Pelayanan</th>
                            <th>Kualitas Output</th>
                            <th>NILAI</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i=0; 
                            foreach ($output as $key => $value) {
                                echo '<tr>';
                                // kriteria angka partisipasi
                                echo '<td>'.$value['id'].'</td>'; 
                                if ($value['kriteria_angka_partisipasi']==1) {
                                  echo '<td>'.'Kurang Baik'.'</td>';
                                }
                                elseif ($value['kriteria_angka_partisipasi']==2) {
                                  echo '<td>'.'Baik'.'</td>';
                                }
                                elseif ($value['kriteria_angka_partisipasi']==3) {
                                  echo '<td>'.'Sangat Baik'.'</td>';
                                }
                                
                                // kriteria tingkat pelayanan
                                if ($value['kriteria_tingkat_pelayanan']==1) {
                                  echo '<td>'.'Kurang Baik'.'</td>';
                                }
                                elseif ($value['kriteria_tingkat_pelayanan']==2) {
                                  echo '<td>'.'Baik'.'</td>';
                                }
                                elseif ($value['kriteria_tingkat_pelayanan']==3) {
                                  echo '<td>'.'Sangat Baik'.'</td>';
                                }

                                //kriteria kualitas output
                                if ($value['kriteria_kualitas_output']==1) {
                                  echo '<td>'.'Kurang Baik'.'</td>';
                                }
                                elseif ($value['kriteria_kualitas_output']==2) {
                                  echo '<td>'.'Baik'.'</td>';
                                }
                                elseif ($value['kriteria_kualitas_output']==3) {
                                  echo '<td>'.'Sangat Baik'.'</td>';
                                }

                                echo '<td>'.$value['nilai_kualitas_pendidikan'].'</td>'; 
                                echo '</tr>';
                                $i++;
                            } 
                        ?> 
                    </tbody>
                    <tfoot>
                        <tr >
                          <th>No</th>
                          <th>Angka Partisipasi</th>
                          <th>Tingkat Pelayanan</th>
                          <th>Kualitas Output</th>
                          <th>NILAI</th>
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