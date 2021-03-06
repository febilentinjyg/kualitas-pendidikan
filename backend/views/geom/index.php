<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
?>
<h1>Peta Kualitas Pendidikan</h1>

<section class="content">                    
	<div class="box box-info">
	    <div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Kategori</label>
						<select id="map-dropdown" class="form-control">
							<option value="kualitas-pendidikan">KUALITAS PENDIDIKAN</option>
							<option value="angka-partisipasi">Angka Partisipasi</option>
							<option value="tingkat-pelayanan">Tingkat Pelayanan</option>
							<option value="kualitas-output">Kualitas Output</option>
						</select>
					</div>
					<div id="map" style="height: 430px;"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
<link rel="stylesheet" href="<?= Url::base(true) ?>/css/map.css">
<script src="/tugasAkhir/backend/web/assets/ea6e45f8/jquery.js"></script>

<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
   integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
   crossorigin=""></script>

<script src="<?= Url::base(true) ?>/js/script.js"></script>


