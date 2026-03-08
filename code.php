<?php

	#php regex basit işlemler
 # yalnızca rakamlardan oluşur
 $desen = '/\d+/';

 #yalnızca harflerden oluşur
 $desen = '/[a-zA-Z]+/';

 #türkçe alfabe ve rakamlar
 $desen = '/[a-zA-Z0-9ÇĞŞİçğşıöÖÜü/';

 #iki veYa üç rakamlı sayılar
 $desen = '/\d{2,3}/';

 #(serialize) komutu
 #sonradan geri dönüştürmek için
 #bir değeri saklar
 $d = serialize(4);

 #unserialize komutu
 #bir değeri geri döndürür
 $dun = unserialize($d);
 #dosyaya yazma ve dosyadan okuma değeri yeniden kullanma işine yarar.


<?php
$metin = 'short int sayim = 4; int max = 430000000;';
$desen = '/(int|short int) [a-zA-Z_]+ (=) [0-9]+(;)/';

preg_match_all($desen,$metin,$sonuc);
echo "<pre>";
print_r($sonuc[0]);


Array
(
    [0] => int fun(param1,param2){}
)

?>

#fun bulucu

<?php
$metin = 'int fun(param1,param2){}';
$desen = '/(int|void) [a-zA-Z]+[()](.*?)[()][{}](.*?)[{}]/'; #fonksiyon bkoğunu bulur

preg_match_all($desen,$metin,$sonuc);
echo "<pre>";
print_r($sonuc[0]);


#### chatgpt çıktı
#### c degisken çözümleme


$kod = "int sayi = 5;";

$regex = '/(int|float|double|char|short|long)\s+([a-zA-Z_][a-zA-Z0-9_]*)\s*=\s*([^;]+);/';

if (preg_match($regex, $kod, $sonuc)) {

    echo "Tip: " . $sonuc[1] . "\n";
    echo "Degisken: " . $sonuc[2] . "\n";
    echo "Deger: " . $sonuc[3];

}
?>
?>

