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
  FILE *fp , *tfp;
  char path[1035];
  char comPath[1024];
  char tempcomPath[1024];

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


  printf("Length : %d",nLen );
  sprintf(comPath,"br -algorithm FaceRecognition -compare ../uploads/myImage.png ../Authorized/U1/ > OUTPUT.txt");

  system(comPath);
  printf("/n%s", comPath);


  tfp = fopen("OUTPUT.txt", "r");
  while (fgets(tempcomPath, sizeof(tempcomPath)-1, tfp) != NULL) {
    printf("OUTFILE DATA: %s",tempcomPath);
   }

  }
  /* close */
  pclose(fp);
  return 0;
}  
