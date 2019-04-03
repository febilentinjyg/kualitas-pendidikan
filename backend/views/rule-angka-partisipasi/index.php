<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
?>
<h1 align="center">Fuzzy Angka Partisipasi</h1>
<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li 
                <?php if ($active=='rule_ap') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-angka-partisipasi/rule']) ?>'>Aturan</a></li>
              
              <li
              <?php if ($active=='nilaibobot') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-angka-partisipasi/view-bobot']) ?>'>Nilai Bobot</a></li>

              <li
              <?php if ($active=='fuzzifikasi_ap') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-angka-partisipasi/nilai-fuzzy-angka-partisipasi']) ?>'>Fuzzifikasi</a></li>

              <li
              <?php if ($active=='inferensi_fuzzy_ap') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-angka-partisipasi/inferensi-fuzzy']) ?>'>Inferensi Fuzzy</a></li>

              <li
              <?php if ($active=='defuzzifikasi_ap') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-angka-partisipasi/defuzzifikasi']) ?>'>Defuzzifikasi</a></li>
            </ul>
            
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php 
                    if ($active=='rule_ap') {
                        // echo '<b>Aturan Angka Partisipasi</b>';

                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                    if ($active=='nilaibobot') {
                        // echo '<b>Nilai Bobot Angka Partisipasi</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                    if ($active=='fuzzifikasi_ap') {
                        // echo '<b>Perhitungan</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                    if ($active=='inferensi_fuzzy_ap') {
                        // echo '<b>Inferensi Fuzzy</b>';
                        echo $this->render( $active, [
                        'kota' => $kota,
                        'rule' => $rule,
                        'output' => $output,
                    ]);
                    }
                    if ($active=='defuzzifikasi_ap') {
                        // echo '<b>Inferensi Fuzzy</b>';
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