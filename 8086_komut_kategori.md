# 8086 Komutlarının Kategorileri

### 8086 komutlarında kategorileri

| Komut Kategorisi | Açıklama | Örnek Komutlar |
|---|---|---|
| Veri Transfer Komutları | Veriyi register, bellek veya I/O arasında taşır | MOV, PUSH, POP, XCHG, LEA, LDS, LES, XLAT, IN, OUT |
| Aritmetik Komutlar | Toplama, çıkarma, çarpma, bölme gibi matematik işlemleri yapar | ADD, ADC, SUB, SBB, INC, DEC, MUL, IMUL, DIV, IDIV, NEG, CMP |
| Mantıksal Komutlar | Bit seviyesinde mantıksal işlemler yapar | AND, OR, XOR, NOT, TEST |
| Kaydırma ve Döndürme Komutları | Bitleri sağa veya sola kaydırır veya döndürür | SHL, SAL, SHR, SAR, ROL, ROR, RCL, RCR |
| Kontrol Transfer Komutları | Program akışını değiştirir (dallanma ve çağrı) | JMP, CALL, RET, JE, JNE, JG, JL, LOOP |
| String Komutları | Bellekteki veri dizileri üzerinde işlem yapar | MOVS, LODS, STOS, SCAS, CMPS |
| Bayrak Komutları | Flag register üzerindeki bayrakları kontrol eder veya değiştirir | CLC, STC, CMC, CLD, STD, CLI, STI |
| İşlemci Kontrol Komutları | İşlemcinin çalışma durumunu kontrol eder | NOP, HLT, WAIT, ESC, LOCK |

### KAYDIRMA VE DÖNDÜRME KOMUTLARI

Birinci operanddaki (hedef operand) bitleri, ikinci operandda (sayım operandı) belirtilen bit sayısı kadar sola veya sağa kaydırır. Hedef operand sınırını aşan bitler önce CF bayrağına kaydırılır, ardından atılır. Kaydırma işleminin sonunda CF bayrağı, hedef operanddan en son çıkan biti içerir.
Hedef operand bir register veya bellek konumu olabilir. Sayım operandı ise sabit bir değer (immediate) veya CL register’ı olabilir. Sayım değeri 5 bit ile maskelenir (64-bit operand kullanıldığında 6 bit). Bu nedenle sayım aralığı 0–31 (64-bit operand için 0–63) ile sınırlıdır. 1 bitlik kaydırma için özel bir opcode kodlaması vardır.
