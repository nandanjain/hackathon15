#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include<string.h>


char * deblank(char *str)
{
  char *out = str, *put = str;

  for(; *str != '\0'; ++str)
  {
    if((*str != ' ') ||(*str != '\n'))
      *put++ = *str;
  }
  *put = '\0';

  return out;
}

int main( int argc, char *argv[] )
{
  FILE *fp;
  char path[1035];
  char comPath[1024];
int nLen;
  /* Open the command for reading. */


fp = popen("/bin/ls ../Authorized/", "r");
//system("br -algorithm FaceRecognition -compare ../uploads/myImage.png ../Authorized/U1/ {[a]} > result.txt");

 

    if (fp == NULL) {
    printf("Failed to run command\n" );
    exit(1);
  }
  /* Read the output a line at a time - output it. */
  while (fgets(path, sizeof(path)-1, fp) != NULL) {
    printf("%s", path);
  nLen =  strlen(path);
// path[nLen] = "\0";
//path = deblank(path);
printf("Length : %d",nLen );
sprintf(comPath,"br -algorithm FaceRecognition -compare ../uploads/myImage.png ../Authorized/U1/ > OUTPUT.txt");
system(comPath);
printf("/n%s", comPath);

  }
  /* close */
  pclose(fp);
  return 0;
}
