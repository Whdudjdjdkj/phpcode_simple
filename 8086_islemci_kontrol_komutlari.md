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