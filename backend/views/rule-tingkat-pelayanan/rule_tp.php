<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr >
                          <th>No</th>
                          <th>Rasio Murid/Guru</th>
                          <th>Rasio Murid/Sekolah</th>
                          <th>Rasio Murid/Kelas</th>
                          <th>Rasio Kelas/Ruang Kelas</th>
                          <th>Persentase Ruang Kelas Baik</th>
                          <th>Persentase Guru Layak Mengajar</th>
                          <th>NILAI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i=0; 
                            foreach ($output as $key => $value) {
                                echo '<tr>';
                                echo '<td>'.$value['id'].'</td>';

                                // kriteria rasio murid guru
                                if ($value['kriteria_rmg']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_rmg']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_rmg']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }
                                
                                // kriteria rasio murid sekolah
                                if ($value['kriteria_rms']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_rms']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_rms']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }

                                // kriteria rasio murid kelas
                                if ($value['kriteria_rmk']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_rmk']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_rmk']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }
                                // kriteria rasio kelas ruang kelas
                                if ($value['kriteria_rkrk']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_rkrk']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_rkrk']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }
                                // kriteria persentase ruang kelas baik
                                if ($value['kriteria_prkb']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_prkb']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_prkb']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }
                                // kriteria persentase guru layak mengajar
                                if ($value['kriteria_pglm']==1) {
                                  echo '<td>'.'Rendah'.'</td>';
                                }
                                elseif ($value['kriteria_pglm']==2) {
                                  echo '<td>'.'Tinggi'.'</td>';
                                }
                                elseif ($value['kriteria_pglm']==3) {
                                  echo '<td>'.'Sangat Tinggi'.'</td>';
                                }
                                echo '<td>'.$value['nilai_tingkat_pelayanan'].'</td>'; 
                                echo '</tr>';
                                $i++;
                            } 
                        ?> 
                    </tbody>
                    <tfoot>
                        <tr >
                          <th>No</th>
                          <th>Rasio Murid/Guru</th>
                          <th>Rasio Murid/Sekolah</th>
                          <th>Rasio Murid/Kelas</th>
                          <th>Rasio Kelas/Ruang Kelas</th>
                          <th>Persentase Ruang Kelas Baik</th>
                          <th>Persentase Guru Layak Mengajar</th>
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