## Değişken denetleme fonksiyonları

Değişken durumunu kontrol etmek için fonksiyonlar;
isset,empty

Değişken tipini okumak için fonksiyonlar;
gettype,is_int,is_string,is_array

bu fonksiyonlar ile değişken ile ilgili bilgiler alınır.

isset() : değişkenin var olduğunu ve null olmadığını sorgular,böyleyse türü verir.  
empty(): değişkenin boş olduğunu sorgular,değişken tanımlanmamışsa,false ise,0 ise,"" boş ise türü döner.  
gettype(): değişkenin tipini yazı olarak okumayı gerçekleştirir.  
is_int(): değişken integer ise true verir.  
is_array(): değişken dizi ise true verir.  
is_string(): değişken yazı ise true verir.  

Değişken denetleme fonksiyonları çıktı olarak boolean tipini döndürür.Bir varlık,yokluk,doğruluk,yanlışlık durumudur.