<?php
use yii\helpers\Url;
$this->registerJs(<<<JS
    $('.show-loading').click(function(){
      $('.box-body').waitMe({
        effect : 'bounce',
        text : 'Loading...',
        bg : 'rgba(255,255,255,0.7)',
        color : '#000',
        maxSize : '',
        waitTime : -1,
        textPos : 'vertical',
        fontSize : '',
        source : ''
      });
    })
JS
);
?>
<h1 align="center">Fuzzy Tingkat Pelayanan</h1>
<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li 
                <?php if ($active=='rule_tp') {
                  echo 'class="active"';
                } ?>>
                <a class="show-loading" href='<?= Url::to(['rule-tingkat-pelayanan/rule']) ?>'>Aturan</a></li>
              
              <li
              <?php if ($active=='nilaibobot') {
                  echo 'class="active"';
                } ?>>
                <a class="show-loading" href='<?= Url::to(['rule-tingkat-pelayanan/view-bobot']) ?>'>Nilai Bobot</a></li>

              <li
              <?php if ($active=='fuzzifikasi_tp') {
                  echo 'class="active"';
                } ?>>
                <a class="show-loading" href='<?= Url::to(['rule-tingkat-pelayanan/nilai-fuzzy-tingkat-pelayanan']) ?>'>Fuzzifikasi</a></li>

              <li
              <?php if ($active=='inferensi_fuzzy_tp') {
                  echo 'class="active"';
                } ?>>
                <a class="show-loading" href='<?= Url::to(['rule-tingkat-pelayanan/inferensi-fuzzy']) ?>'>Inferensi Fuzzy</a></li>

              <li
              <?php if ($active=='defuzzifikasi_tp') {
                  echo 'class="active"';
                } ?>>
                <a class="show-loading" href='<?= Url::to(['rule-tingkat-pelayanan/defuzzifikasi']) ?>'>Defuzzifikasi</a></li>

            </ul>
            
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php 
                    if ($active=='rule_tp') {
                        // echo '<b>Aturan Tingkat Pelayanan</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                    if ($active=='nilaibobot') {
                        // echo '<b>Nilai Bobot Tingkat Pelayanan</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                    if ($active=='fuzzifikasi_tp') {
                        // echo '<b>Perhitungan</b>';
                        echo $this->render( $active, [
                        'output' => $output,
                    ]);
                    }
                    if ($active=='inferensi_fuzzy_tp') {
                        // echo '<b>Inferensi Fuzzy</b>';
                        echo $this->render( $active, [
                        'kota' => $kota,
                        'rule' => $rule,
                        'output' => $output,
                    ]);
                    }
                    if ($active=='defuzzifikasi_tp') {
                        // echo '<b>Inferensi Fuzzy</b>';
                        echo $this->render( $active, [
                        'kota' => $kota,
                        'rule' => $rule,
                        'fuzzyData'=> $fuzzyData,
                    ]);
                    }
                ?>
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>