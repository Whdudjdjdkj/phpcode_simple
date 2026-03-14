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


### JMP

Program kontrolünü, geri dönüş bilgisi kaydetmeden komut akışı içindeki farklı bir noktaya aktarır. Hedef (target) operandı, atlanacak komutun adresini belirtir. Bu operand; sabit bir değer (immediate value), genel amaçlı bir yazmaç (register) veya bellek konumu (memory location) olabilir.
Bu komut dört farklı türde atlama gerçekleştirmek için kullanılabilir:
Near jump (yakın atlama) — Mevcut kod segmenti içindeki bir komuta atlama yapar (yani CS yazmacının gösterdiği segment içinde). Buna bazen intrasegment jump (segment içi atlama) da denir.
Short jump (kısa atlama) — Atlama aralığı mevcut EIP değerine göre –128 ile +127 arasında sınırlı olan bir near jump türüdür.
Far jump (uzak atlama) — Mevcut kod segmentinden farklı bir segmentte bulunan fakat aynı ayrıcalık seviyesindeki (privilege level) bir komuta atlama yapar. Buna bazen intersegment jump (segmentler arası atlama) da denir.
Task switch (görev değişimi) — Farklı bir görevde bulunan bir komuta atlama yapar. Görev değişimi yalnızca protected mode’da gerçekleştirilebilir (JMP komutu ile görev değişimi yapılması hakkında bilgi için Intel® 64 ve IA-32 Architectures Software Developer’s Manual, Volume 3A, Chapter 10’a bakınız).
Near ve Short Jump
Bir near jump çalıştırıldığında işlemci, hedef operand tarafından belirtilen adres içindeki (mevcut kod segmenti içinde) komuta atlar.
Hedef operand şu iki şekilde belirtilebilir:
Mutlak ofset (absolute offset) — Kod segmentinin başlangıcından itibaren verilen bir ofset
Göreli ofset (relative offset) — EIP yazmacındaki mevcut komut işaretçisi değerine göre işaretli bir kaydırma (displacement)
8 bitlik göreli ofsete (rel8) yapılan near jump, short jump olarak adlandırılır.
Near ve short jump işlemlerinde CS yazmacı değiştirilmez.

| JMP Türü      | Açıklama                         |
|----------------|----------------------------------|
| Short JMP      | -128 ile +127 byte arası         |
| Near JMP       | Aynı segment içinde              |
| Far JMP        | Farklı segment                   |
| JMP Register   | Registerdaki adrese atlar        |
| JMP Memory     | Bellekteki adrese atlar          |

BASLA:  
INC AX  
JMP BASLA  

JMP 1234h:5678h  
**CS = 12340**  
**IP= 5678**  

Operation 
  
IP = (NEW OFFSET)  
  
EIP = (OFFSET)  
  
### CALL


**Yığına (stack) prosedür bağlantı bilgilerini kaydeder ve hedef operand tarafından belirtilen çağrılan prosedüre dallanır. Hedef operand, çağrılan prosedürdeki ilk komutun adresini belirtir.** Operand; anlık değer (immediate value), genel amaçlı bir yazmaç (register) veya bellek konumu (memory location) olabilir.
Bu komut dört tür çağrıyı gerçekleştirmek için kullanılabilir:
Near Call — Mevcut kod segmentindeki (CS yazmacının gösterdiği segment) bir prosedüre yapılan çağrı. Buna bazen segment içi çağrı (intra-segment call) da denir.
Far Call — Mevcut kod segmentinden farklı bir segmentte bulunan bir prosedüre yapılan çağrı. Buna bazen segmentler arası çağrı (inter-segment call) denir.
Inter-privilege-level Far Call — Şu anda çalışan program veya prosedürün ayrıcalık seviyesinden farklı bir ayrıcalık seviyesine sahip segmentteki bir prosedüre yapılan uzak çağrı.
Task Switch — Farklı bir görevde (task) bulunan bir prosedüre yapılan çağrı.

