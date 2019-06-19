<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Indikator Pendidikan';
?>

<!-- DataTables CSS -->
<head>

  <!-- Bootstrap 3.3.7 -->
  <link href="http://localhost/tugasAkhir/vendor/bower/admin-lte/dist/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="http://localhost/tugasAkhir/vendor/bower/admin-lte/dist/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">

</head>



<script src="http://localhost/tugasAkhir/vendor/bower-asset/datatables/media/js/jquery.js"></script>

<div class="kerentanan-sosial-index">

    <!-- Content Header (Page header) -->

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Jawa Timur</h3>
            </div><!-- /.box-header -->
                    
            <div class="box-body" style=" overflow-x : scroll;">
                <table id="example1" class="table table-bordered table-striped" style="width:2500px !important;">
                    <thead>
                        <tr >
                            <th>Kota/Kabupaten</th>
                            <th>Kategori APK</th>
                            <th>Kategori APM</th>
                            <th>Kategori TPS</th>
                            <th>Kategori RMG</th>
                            <th>Kategori RMS</th>                    
                            <th>Kategori RMK</th> 
                            <th>Kategori RKRK</th>
                            <th>Kategori PRKB</th>
                            <th>Kategori PGLM</th>
                            <th>Kategori AM</th>
                            <th>Kategori AL</th>
                            <th>Kategori APS</th>
                            <th>Kategori AU</th>
                            <th>Kategori RIO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            /*$i=0; 
                            foreach ($data as $key => $value) {
                                echo '<tr>';
                                echo '<td>.'$value['nama'].'</td>'; 
                                echo '<td>'.$hasilapk[$i];.'</td>'; 
                                echo '<td>'.$hasilapm[$i];.'</td>'; 
                                echo '<td>'.$hasiltps[$i];.'</td>'; 
                                echo '<td>'.$hasilrmg[$i];.'</td>'; 
                                echo '<td>'.$hasilrms[$i];.'</td>'; 
                                echo '<td>'.$hasilrmk[$i];.'</td>'; 
                                echo '<td>'.$hasilrkrk[$i];.'</td>'; 
                                echo '<td>'.$hasilprkb[$i];.'</td>'; 
                                echo '<td>'.$hasilpglm[$i];.'</td>'; 
                                echo '<td>'.$hasilam[$i];.'</td>'; 
                                echo '<td>'.$hasilal[$i];.'</td>'; 
                                echo '<td>'.$hasilaps[$i];.'</td>'; 
                                echo '<td>'.$hasilau[$i];.'</td>'; 
                                echo '<td>'.$hasilrio[$i];.'</td>';
                                echo '</tr>';
                                $i++;
                            } */
                        ?> 
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kota/Kabupaten</th>
                            <th>Kategori APK</th>
                            <th>Kategori APM</th>
                            <th>Kategori TPS</th>
                            <th>Kategori RMG</th>
                            <th>Kategori RMS</th>                    
                            <th>Kategori RMK</th> 
                            <th>Kategori RKRK</th>
                            <th>Kategori PRKB</th>
                            <th>Kategori PGLM</th>
                            <th>Kategori AM</th>
                            <th>Kategori AL</th>
                            <th>Kategori APS</th>
                            <th>Kategori AU</th>
                            <th>Kategori RIO</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>

<!-- DataTables -->
<script src="http://localhost/tugasAkhir/vendor/bower-asset/datatables/media/js/jquery.dataTables.min.js"></script>

<script src="http://localhost/tugasAkhir/vendor/bower-asset/datatables/dataTables.bootstrap.min.js"></script>

<script src="http://localhost/tugasAkhir/vendor/bower/adminlte/dist/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js"></script>

<!-- page script -->
<script>
  // $(document).ready(function() {
  //   $('#example1').DataTable({
  //       responsive : true
  //   });
  // }); //bekos ini uda lama
  jQuery( document ).ready(function( $ ) {
    $('#example1').DataTable();
});
</script>