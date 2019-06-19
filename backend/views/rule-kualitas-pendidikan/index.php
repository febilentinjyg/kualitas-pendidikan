<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
?>
<h1 align="center">Klasifikasi Kualitas Pendidikan</h1>
<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li 
                <?php if ($active=='rule_kp') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-kualitas-pendidikan/rule']) ?>'>Aturan</a></li>
              
              <li
              <?php if ($active=='nilaibobot') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-kualitas-pendidikan/view-bobot']) ?>'>Klasifikasi</a></li>

              <li
              <?php if ($active=='grafik') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-kualitas-pendidikan/grafik']) ?>'>Grafik Klasifikasi</a></li>
            </ul>
            
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php 
                    if ($active=='rule_kp') {
                        // echo '<b>Aturan Kualitas Pendidikan</b>';

                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                    if ($active=='nilaibobot') {
                        // echo '<b>Nilai Bobot Kualitas Pendidikan</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                    if ($active=='grafik') {
                        // echo '<b>Grafik Kualitas Pendidikan</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                ?>
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>