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
  FILE *fp , *tfp,*rfp;
  char path[1035];
  char comPath[1024];
  char tempcomPath[1024];
  const char s[2] = " ";
  char *token;
  int nLen;
  int natoiResult, nMatchedResult = 0;
  char MatchedName[100];
  /* Open the command for reading. */
             
fp = popen("/bin/ls ./Authorized/", "r");
//system("br -algorithm FaceRecognition -compare ../uploads/myImage.png ../Authorized/U1/ {[a]} > result.txt");
    
    
    if (fp == NULL) {
    printf("Failed to run command\n" ); 
    exit(1);
  } 
  /* Read the output a line at a time - output it. */
  while (fgets(path, sizeof(path)-1, fp) != NULL) {
    printf("%s", path); 
                                 
  path[strcspn(path, "\n")] = 0;
  nLen =  strlen(path);


  printf("Length : %d",nLen );
  sprintf(comPath,"br -algorithm FaceRecognition -compare ./uploads/myImage.png ./Authorized/%s/ > OUTPUT.txt",path);

  system(comPath);
  printf("/n%s", comPath);


  tfp = fopen("OUTPUT.txt", "r");
  while (fgets(tempcomPath, sizeof(tempcomPath)-1, tfp) != NULL) {
    printf("OUTFILE DATA: %s",tempcomPath);

  /* get the first token */
   token = strtok(tempcomPath, s);
   
   /* walk through other tokens */
   while( token != NULL ) 
   {
      printf( " %s\n", token );
      natoiResult = atoi(token);
      printf("INTERGER VAL: %d",atoi(token));
    if (natoiResult >=3)
   {
      nMatchedResult = natoiResult;
     strcpy(MatchedName,path); 
     sprintf(MatchedName,"%s,%d",path,nMatchedResult);
   }
    
      token = strtok(NULL, s);
   }
   }

  }

rfp = fopen("result.txt", "w");
fputs(MatchedName,rfp);


  /* close */
  pclose(tfp);
  pclose(fp);
  pclose(rfp);


  return 0;
}  
