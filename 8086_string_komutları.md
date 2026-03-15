## 8086 STRİNG KOMUTLARI

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



