encrypt.o: encrypt.c
	gcc -c encrypt.c -o encrypt.o
checksum.o: checksum.c
	gcc -c checksum.c -o checksum.o
#只有先创建encrypt.o和checksum.o，才能建立libhfsecurity.a存档
libhfsecurity.a: encrypt.o checksum.o
	ar -rcs libhfsecurity.a encrypt.o checksum.o#创建libhfsecurity.a存档
bank_vault: bank_vault.c libhfsecurity.a
	gcc vank_valut.c -I . -L . -lhfsecurity -o bank_vault
