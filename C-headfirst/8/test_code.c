#include <stdio.h>
#include "encrypt.h"
#include "checksum.h"

int main()
{
    char s[] = "Speak friend and enter";
    encrypt(s);
    printf("Encrypted to '%s'\n", s);// encrypt()会加密你的数据，再调用一次就会解密数据。
    printf("Checksum is %i\n", checksum(s));
    encrypt(s);
    printf("Decrypted back to '%s'\n", s);
    printf("Checksum is %i\n", checksum(s));
    return 0;
}