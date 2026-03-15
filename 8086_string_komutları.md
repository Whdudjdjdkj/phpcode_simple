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


### MOVSB

## MOVSB Komutu Nedir? (8086)

**MOVSB (Move String Byte)** komutu, bellekteki **1 byte veriyi bir kaynaktan alıp başka bir bellek adresine kopyalamak** için kullanılan 8086 string komutudur.

Bu komut çalışırken şu adres registerlarını kullanır:

- **DS:SI** → Kaynak adres (source)  
- **ES:DI** → Hedef adres (destination)

Yani komut çalıştığında:

- **DS:SI adresindeki 1 byte veri alınır**
- **ES:DI adresine yazılır**

---

### Çalışma Mantığı

| İşlem | Açıklama |
|------|---------|
| Okuma | DS:SI adresindeki byte okunur |
| Yazma | Bu byte ES:DI adresine yazılır |
| Güncelleme | SI ve DI registerları otomatik değişir |

---

### Direction Flag (DF) Etkisi

| DF değeri | SI ve DI değişimi |
|----------|------------------|
| DF = 0 | SI ve DI 1 artar (ileri yönde) |
| DF = 1 | SI ve DI 1 azalır (geri yönde) |

---

### Örnek

```asm
MOV SI,OFFSET KAYNAK
MOV DI,OFFSET HEDEF
MOVSB
```


## MOVSW Komutu Nedir? (8086)

**MOVSW (Move String Word)** komutu, bellekte bulunan **1 word (2 byte)** veriyi bir kaynaktan alıp başka bir bellek adresine kopyalamak için kullanılan 8086 **string komutudur**.

Bu komut aşağıdaki adres registerlarını kullanır:

- **DS:SI** → Kaynak adres (source)  
- **ES:DI** → Hedef adres (destination)

Komut çalıştığında:

- **DS:SI adresindeki 1 word (2 byte) veri okunur**
- **ES:DI adresine yazılır**

---

### Çalışma Mantığı

| İşlem | Açıklama |
|------|---------|
| Okuma | DS:SI adresindeki word veri okunur |
| Yazma | Bu veri ES:DI adresine yazılır |
| Güncelleme | SI ve DI registerları otomatik değişir |

---

### Direction Flag (DF) Etkisi

| DF değeri | SI ve DI değişimi |
|----------|------------------|
| DF = 0 | SI ve DI 2 artar (ileri yönde) |
| DF = 1 | SI ve DI 2 azalır (geri yönde) |

---

### Örnek

```asm
MOV SI,OFFSET KAYNAK
MOV DI,OFFSET HEDEF
MOVSW
```


## LODSB Komutu Nedir? (8086)

**LODSB (Load String Byte)** komutu, bellekte bulunan **1 byte veriyi okuyarak AL registerına yükleyen** 8086 string komutudur.

Bu komut aşağıdaki adres registerını kullanır:

- **DS:SI** → Kaynak adres (source)

Komut çalıştığında:

- **DS:SI adresindeki 1 byte veri okunur**
- **AL registerına yüklenir**

---

### Çalışma Mantığı

| İşlem | Açıklama |
|------|---------|
| Okuma | DS:SI adresindeki byte okunur |
| Yükleme | Okunan veri AL registerına aktarılır |
| Güncelleme | SI registerı otomatik değişir |

---

### Direction Flag (DF) Etkisi

| DF değeri | SI değişimi |
|----------|-------------|
| DF = 0 | SI 1 artar (ileri yönde okuma) |
| DF = 1 | SI 1 azalır (geri yönde okuma) |

---

### Örnek

```asm
MOV SI,OFFSET DIZI
LODSB
```


## LODSW Komutu Nedir? (8086)

**LODSW (Load String Word)** komutu, bellekte bulunan **1 word (2 byte)** veriyi okuyarak **AX registerına yükleyen** 8086 string komutudur.

Bu komut aşağıdaki adres registerını kullanır:

- **DS:SI** → Kaynak adres (source)

Komut çalıştığında:

- **DS:SI adresindeki 1 word (2 byte) veri okunur**
- **AX registerına yüklenir**

---

### Çalışma Mantığı

| İşlem | Açıklama |
|------|---------|
| Okuma | DS:SI adresindeki word veri okunur |
| Yükleme | Okunan veri AX registerına aktarılır |
| Güncelleme | SI registerı otomatik değişir |

---

### Direction Flag (DF) Etkisi

| DF değeri | SI değişimi |
|----------|-------------|
| DF = 0 | SI 2 artar (ileri yönde okuma) |
| DF = 1 | SI 2 azalır (geri yönde okuma) |

---

### Örnek

```asm
MOV SI,OFFSET DIZI
LODSW
```

# STOSB Komutu (Store String Byte)

`STOSB`, 8086 Assembly'de **AL registerındaki 1 byte veriyi ES:DI adresine yazan** string komutudur.

---

# STOSW Komutu (Store String Word)

`STOSW`, 8086 Assembly’de kullanılan bir **string komutudur**.  
Bu komut **AX registerındaki 16 bit (word) veriyi ES:DI adresine yazar.**

--