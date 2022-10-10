#include <stdio.h>
int main()
{
    int num;
    int i;
    int par=0;
    int impar=0;
    
    scanf("%d", &num);

    int arreglo[num];
    
    for(i=0;i<num; i++){
        scanf("%d", &arreglo[i]);
    }
    
    for(i=0;i<num; i++){
        if(arreglo[i]%2==0){
            par+=1;
            
        }else if(arreglo[i]%2!=0){
            impar+=1;
            
        }
    }
    printf("%d %d", par, impar); 
    return 0;
}
