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
?>