<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
?>
<h1 align="center">Fuzzy Kualitas Pendidikan</h1>
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
                <a href='<?= Url::to(['rule-kualitas-pendidikan/view-bobot']) ?>'>Nilai Bobot</a></li>

              <li
              <?php if ($active=='fuzzifikasi_kp') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-kualitas-pendidikan/nilai-fuzzy-kualitas-pendidikan']) ?>'>Fuzzifikasi</a></li>

              <li
              <?php if ($active=='inferensi_fuzzy_kp') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-kualitas-pendidikan/inferensi-fuzzy']) ?>'>Inferensi Fuzzy</a></li>

              <li
              <?php if ($active=='defuzzifikasi_kp') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-kualitas-pendidikan/defuzzifikasi']) ?>'>Defuzzifikasi</a></li>
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
                    if ($active=='fuzzifikasi_kp') {
                        // echo '<b>Perhitungan</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                    if ($active=='inferensi_fuzzy_kp') {
                        // echo '<b>Inferensi Fuzzy</b>';
                        echo $this->render( $active, [
                        'kota' => $kota,
                        'rule' => $rule,
                        'output' => $output,
                    ]);
                    }
                    if ($active=='defuzzifikasi_kp') {
                        // echo '<b>Defuzzifikasi</b>';
                        echo $this->render( $active, [
                        'kota' => $kota,
                        'rule' => $rule,
                        'fuzzyData' => $fuzzyData,
                    ]);
                    }
                ?>
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>