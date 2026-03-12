
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


### SUB

SUB komutu, ikinci operandı (kaynak operand) birinci operanddan (hedef operand) çıkarır ve sonucu hedef operand içinde saklar.
Hedef operand bir register veya bir bellek konumu olabilir; kaynak operand ise immediate (sabit değer), register veya bellek konumu olabilir. (Ancak tek bir komutta iki bellek operandı kullanılamaz.)
Bir immediate değer operand olarak kullanıldığında, hedef operandın uzunluğuna uygun olacak şekilde işaret genişletmesi (sign extension) yapılır.
SUB komutu, tamsayı çıkarma işlemi gerçekleştirir. Sonucu hem işaretli (signed) hem de işaretsiz (unsigned) tamsayılar için değerlendirir ve sonucu göstermek için bayrakları ayarlar

MOV AL,50   
MOV CL,30   
SUB AL,CL   
   
AL = AL - CL   
AL = 50 - 30   
AL = 20   
   
   
Operation DEST := (DEST – SRC);   


### SBB

SBB komutu, kaynak operandı (ikinci operand) ile Carry (CF) bayrağını toplar ve elde edilen sonucu hedef operanddan (birinci operand) çıkarır. Çıkarma işleminin sonucu hedef operand içinde saklanır.
Hedef operand bir register veya bir bellek konumu olabilir; kaynak operand ise immediate (sabit değer), register veya bellek konumu olabilir. (Ancak tek bir komutta iki bellek operandı kullanılamaz.)
CF bayrağının durumu, önceki bir çıkarma işleminden gelen borrow (ödünç alma) değerini temsil eder.
Bir immediate değer operand olarak kullanıldığında, hedef operandın uzunluğuna uygun olacak şekilde işaret genişletmesi (sign extension) yapılır.
SBB komutu, işaretli (signed) veya işaretsiz (unsigned) operandlar arasında bir ayrım yapmaz. Bunun yerine işlemci sonucu her iki veri türü için değerlendirir ve sonucu göstermek için bayrakları ayarlar:
OF (Overflow Flag): işaretli sonuçta taşma oluştuğunu gösterir.
CF (Carry Flag): işaretsiz sonuçta borrow (ödünç alma) oluştuğunu gösterir.
SF (Sign Flag): işaretli sonucun işaretini gösterir.
SBB komutu genellikle, çok baytlı (multibyte) veya çok kelimeli (multiword) bir çıkarma işleminin parçası olarak çalıştırılır. Bu durumda önce SUB komutu çalıştırılır ve ardından oluşan borrow değerini hesaba katmak için SBB komutu kullanılır.

MOV AL,2   
MOV BL,5   
SUB AL,BL   
   
AL = AL - BL   
AL = 2 - 5   
AL = -3   
SET CF BARROW = 1   
   
SBB AL,1   
   
AL = AL - ( 1 + CF)   
AL = -3 - ( 1+1)   
AL = -3 -2    
AL = -5   
    
Operation DEST := (DEST – (SRC + CF));   


### DEC

DEC komutu, hedef operanddan 1 çıkarır, ancak CF (Carry Flag) bayrağının durumunu korur.
Hedef operand bir register veya bir bellek konumu olabilir.
Bu komut, CF bayrağını değiştirmeden bir döngü sayacını (loop counter) güncellemeye izin verir.
(Eğer CF bayrağını da güncelleyen bir azaltma işlemi yapmak istenirse, 1 değerli immediate operand ile birlikte SUB komutu kullanılmalıdır.)

MOV AX,20   
DEC AX   

AX = AX - 1   
AX = 20 -1   
AX(HEDEF OPERAND) = 19   
   
MOV BX,20   
DEC BX  

BX = BX - 1   
BX = 20 - 1   
BC(DEST) = 19


   
MOV SI,20   
DEC SI   

DEC DWORD [100]

Operation DEST := DEST – 1;   


### INC

INC komutu, hedef operandın değerine 1 ekler, ancak CF (Carry Flag) bayrağının durumunu korur.
Hedef operand bir register veya bir bellek konumu olabilir.
Bu komut, CF bayrağını bozmadan bir döngü sayacını (loop counter) güncellemeye olanak sağlar.
(Eğer CF bayrağını da güncelleyen bir artırma işlemi yapmak istenirse, 1 değerli immediate operand ile birlikte ADD komutu kullanılmalıdır.)


MOV BP,20   
INC BP   
   
BP(:DEST) = BP + 1   
BP = 20 + 1   
BP = 21   
    
MOV SP,20  
INC SP  
  
SP(HEDEF) = SP + 1  
SP = 20 + 1  
SP(HEDEF OPERAND) = 21  
  
MOV SI,20  
INC SI  
  
SI = 21  
  
MOV DI,20  
INC DI  
  
DI = 21  
  
INC [DS:100]  
  
DS:100 = DS:100 + 1  
  
Operation DEST := DEST + 1;   


### MUL

İlk operand (hedef operand) ile ikinci operandın (kaynak operand) işaretsiz çarpımını gerçekleştirir ve sonucu hedef operandda saklar.
**Hedef operand örtük** (implied) bir operanddır ve AL, AX veya EAX yazmaçlarında bulunur (operandın boyutuna bağlı olarak). Kaynak operand ise genel amaçlı bir yazmaçta veya bir bellek konumunda bulunur.

***8bit mul örneği***   
MOV AL,5  
MOV BL,4  
MUL BL  

**Çünkü 8-bit çarpım sonucu AX registerına yazılır.**  
   
***16bit mul örneği***  
MOV AX,6  
MOV BX,5  
MUL BX  

**16-bit çarpımda sonuç DX:AX register çiftine yazılır.**
  
Operation IF (Byte operation)   
THEN AX := AL ∗ SRC;   
ELSE IF OperandSize = 16    
THEN DX:AX := AX ∗ SRC;   
ELSE IF OperandSize = 32 AX EAX RAX  
THEN EDX:EAX := EAX ∗ SRC; FI;   
ELSE (* OperandSize = 64 *)   
RDX:RAX := RAX ∗ SRC; FI;  
  
** 8bit 16 bite yazılır AX  
16 bit DX:Ax 32 bite yazılır    
32bit EDX:EAX çiftine 64 bit yazılır.  
64 bit RDX:RAX çiftine yazılır 128 bit***  