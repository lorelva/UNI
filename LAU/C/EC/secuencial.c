#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int char2int(char *array, size_t n);
int iterativeBinarySearch(int array[], int start_index, int end_index, int element);

int main(){
    int indice = 0,index = -1,tamArr = 0, posA = 0;
    int numP = 0, numF = 0,numBuscar = 0;
    int *arregloD = malloc(0 * sizeof(int));

    FILE *archivotxt;
    archivotxt = fopen("m.txt", "r");
    if (archivotxt == NULL){
        return 1;
    }


    char fila[1000];
    while (fgets(fila, 1000, archivotxt)){
        numP = char2int(fila, strlen(fila));

        if (indice == 1){
            int *nuevo = realloc(arregloD, numP * sizeof(arregloD));
            tamArr = numP;
        }

        if (indice >= 3){
            if (numP == 0){
                indice++;
                numF = 1;
                continue;
                }
            arregloD[posA] = numP;
            posA++;
        }

        if (numF == 1)
        {
            numBuscar = numP;
        }

        indice++;
    }

    fclose(archivotxt);
    int i =0;
    while (i<tamArr){
        if (arregloD[i] == numBuscar){
            index = i;
        }
        i++;
    }
    printf("Numero de la posicion:%d", index);
    return 0;
}

int char2int(char *array, size_t n)
{
    int number = 0;
    int mult = 1;

    n = (int)n < 0 ? -n : n;

    while (n--)
    {
        if ((array[n] < '0' || array[n] > '9') && array[n] != '-')
        {
            if (number)
            {
                break;
            }
            else
            {
                continue;
            }
        }

        if (array[n] == '-')
        {
            if (number)
            {
                number = -number;
                break;
            }
        }
        else
        {
            number += (array[n] - '0') * mult;
            mult *= 10;
        }
    }

    return number;
}