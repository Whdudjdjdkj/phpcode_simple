## 8086 STRİNG KOMUTLARI

### 8086 String Komutları Ne İşe Yarar?

8086 string komutları, bellekte bulunan dizi (array) veya karakter dizileri (string) üzerinde işlem yapmak için kullanılan komutlardır. Bu komutlar sayesinde veri kopyalama, karşılaştırma, arama ve yazma işlemleri hızlı şekilde yapılır.

| Amaç | Açıklama |
|------|---------|
| Veri kopyalama | Bir diziyi başka bir diziye kopyalamak |
| Karşılaştırma | İki string veya diziyi karşılaştırmak |
| Arama | Dizide belirli bir karakter veya değeri bulmak |
| Yazma | Registerdaki veriyi diziye yazmak |

| Komut | Açılımı | Açıklama |
|------|---------|---------|
| MOVSB | Move String Byte | DS:SI adresindeki 1 byte veriyi ES:DI adresine kopyalar |
| MOVSW | Move String Word | DS:SI adresindeki 1 word (2 byte) veriyi ES:DI adresine kopyalar |
| LODSB | Load String Byte | DS:SI adresindeki byte değeri AL registerına yükler |
| LODSW | Load String Word | DS:SI adresindeki word değeri AX registerına yükler |
| STOSB | Store String Byte | AL registerındaki değeri ES:DI adresine yazar |
| STOSW | Store String Word | AX registerındaki değeri ES:DI adresine yazar |
| CMPSB | Compare String Byte | DS:SI ve ES:DI adreslerindeki byte değerleri karşılaştırır |
| CMPSW | Compare String Word | DS:SI ve ES:DI adreslerindeki word değerleri karşılaştırır |
| SCASB | Scan String Byte | AL ile ES:DI adresindeki byte değeri karşılaştırır |
| SCASW | Scan String Word | AX ile ES:DI adresindeki word değeri karşılaştırır |

## String Prefix (Tekrar) Komutları

| Prefix | Açıklama |
|------|---------|
| REP | CX sıfır olana kadar komutu tekrar eder |
| REPE / REPZ | CX ≠ 0 ve ZF = 1 oldukça tekrar eder |
| REPNE / REPNZ | CX ≠ 0 ve ZF = 0 oldukça tekrar eder |
