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
**CODE ENDS**

program örneği burada biter.
