<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
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

<h2>Kualitas Output</h2>
        <section class="content">                    
            <div class="box-body" style=" overflow-x : scroll;">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr >
                            <th>No</th>
                            <th>Angka Melanjutkan</th>
                            <th>Angka Lulusan</th>
                            <th>Angka Putus Sekolah</th>
                            <th>Angka Mengulang</th>
                            <th>Rasio Input Output</th>
                            <th>NILAI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i=0; 
                            foreach ($output as $key => $value) {
                                echo '<tr>';
                                echo '<td>'.$value['id'].'</td>';

                                // kriteria angka Melanjutkan 
                                if ($value['kriteria_am']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_am']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_am']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }
                                
                                // kriteria angka lulusan
                                if ($value['kriteria_al']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_al']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_al']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }

                                // kriteria Angka Putus Sekolah
                                if ($value['kriteria_aps']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_aps']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_aps']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }
                                // kriteria Angka Mengulang
                                if ($value['kriteria_au']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_au']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_au']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }
                                // kriteria Rasio Input Output
                                if ($value['kriteria_rio']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_rio']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_rio']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }
                                echo '<td>'.$value['nilai_kualitas_output'].'</td>'; 
                                echo '</tr>';
                                $i++;
                            } 
                        ?> 
                    </tbody>
                    <tfoot>
                        <tr >
                            <th>No</th>
                            <th>Angka Melanjutkan</th>
                            <th>Angka Lulusan</th>
                            <th>Angka Putus Sekolah</th>
                            <th>Angka Mengulang</th>
                            <th>Rasio Input Output</th>
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