
<!DOCTYPE html>
<html>
<head>
	<title>Data Sekolahku</title>
</head>
<body>
 <div style="margin-bottom:15px;" align="left">
  <form action="" method="post">
   <input type="number" name="kode" placeholder="Cari kode npsn Sekolah" class="css-input" style="width:250px;" />
   <input type="submit" name="cari" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="50px;"  />
  </form>
 </div>
</body>
</html>

<?php

function bacaHTML($url){
         // inisialisasi CURL
         $data = curl_init();
         // setting CURL
         curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($data, CURLOPT_URL, $url);
         // menjalankan CURL untuk membaca isi file
         $hasil = curl_exec($data);
         curl_close($data);
         return $hasil;
    }


	$kode = @$_POST['kode']; 
	$cari = @$_POST['cari'];
	 
	if($cari) {

    if($kode != "") {
    $kodeHTML =  bacaHTML('http://referensi.data.kemdikbud.go.id/tabs.php?npsn='.$kode); //sumber content 
    
    $pecah = explode('id="tabs-1">', $kodeHTML);
	$pecah2 = explode('id="tabs-2">', $kodeHTML);
	$pecah3 = explode('id="tabs-3">', $kodeHTML);
	$pecah6 = explode('id="tabs-6">', $kodeHTML);
	
	$pecahgambar = explode('class="galleryWrap cf">', $kodeHTML);
	
	$pecahLagi2 = explode('</div>', $pecahgambar[1]);
    $pecahLagiisi1 = explode('</table>', $pecah[1]);
	$pecahLagiisi2 = explode('</table>', $pecah2[1]);
	$pecahLagiisi3 = explode('</table>', $pecah3[1]);
	$pecahLagiisi4 = explode('</table>', $pecah6[1]);
	

    //css table sesuaikan dengan format css web anda 
    echo $pecahLagi2[0], $pecahLagiisi1[0], $pecahLagiisi2[1], $pecahLagiisi3[0], $pecahLagiisi4[0];

    } 
}
	

    
    
	
	//gambar
	
//	$kodeHTML =  bacaHTML('http://referensi.data.kemdikbud.go.id/tabs.php?npsn='.$kode2); //sumber content
 //   $pecah = explode('class="galleryWrap cf">', $kodeHTML);

 //   $pecahLagi = explode('</div>', $pecah[1]);

    //css table sesuaikan dengan format css web anda 
 //   echo $pecahLagi[0];

?>