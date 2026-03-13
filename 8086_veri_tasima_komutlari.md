# Veri taşıma komutları

### veri taşıma komutları
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