<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\IndikatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perhitungan Fuzzy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indikator-index"  style="overflow-x: scroll;">
<table border="1" width="3000px">
	<tr align="center">
		<td>KOTA/KABUPATEN</td>
		<td>Kategori APK</td>
		<td>Kategori APM</td>
		<td>Kategori TPS</td>
		<td>Kategori RMG</td>
		<td>Kategori RMS</td>
		<td>Kategori RMK</td>
		<td>Kategori RKRK</td>
		<td>Kategori PRKB</td>
		<td>Kategori PGLM</td>
		<td>Kategori AM</td>
		<td>Kategori AL</td>
		<td>Kategori APS</td>
		<td>Kategori AU</td>
		<td>Kategori RIO</td>
	</tr>

<?php
	$i=0;
	foreach ($data as $key => $value) {
?>
	<tr>
		<td>
			<?php echo $value['nama']; ?>
		</td>
		<td align="center">
			<?php echo $hasilapk[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilapm[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasiltps[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilrmg[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilrms[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilrmk[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilrkrk[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilprkb[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilpglm[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilam[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilal[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilaps[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilau[$i];
			?>
		</td>
		<td align="center">
			<?php echo $hasilrio[$i];
			?>
		</td>
	</tr> 
<?php  
	$i++;
	}	
?>
</table>

</div>
