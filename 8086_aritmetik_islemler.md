
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


### ADC

ADC komutu, hedef operandı (birinci operand), kaynak operandı (ikinci operand) ve carry (CF) bayrağını toplar ve sonucu hedef operand içinde saklar.
Hedef operand bir register veya bir bellek konumu olabilir; kaynak operand ise immediate (sabit değer), register veya bellek konumu olabilir. (Ancak tek bir komutta iki bellek operandı kullanılamaz.)
CF bayrağının durumu, önceki bir toplama işleminden gelen taşıma (carry) değerini temsil eder.
Bir immediate değer operand olarak kullanıldığında, hedef operandın uzunluğuna uygun olacak şekilde işaret genişletmesi (sign extension) yapılır.

MOV AL,255   
MOV BL,1   
ADD AL,BL   

MOV AL,98
MOV BL,1
ADC AL,BL

AL = 98 + 1 + CF(1) 
AL = 100

AL : AL + BL + CF(TAŞMA BAYRAĞI)

Operation DEST := DEST + SRC + CF;