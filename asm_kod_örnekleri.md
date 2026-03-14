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