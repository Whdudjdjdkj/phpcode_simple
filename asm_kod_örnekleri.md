# ASM KOD ÖRNEKLERİ

## DİZİNİN ELEMANLARINI TOPLAMA 
Bu program belirtilen dizideki elemanların tek tek
toplamını ax registerina toplar 

RAM DB 1,2,3,4,5  
 
MOV AX,0  
MOV CX,5  
MOV SI,OFFSET RAM  
PROGRAM:  
MOV BL,[SI]  
ADD AX,BL  
INC SI  
LOOP PROGRAM  
  
AX SONUCU 15 MİDİR. 

EVET  

**DATA SEGMENT**  
RAM DB 1,2,3,4,5  
LEN DB 5  
**DATA ENDS**  
  
**CODE SEGMENT**  
MOV AX,0  
MOV CX,LEN  
MOV SI,OFFSET RAM  
PROGRAM:  
MOV BL,[SI]  
ADD AX,BL  
INC SI  
LOOP PROGRAM  
**CODE ENDS**. 
  
program örneği burada biter.  


## FAKTORİYEL HESABI
#### EFEKTİF OLARAK CX O KULLANARAK
 
5 SAYISININ FAKTORİYEL HESABINI YAPAR.
  
DATA SEGMENT  
FAKTORIYEL DB 5  
DATA ENDS  
  
CODE SEGMENT  
MOV AX,1  
MOV CH,0  
MOV CL,FAKTORIYEL  
  
PROGRAM:  
MUL CX  
LOOP PROGRAM  
  
CODE ENDS  
END START  
  
OUT:120 


## DİZİNİN ELEMANLARINI ÇARPMA

### DİZİNİN ELEMANLARİNİ CARPAR
  
DATA SEGMENT  
TABLE DW 1,2,6,4,5  
DATA ENDS  
  
CODE SEGMENT  
ASSUME CS:CODE, DS:DATA. 
  
START:  
  
MOV AX,DATA  
MOV DS,AX  
  
MOV AX,1  
MOV CX,5  
MOV SI,OFFSET TABLE  
  
PROGRAM:  
MOV BX,[SI]  
MUL BX  
ADD SI,2  
LOOP PROGRAM  

CODE ENDS  
END START  

OUT:240  


## XLAT KOMUTU İLE TABLO ELEMANİ COZUMLEME

XLAT KOMUTUNUN KULLANIMI KODLARI.

DATA SEGMENT  
TABLE DB 10,20,30,40  
DATA ENDS  
  
CODE SEGMENT  
START:  
MOV AX,DATA  
MOV DS,AX  
  
MOV BX,OFFSET TABLE  
MOV AL,3  
XLAT  
  
CODE ENDS  
END START. 

AL=40.

## İKİ SAYIYI TOPLAMINI BULMA
  
DATA SEGMENT  
A DB 5  
B DB 3  
SONUC DB ?  
DATA ENDS  
  
CODE SEGMENT  
START:  
MOV AX,DATA  
MOV DS,AX  
  
MOV AL,A  
ADD AL,B  
MOV SONUC,AL  
  
CODE ENDS  
END START  

## PRINT ILE EKRANA YAZI YAZMA KULLANIMI

PRINTF fonksiyonunu parametreleriyle kullanmak için düzenlemeler yapılmış.2.parametre geçen yazıyı 1.parametre ile formatlayarak ekrana yazdırır.
  
DATA SEGMENT   
PRINT_FORMATI DB "MESSAGE: %S",0  
MESSAGE       DB "MESSAGE",0  
DATA ENDS  
  
EXTRN PRINTF:NEAR  
  
CODE SEGMENT  
ASSUME CS:CODE, DS:DATA  
  
START:  
    MOV AX,DATA  
    MOV DS,AX  
  
    PUSH OFFSET MESSAGE  
    PUSH OFFSET PRINT_FORMATI  
    CALL PRINTF  
  
    ADD SP,4  
  
    MOV AH,4CH  
    INT 21H   
   
CODE ENDS  
END START  

## KARAKTER DİZİSİNİ BAŞKA DİZİYE KOPYALAMAK
## HEDEF VERİSİNE,KAYNAK VERİSİNİ BYTE BYTE KOPYALAR.

2.parametre ile verilen karakter dizisini,1.parametre ile verilen karakter için ayrılmış bellek bloğuna byte byte adım adım kopyalar.bu arada bir label bırakmak gerekirse **işlemci her komutu byte byte adım adım çalıştırır yazılarda ve string işlemlerinde**..arz ederim.
  
HEDEF  DB 20 DUP(0)  
KAYNAK DB "HELLO WORLD",0  
  
MOV DI,OFFSET HEDEF  
MOV SI,OFFSET KAYNAK  
  
