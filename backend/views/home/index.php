<?php

use yii\helpers\Url;
?>

<!DOCTYPE html>
<html>
	<head>
		<style>
		/* This stylesheet sets the width of all images to 100%: */
			img {
			  width: 100%;
			}
		</style>
	</head>
	<body>
		<div class="col-md-12" style="text-align: center;">
			<img src="<?= Url::to(['images/JATIM.png']) ?>" style="width:128px;"/>
			<h2>Dinas Pendidikan Provinsi Jawa Timur</h2>
			<h4>Sistem Pemetaan dan Analisa Kualitas Pendidikan Tingkat SLTA di Kota/Kabupaten di Jawa Timur</h4>
		</div>
		<div class="box-body">
			
		</div>
            
			<div class="box box-info" style="padding: 0px 30px">
			    <div class="box-body">
					<div class="row">
						<div class="col-md-12">
								<h4>VISI</h4>
								<p>
									Terwujudnya insan yang cerdas, berakhlak, professional dan berbudaya
								</p>
								<strong>Makna dari visi :</strong>
								<ul>
									<li><strong>CERDAS</strong> adalah yang memiliki daya kapabilitas tinggi dalam merealisasikan kecerdasan sprritual (beriman dan taqwa), kecerdasan emosional, kecerdasan social, kecerdasan inteklektual dan kecerdasan kinestesis.</li>
									<li><strong>BERAKHLAK</strong> adalah memiliki pikiran dan tindakan sesuai dengan nilai norma agama, social dan perundangan-undangan/ peraturan yang berlaku.</li>
									<li><strong>PROFESIONAL</strong> adalah memiliki kapabilitas tinggi dalam mengekspresikan kinerja dan produk kerja.</li>
									<li><strong>BERBUDAYA</strong> adalah memiliki kapabilitas tinggi dalam interakasi dan adaptasi social, serta menjunjung tinggi nilai-nilai luhur hasil olah hati, olah piker, olah rasa, olah batin, dan olah rohani yang terkandung dalam budaya bangsa.</li>
								</ul>
								<h4>MISI</h4>
								<ol>
									<li>Mewujudkan pemerataan pendidikan dengan meningkatkan angka partisipasi murni dan nilai transisi dan menurunkan angka putus sekolah dan luar sekolah</li>
									<li>Mewujudkan kelangsungan program pemberian bantuan pendidikan</li>
									<li>Meningkatkan kualitas pendidikan dengan menaikkan  nilai rata-rata hasil evaluasi akhir pada setiap jalur, jenjang dan jenis pendidikan melalui kegiatan kurikuler ekstrakurikuler</li>
									<li>Meningkatkan peran serta pendidikan dalam pembangunan daerah dan pengentasan kemiskinan dan pengangguran</li>
									<li>Memfasilitasi perencanaan pemenuhan kebutuhan pendidikan dan tenaga kependidikan pada semua jenjang pendidikan di seluruh wilayah Jawa Timur</li>
									<li>Mewujudkan internalisasi nilai budaya kepada pelajar melalui kegiatan pergelaran, festival, pameran, parade dan bentuk sajian seni budaya yang positif</li>
								</ol>
								<br>
								<h4>Penjelasan Aplikasi</h4>
								<p style="text-indent: 40px">Aplikasi ini adalah aplikasi yang menampilkan hasil klasifikasi kualitas pendidikan di setiap Kota/Kabupaten di Jawa Timur. Klasifikasi ditampilan dalam bentuk pemetaan sehingga mudah untuk mengetahui daerah atau Kota/Kabupaten mana yang memiliki kualitas pendidikan baik, cukup baik, ataupun kurang baik. Klasifikasi dilakukan dengan menggunakan tiga belas variabel perhitungan yaitu tiga belas indikator pendidikan. Tiga belas indikator pendidikan tersebut adalah Angka Partisipasi Kasar, Angka Partisipasi Murni, Rasio Murid Sekolah, Rasio Murid Kelas, Rasio Murid Guru, Rasio Kelas Ruang Kelas, Persentase Ruang Kelas Baik, Persentase Guru Layak Mengajar, Angka Melanjutkan, Angka Lulusan, Angka Mengulang, Angka Putus Sekolah, dan Rasio Input Output.</p>
								<br>

								<h4>Tiga Belas Indikator Pendidikan</h4>
								<ol>
									<li><strong>Angka Partisipasi Kasar (APK)</strong> diperoleh dengan membagi jumlah murid dengan jumlah penduduk menurut kelompok usia sekolah yang sesuai dikalikan 100 persen.</li>

									<li><strong>Angka Partisipasi Murni (APM)</strong> diperoleh dengan membagi jumlah murid kelompok usia sekolah tertentu dengan jumlah penduduk menurut kelompok usia yang sama dikalikan 100 persen.</li>

									<li><strong>Rasio Murid Sekolah (RMS)</strong> diperoleh dengan membagi jumlah murid dengan jumlah sekolah pada jenjang pendidikan tertentu.</li>

									<li><strong>Rasio Murid Kelas (RMK)</strong> diperoleh dengan membagi jumlah murid dengan jumlah kelas pada jenjang pendidikan tertentu.</li>

									<li><strong>Rasio Murid Guru (RMG)</strong> diperoleh dengan membagi jumlah murid dengan jumlah guru pada jenjang pendidikan tertentu.</li>

									<li><strong>Rasio Kelas Ruang Kelas (RKRK)</strong> diperoleh dengan membagi jumlah murid dengan jumlah ruang kelas pada jenjang pendidikan tertentu.</li>

									<li><strong>Persentase Ruang Kelas Baik (PRKB)</strong> diperoleh dengan membagi jumlah ruang kelas milik yang berkondisi baik dengan seluruh jumlah ruang kelas milik pada jenjang pendidikan tertentu</li>

									<li><strong>Persentase Guru Layak Mengajar (PGLM)</strong> diperoleh dengan membagi jumlah guru layak mengajar dikaitkan dengan ijazah yang dimiliki sesuai dengan jenjang pendidikan tertentu (S1 atau D4 dan yang lebih tinggi) dengan jumlah guru seluruhnya pada jenjang pendidikan tertentu dibagi dengan jumlah guru seluruhnya.</li>

									<li><strong>Angka Melanjutkan (AM)</strong> diperoleh dengan membagi jumlah murid baru suatu jenjang pendidikan tertentu dengan jumlah murid jenjang pendidikan satu tingkat dibawahnya pada tahun sebelumnya dikalikan 100 persen.</li>

									<li><strong>Angka Lulusan (AL)</strong> diperoleh dengan membagi jumlah murid yang berhasil menyelesaikan pendidikan untuk suatu jenjang pendidikan tertentu dengan jumlah murid tingkat terakhir yang mengikuti ujian dikalikan 100 persen.</li>

									<li><strong>Angka Mengulang (AU)</strong> diperoleh dengan membagi jumlah murid yang mengulang dengan jumlah seluruh murid pada jenjang pendidikan tertentu pada tahun sebelumnya dikalikan 100 persen.</li>

									<li><strong>Angka Putus Sekolah (APS)</strong> diperoleh dengan membagi jumlah murid putus sekolah dengan jumlah murid seluruhnya pada tahun sebelumnya dikalikan 100 persen.</li>

									<li><strong>Rasio Input Output (RIO)</strong> diperoleh dengan membagi jumlah lulusan tahun tertentu dengan murid baru tingkat I (tahun pertama memasuki proses pendidikan) pada jenjang pendidikan tertentu.</li>
								</ol>
						</div>
					</div>
				</div>
			</div>

	</body>
</html>
