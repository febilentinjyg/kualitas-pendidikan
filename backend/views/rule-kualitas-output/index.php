<?php
use yii\helpers\Url;
?>
<h1 align="center">Fuzzy Kualitas Output</h1>
<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li 
                <?php if ($active=='rule_ko') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-kualitas-output/rule']) ?>'>Aturan</a></li>
              
              <li
              <?php if ($active=='nilaibobot') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-kualitas-output/view-bobot']) ?>'>Nilai Bobot</a></li>

              <li
              <?php if ($active=='fuzzifikasi_ko') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-kualitas-output/nilai-fuzzy-kualitas-output']) ?>'>Fuzzifikasi</a></li>

              <li
              <?php if ($active=='inferensi_fuzzy_ko') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-kualitas-output/inferensi-fuzzy']) ?>'>Inferensi Fuzzy</a></li>

              <li
              <?php if ($active=='defuzzifikasi_ko') {
                  echo 'class="active"';
                } ?>>
                <a href='<?= Url::to(['rule-kualitas-output/defuzzifikasi']) ?>'>Defuzzifikasi</a></li>
            </ul>
            
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php 
                    if ($active=='rule_ko') {
                        // echo '<b>Aturan Kualitas Output</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                    if ($active=='nilaibobot') {
                        // echo '<b>Nilai Bobot Kualitas Output</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                    if ($active=='fuzzifikasi_ko') {
                        // echo '<b>Perhitungan</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }

                    if ($active=='inferensi_fuzzy_ko') {
                        // echo '<b>Perhitungan</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                        'kota' => $kota,
                        'rule' => $rule,
                    ]);
                    }

                    if ($active=='defuzzifikasi_ko') {
                        // echo '<b>Perhitungan</b>';
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