PROGRAM:  
MOV AL,[SI]  
MOV [DI],AL  
INC SI  
INC DI  
CMP AL,0  
JZ CIK  
JMP SHORT PROGRAM  
  
CIK:  
HLT  


## YAZININ UZUNLUĞUNU HESAPLAMA

Bir yazının string sonu karaktere kadar 0 bx sayaç yapılarak uzunluğunu hesaplayıp len değişkenine kayıt eden.11 sonucunu bulan program.

HEDEF DB "HELLO WORLD",0  
LEN DW 0  
MOV DI,OFFSET HEDEF  
  
MOV BX,0  
HEDEF_UZUNLUK:  
MOV AL,[DI]  
CMP AL,0  
JZ CIK1  
INC BX  
INC DI  
JMP HEDEF_UZUNLUK  
  
CIK1:  
MOV LEN,BX  
HLT  


## BUYUK SAYIYI BULMA
  
İki sayıyı karşılaştırır ve büyük olanı BUYUK değişkenine kayıt eder.

A DB 5  
B DB 10  
BUYUK DB 1 DUP(0)  
  
MOV AL,A  
CMP AL,B  
JG BUYUK  
  
MOV AL,B  
MOV BUYUK,AL  
JMP CIK  
  
BUYUK:  
MOV BUYUK,A  
  
CIK:  
HLT  


## EN BÜYÜK SAYIYI BULMA
  
Bir dizideki en büyük sayıyı Bulma.

DATA SEGMENT  
TABLE DB 1,2,3,4,5,6,7,8,9,10  
EN_BUYUK DB 0  
DATA ENDS  
  
CODE SEGMENT  
ASSUME DS:DATA  
  
START:  
MOV AX,DATA  
MOV DS,AX  
  
MOV DI,OFFSET TABLE  
MOV AL,[DI]  
MOV EN_BUYUK,AL  
  
MOV CL,10  
INC DI  
DEC CL  
  
PROGRAM:  
MOV AL,[DI]  
CMP AL,EN_BUYUK  
JG GUNCELLE  
INC DI  
LOOP PROGRAM  
  
HLT  
  
GUNCELLE:  
MOV EN_BUYUK,AL  
INC DI  
LOOP PROGRAM  
  
CODE ENDS  
END START  

### Programın Yaptığı İş

1. Dizinin ilk elemanını `EN_BUYUK` değişkenine koyar.  
2. Dizinin geri kalan elemanlarını tek tek karşılaştırır.  
3. Eğer daha büyük bir sayı bulunursa `EN_BUYUK` değeri güncellenir.  
4. Döngü tamamlandığında `EN_BUYUK` değişkeni dizideki en büyük değeri içerir.

**Sonuç:**

## MOVSB KOMUTUYLA KAYNAK STRİNGİ HEDEF BELLEK ALANINA KOPYALAMA

Movsb komutu string karakterini veritransfet komutudur.çok kullanışlıdır.movab komutu veritransfer komutu olup.string transfer eder.es:di den ds:di bir byte veri kopyalar.si ve di bir artırır.eğer DF 0 ise.
DF 1 ise si ve di bir eksiltilir.rep öneki ile kullanıldığında verimlidir.  

CLD ve std komutları vardır.
CLD Clear Direction 
std set Direction dur.

DATA SEGMENT  
HEDEF DB 20 DUP(0)  
KAYNAK DB "HELLO WORLD",0  
DATA ENDS  
  
CODE SEGMENT  
MOV AX,DATA  
MOV DS,AX  
MOV ES,AX  
MOV DI,OFFSET HEDEF  
MOV SI,OFFSET KAYNAK  
CLD  
MOV CX,11  
REP MOVSB  
  
CODE ENDS  

## Dizideki sayıların toplamını LODSB komutu örneği ile bulma

TABLE DB 10,20,30,40,50  
  
MOV BX,0  
MOV SI,OFFSET TABLE  
MOV CX,5  
CLD  
PROGRAM:  
LODSB  
ADD BL,AL  
LOOP PROGRAM  

## Programın yaptığı iş
**Program 10'dan başlayarak her seferinde 10 artırıp diziye yazıyor**
diziye sayı yazma programı  

TABLE DB 5 DUP(0)  

MOV DI,OFFSET TABLE  
MOV CX,5  
MOV AL,10  
PROGRAM:   
ADD AL,10  
STOSB  
LOOP PROGRAM  
HLT  


## Stack kullanımı

8086 WORD STACK KULLANIMI  
  
[BITS 16]  
[ORG 1000h]  
  
A DB 10  
B DB 25  
  
MOV SP,1000h  
PUSH BYTE A  
PUSH BYTE B  
CALL TOPLA  
ADD SP,2  
  
TOPLA:  
MOV AL,[SP+2]  
MOV BL,[SP+3]  
ADD AL,BL  
RET  
  
CIK:  
HLT  
  
  