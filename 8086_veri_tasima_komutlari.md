# 8086 Veri taşıma komutları

### 8086 veri taşıma komutları
| Komut | Açıklama | Örnek |
|------|----------|------|
| MOV  | Veriyi kaynak operanddan hedef operanda kopyalar | MOV AX,BX |
| XCHG | İki operandın değerini değiştirir | XCHG AX,BX |
| PUSH | Veriyi stack'e (yığına) gönderir | PUSH AX |
| POP  | Stack'ten veri alır | POP AX |
| IN   | I/O portundan veri okur | IN AL,60h |
| OUT  | I/O portuna veri gönderir | OUT 60h,AL |
| LEA  | Etkin adresi register'a yükler | LEA SI,ARRAY |
| LDS  | DS ve register'ı bellekten yükler | LDS SI,DATA |
| LES  | ES ve register'ı bellekten yükler | LES DI,DATA |
| XLAT | Tablo çevirisi yapar (AL indeks olarak kullanılır) | XLAT |

### MOV

MOV komutu, ikinci operandı (kaynak operand) birinci operanda (hedef operand) kopyalar. Kaynak operand; immediate değer, genel amaçlı register, segment register veya bellek konumu olabilir. Hedef operand ise genel amaçlı register, segment register veya bellek konumu olabilir.
Her iki operandın da aynı boyutta olması gerekir. Bu boyut byte, word, doubleword veya quadword olabilir.
MOV komutu CS (Code Segment) register’ını yüklemek için kullanılamaz. Bunu yapmaya çalışmak geçersiz opcode hatasına (#UD) neden olur. CS register’ını yüklemek için far JMP, CALL veya RET komutları kullanılmalıdır.
   
MOV AL,BL  
MOV AX,BX  
MOV EAX,EBX  
  
MOV SI,BX  
MOV BP,SP  
V.S  
  
Operation DEST := SRC;  


### XCHG

XCHG komutu, hedef operandın (birinci operand) ve kaynak operandın (ikinci operand) içeriklerini karşılıklı olarak değiştirir.
Operandlar iki genel amaçlı register veya bir register ile bir bellek konumu olabilir.
Eğer bir bellek operandı kullanılırsa, işlem süresi boyunca işlemcinin kilitleme protokolü (locking protocol) otomatik olarak uygulanır. Bu durum LOCK öneki (prefix) kullanılsa da kullanılmasa da ve IOPL değerinden bağımsız olarak gerçekleşir.
(Kilitleme protokolü hakkında daha fazla bilgi için bu bölümdeki LOCK prefix açıklamasına bakınız.)  
  
  
MOV AX,5  
MOV BX,10  
XCHG AX,BX 

sonuç;    
   Register Değer  
   AX.      10  
   BX.      5  

Operation TEMP := DEST; DEST := SRC; SRC := TEMP;  

### POP

Yığının (stack) en üstündeki değeri alır ve hedef operand ile belirtilen konuma yükler, ardından stack pointer (SP/ESP/RSP) değerini artırır. Hedef operand genel amaçlı bir register, bellek konumu veya segment register olabilir.  
  
POP AX  
  
SP = SP + 2  
  
POP EAX  
  
SP = SP + 4  
  
POP RAX 
  
SP = SP + 8  
   
   
Operation IF StackAddrSize = 32  
THEN IF OperandSize = 32  
THEN DEST := SS:ESP; (* Copy a doubleword *)   ESP := ESP + 4;  
ELSE (* OperandSize = 16*)  
DEST := SS:ESP; (* Copy a word *)  
ESP := ESP + 2; FI;  


### PUSH

Yığın işaretçisini (stack pointer) azaltır ve ardından kaynak operandını yığının (stack) en üstüne yerleştirir.

PUSH AX  
PUSH EAX  
PUSH RAX  
  
PUSH SI  
PUSH ESI  
PUSH DI  
PUSH EDI  
  
Operation
IF StackAddrSize = 64  
THEN IF **OperandSize = 64**  
THEN RSP := RSP – 8;  
Memory[SS:RSP] := SRC;  
ELSE IF **OperandSize = 32**  
THEN RSP := RSP – 4;  
Memory[SS:RSP] := SRC;  
ELSE (* **OperandSize = 16** *)  
RSP := RSP – 2;  
Memory[SS:RSP] := SRC; FI; 