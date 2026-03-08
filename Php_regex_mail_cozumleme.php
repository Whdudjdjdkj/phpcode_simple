<?php

$metin = "
Müşteri listesi:
ahmet.yilmaz@gmail.com, ayse.demir@yahoo.com, mehmet.kara@hotmail.com,
fatma.celik@outlook.com, ali.arslan@protonmail.com, zeynep.sahin@mail.com,
can.kaya@gmail.com, elif.turan@yahoo.com, burak.ozdemir@hotmail.com,
selin.aksoy@outlook.com, emre.polat@protonmail.com, deniz.aydin@mail.com,
mert.koc@gmail.com, seda.yildiz@yahoo.com, onur.tekin@hotmail.com,
ece.ozkan@outlook.com, hakan.erdem@protonmail.com, gizem.tas@mail.com,
tolga.sari@gmail.com, ceren.kurt@yahoo.com

Bu listedeki e-posta adreslerini sistemden kontrol et.
";

// Regex: email yakalama
$pattern = '/([a-zA-Z0-9._%+-]+)@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})/';

// Tüm eşleşmeleri bul
preg_match_all($pattern, $metin, $eslesmeler);

echo "Bulunan mailler:\n";
print_r($eslesmeler);

?>

Output:

Bulunan mailler:
Array
(
    [0] => Array
        (
            [0] => ahmet.yilmaz@gmail.com
            [1] => ayse.demir@yahoo.com
            [2] => mehmet.kara@hotmail.com
            [3] => fatma.celik@outlook.com
            [4] => ali.arslan@protonmail.com
            [5] => zeynep.sahin@mail.com
            [6] => can.kaya@gmail.com
            [7] => elif.turan@yahoo.com
            [8] => burak.ozdemir@hotmail.com
            [9] => selin.aksoy@outlook.com
            [10] => emre.polat@protonmail.com
            [11] => deniz.aydin@mail.com
            [12] => mert.koc@gmail.com
            [13] => seda.yildiz@yahoo.com
            [14] => onur.tekin@hotmail.com
            [15] => ece.ozkan@outlook.com
            [16] => hakan.erdem@protonmail.com
            [17] => gizem.tas@mail.com
            [18] => tolga.sari@gmail.com
            [19] => ceren.kurt@yahoo.com
        )

    [1] => Array
        (
            [0] => ahmet.yilmaz
            [1] => ayse.demir
            [2] => mehmet.kara
            [3] => fatma.celik
            [4] => ali.arslan
            [5] => zeynep.sahin
            [6] => can.kaya
            [7] => elif.turan
            [8] => burak.ozdemir
            [9] => selin.aksoy
            [10] => emre.polat
            [11] => deniz.aydin
            [12] => mert.koc
            [13] => seda.yildiz
            [14] => onur.tekin
            [15] => ece.ozkan
            [16] => hakan.erdem
            [17] => gizem.tas
            [18] => tolga.sari
            [19] => ceren.kurt
        )

    [2] => Array
        (
            [0] => gmail
            [1] => yahoo
            [2] => hotmail
            [3] => outlook
            [4] => protonmail
            [5] => mail
            [6] => gmail
            [7] => yahoo
            [8] => hotmail
            [9] => outlook
            [10] => protonmail
            [11] => mail
            [12] => gmail
            [13] => yahoo
            [14] => hotmail
            [15] => outlook
            [16] => protonmail
            [17] => mail
            [18] => gmail
            [19] => yahoo
        )

    [3] => Array
        (
            [0] => com
            [1] => com
            [2] => com
            [3] => com
            [4] => com
            [5] => com
            [6] => com
            [7] => com
            [8] => com
            [9] => com
            [10] => com
            [11] => com
            [12] => com
            [13] => com
            [14] => com
            [15] => com
            [16] => com
            [17] => com
            [18] => com
            [19] => com
        )

)


