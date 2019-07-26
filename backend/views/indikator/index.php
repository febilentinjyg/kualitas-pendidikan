<?php
use yii\helpers\Url;
?>
<h1 align="center">INDIKATOR PENDIDIKAN</h1>
<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li 
                <?php if ($active=='apk') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-apk']) ?>'>APK</a></li>
              
              <li
              <?php if ($active=='apm') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-apm']) ?>'>APM</a></li>

              <li
              <?php if ($active=='rmg') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-rmg']) ?>'>RMG</a></li>

              <li
              <?php if ($active=='rms') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-rms']) ?>'>RMS</a></li>

              <li
              <?php if ($active=='rmk') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-rmk']) ?>'>RMK</a></li>

              <li
              <?php if ($active=='rkrk') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-rkrk']) ?>'>RKRK</a></li>

              <li
              <?php if ($active=='prkb') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-prkb']) ?>'>PRKB</a></li>

              <li
              <?php if ($active=='pglm') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-pglm']) ?>'>PGLM</a></li>

              <li
              <?php if ($active=='am') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-am']) ?>'>AM</a></li>

              <li
              <?php if ($active=='al') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-al']) ?>'>AL</a></li>

              <li
              <?php if ($active=='aps') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-aps']) ?>'>APS</a></li>

              <li
              <?php if ($active=='au') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-au']) ?>'>AU</a></li>

              <li
              <?php if ($active=='rio') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['indikator/create-rio']) ?>'>RIO</a></li>
            </ul>
            
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php 
                    if ($active=='apk') {
                        echo '<b>ANGKA PARTISIPASI KASAR TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/apk.JPG']).'" width="350px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='apm') {
                        echo '<b>ANGKA PARTISIPASI MURNI TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/apm.JPG']).'" width="350px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='rmg') {
                        echo '<b>RASIO MURID GURU TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/rmg.JPG']).'" width="250px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='rms') {
                        echo '<b>RASIO MURID SEKOLAH TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/rms.JPG']).'" width="250px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='rmk') {
                        echo '<b>RASIO MURID KELAS TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/rmk.JPG']).'" width="250px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='rkrk') {
                        echo '<b>RASIO KELAS RUANG KELAS TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/rkrk.JPG']).'" width="250px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='prkb') {
                        echo '<b>PRESENTASE RUANG KELAS BAIK TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/prkb.JPG']).'" width="350px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='pglm') {
                        echo '<b>PERSENTASE GURU LAYAK MENGAJAR TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/pglm.JPG']).'" width="350px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='am') {
                        echo '<b>ANGKA MELANJUTKAN TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/am.JPG']).'" width="250px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='al') {
                        echo '<b>ANGKA LULUSAN TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/al.JPG']).'" width="250px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='aps') {
                        echo '<b>ANGKA PUTUS SEKOLAH TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/aps.JPG']).'" width="350px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='au') {
                        echo '<b>ANGKA MENGULANG TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/au.JPG']).'" width="300px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                    if ($active=='rio') {
                        echo '<b>RASIO INPUT OUTPUT TAHUN PELAJARAN 2017/2018</b>';
                        echo '<br>';
                        echo '<img src="'.Url::to(['images/rio.JPG']).'" width="350px"/>' ;
                        echo '<br>';
                        echo '<br>';
                    }
                ?>
                
                <?php echo $this->render( $active, [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]); ?>
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>