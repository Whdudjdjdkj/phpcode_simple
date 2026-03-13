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