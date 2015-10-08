#include <stdio.h>
#include <stdlib.h>


int main( int argc, char *argv[] )
{

  FILE *fp;
  char path[1035];

  /* Open the command for reading. */
//  fp = popen("/bin/ls /etc/", "r");
fp = popen("/bin/ls /etc/", "r");

system("br -algorithm FaceRecognition -compare ../Authorized/U1/C2.png ../Authorized/U1/ {[a]} > result.txt");
 
  if (fp == NULL) {
    printf("Failed to run command\n" );
    exit(1);
  }

  /* Read the output a line at a time - output it. */
  while (fgets(path, sizeof(path)-1, fp) != NULL) {
  //  printf("%s", path);
  }

  /* close */
  pclose(fp);

  return 0;
}
