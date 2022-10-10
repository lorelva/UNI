#include <stdio.h>

int main()
{
    int num;
    int i, j, k;
    
    scanf("%d", &num);

    for(i=0;i<num; i++){
        
        if(i > 0){
            for(j=1; j<=i+1; j++){
                printf("%d", i+1);
            }
        }else{
            printf("%d", i+1);
        }
        printf("\n");
    }
    
    for(i=num-1;i>=0; i--){
        
        if(i > 0){
            for(j=i+1; j<=1; j--){
                printf("%d", i);
            }
        }else{
            printf("%d", i+1);
        }
        printf("\n");
    }
    
    
    return 0;
}
