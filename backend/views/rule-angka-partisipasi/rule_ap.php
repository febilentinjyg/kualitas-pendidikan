<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Angka Partisipasi';
?>
<!-- DataTables CSS -->
<head>

  <!-- Bootstrap 3.3.7 -->
  <link href="http://localhost/tugasAkhir/vendor/bower/admin-lte/dist/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="http://localhost/tugasAkhir/vendor/bower/admin-lte/dist/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">

</head>

<script src="http://localhost/tugasAkhir/vendor/bower-asset/datatables/media/js/jquery.js"></script>

<h2>Rule Angka Partisipasi</h2>
<section class="content">                    
            <div class="box-body" style=" overflow-x : scroll;">
                <table id="example1" class="table table-bordered table-striped" style="width:800px !important;">
                    <thead>
                        <tr >
                            <th>No</th>
                            <th>Angka Partisipasi Kasar</th>
                            <th>Angka Partisipasi Murni</th>
                            <th>NILAI</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i=0; 
                            foreach ($output as $key => $value) {
                                echo '<tr>';
                                // kriteria apk
                                echo '<td>'.$value['id'].'</td>'; 
                                if ($value['kriteria_apk']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_apk']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_apk']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }
                                
                                // kriteria apm
                                if ($value['kriteria_apm']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_apm']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_apm']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }

                                echo '<td>'.$value['nilai_angka_partisipasi'].'</td>'; 
                                echo '</tr>';
                                $i++;
                            } 
                        ?> 
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Angka Partisipasi Kasar</th>
                          <th>Angka Partisipasi Murni</th>
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