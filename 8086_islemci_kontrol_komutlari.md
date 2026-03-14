# 8086 İşlemci kontrol komutları

## 8086 işlemci kontrol komutları

| Komut | Açıklama |
|---|---|
| NOP | Hiçbir işlem yapmaz, sadece işlemci bir komut süresi kadar bekler |
| HLT | İşlemciyi durdurur, kesme (interrupt) gelene kadar çalışmayı durdurur |
| WAIT | İşlemciyi bekletir, özellikle yardımcı işlemci (coprocessor) işlemleri için kullanılır |
| ESC | Harici yardımcı işlemciye (örneğin matematik işlemcisine) komut gönderir |
| LOCK | Bir sonraki komutun bellek erişimini kilitler, çok işlemcili sistemlerde veri bütünlüğü sağlar |


### NOP

Bu komut **hiçbir işlem gerçekleştirmez**. Tek baytlık veya çok baytlı bir **NOP** komutudur ve komut akışında yer kaplar ancak **EIP register’ı** dışında makine durumunu etkilemez.


### HLT

**HLT komutu**, komut yürütmesini durdurur ve işlemciyi **HALT (bekleme)** durumuna geçirir.

Etkin bir **kesme (interrupt)** (**NMI** ve **SMI** dahil), bir **debug istisnası**, **BINIT#**, **INIT#** veya **RESET#** sinyali geldiğinde işlemci tekrar çalışmaya başlar.

Eğer **HLT komutundan sonra çalışmayı devam ettirmek için bir kesme (NMI dahil)** kullanılırsa, kaydedilmiş komut işaretçisi **(CS:EIP)** HLT komutundan **sonraki komutu** gösterir.

**HLT komutu**, **Intel 64** veya **IA-32** işlemcilerinde **Intel Hyper-Threading Technology** desteği varken çalıştırıldığında, yalnızca komutu çalıştıran **mantıksal işlemci (logical processor)** durdurulur. Aynı fiziksel işlemci içindeki diğer mantıksal işlemciler aktif kalmaya devam eder; ancak onlar da ayrı ayrı **HLT komutu** çalıştırırsa durdurulurlar.

### LOCK

LOCK öneki, birlikte kullanıldığı komut yürütülürken işlemcinin LOCK# sinyalini etkinleştirir (komutu atomik bir komuta dönüştürür).
Çok işlemcili bir ortamda LOCK# sinyali, sinyal aktif olduğu sürece işlemcinin paylaşılan belleği özel olarak kullanmasını sağlar.