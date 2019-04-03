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
                        echo '<b>ANGKA PARTISIPASI KASAR</b>';
                    }
                    if ($active=='apm') {
                        echo '<b>ANGKA PARTISIPASI MURNI</b>';
                    }
                    if ($active=='rmg') {
                        echo '<b>RASIO MURID GURU</b>';
                    }
                    if ($active=='rms') {
                        echo '<b>RASIO MURID SEKOLAH</b>';
                    }
                    if ($active=='rmk') {
                        echo '<b>RASIO MURID KELAS</b>';
                    }
                    if ($active=='rkrk') {
                        echo '<b>RASIO KELAS RUANG KELAS</b>';
                    }
                    if ($active=='prkb') {
                        echo '<b>PRESENTASE RUANG KELAS BAIK</b>';
                    }
                    if ($active=='pglm') {
                        echo '<b>PERSENTASE GURU LAYAK MENGAJAR</b>';
                    }
                    if ($active=='am') {
                        echo '<b>ANGKA MELANJUTKAN</b>';
                    }
                    if ($active=='al') {
                        echo '<b>ANGKA LULUSAN</b>';
                    }
                    if ($active=='aps') {
                        echo '<b>ANGKA PUTUS SEKOLAH</b>';
                    }
                    if ($active=='au') {
                        echo '<b>ANGKA MENGULANG</b>';
                    }
                    if ($active=='rio') {
                        echo '<b>RASIO INPUT OUTPUT</b>';
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