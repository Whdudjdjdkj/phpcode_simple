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
?>