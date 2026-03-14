## 8086 dallanma komutları

### 8086 dallanma komutları
  
8086 dallanma komutları 4 gruba ayrılır:  
Koşulsuz: JMP, CALL, RET  
Koşullu: JE, JNE, JC, JG vb.  
Loop komutları: LOOP, LOOPE, LOOPNE  
Register kontrol: JCXZ  
  
| Komut | Açıklama |
|------|-----------|
| JMP | Koşulsuz olarak belirtilen adrese atlar |
| CALL | Alt programa gider |
| RET | Alt programdan geri döner |
| JE / JZ | Eşitse / sıfırsa atla (ZF=1) |
| JNE / JNZ | Eşit değilse / sıfır değilse atla (ZF=0) |
| JC | Carry varsa atla (CF=1) |
| JNC | Carry yoksa atla (CF=0) |
| JO | Overflow varsa atla (OF=1) |
| JNO | Overflow yoksa atla (OF=0) |
| JS | İşaret negatifse atla (SF=1) |
| JNS | İşaret pozitifse atla (SF=0) |
| JP / JPE | Parite çiftse atla (PF=1) |
| JNP / JPO | Parite tekse atla (PF=0) |
| JA | Büyükse atla (unsigned) |
| JAE | Büyük veya eşitse atla |
| JB | Küçükse atla |
| JBE | Küçük veya eşitse atla |
| JG | Büyükse atla (signed) |
| JGE | Büyük veya eşitse atla |
| JL | Küçükse atla |
| JLE | Küçük veya eşitse atla |
| LOOP | CX ≠ 0 oldukça döngü yapar |
| LOOPZ / LOOPE | CX ≠ 0 ve ZF=1 ise döngü |
| LOOPNZ / LOOPNE | CX ≠ 0 ve ZF=0 ise döngü |
| JCXZ | CX = 0 ise atla |