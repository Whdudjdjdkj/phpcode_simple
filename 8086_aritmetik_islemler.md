
## 8086 Aritmetik Komutlar

# 8086 Aritmetik Komutlar

| Komut | Açıklama | Örnek |
|------|----------|------|
| ADD | Toplama yapar | ADD AX,BX |
| ADC | Carry ile toplama yapar | ADC AX,BX |
| SUB | Çıkarma yapar | SUB AX,BX |
| SBB | Borrow ile çıkarma yapar | SBB AX,BX |
| INC | Değeri 1 artırır | INC AX |
| DEC | Değeri 1 azaltır | DEC AX |
| MUL | İşaretsiz çarpma yapar | MUL BX |
| IMUL | İşaretli çarpma yapar | IMUL BX |
| DIV | İşaretsiz bölme yapar | DIV BX |
| IDIV | İşaretli bölme yapar | IDIV BX |
| NEG | Sayının işaretini değiştirir | NEG AX |
| CMP | Karşılaştırma yapar | CMP AX,BX |

### ADD

ADD komutu, hedef operandı (birinci operand) ile kaynak operandı (ikinci operand) toplar ve sonucu hedef operanda saklar. Hedef operand bir register veya bir bellek konumu olabilir; kaynak operand ise immediate (sabit değer), register veya bellek konumu olabilir. (Ancak tek bir komutta iki bellek operandı kullanılamaz.)

MOV AX,20   
MOV BX,30   
ADD AX,BX

AX: AX + BX   
Operation DEST(AX) := DEST(AX) + SRC(BX);