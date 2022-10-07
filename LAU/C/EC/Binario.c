#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int recorrerArreglo(int array[], int start_index, int end_index, int element){
   while (start_index <= end_index){
      int middle = start_index + (end_index- start_index )/2;
      if (array[middle] == element){
         return middle;

      }
      if (array[middle] < element){
         start_index = middle + 1;

      }
      else{
         end_index = middle - 1;

      }
   }
   return -1;
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


    int i = 0;
    int j = 0;
     for (size_t i = 0; i < tamArr; ++i)
    {
        for (size_t j = i + 1; j < tamArr; ++j)
        {
            if (arregloD[i] > arregloD[j])
            {
                int nuevo = arregloD[i];
                arregloD[i] = arregloD[j];
                arregloD[j] = nuevo;
            }
        }
    }

    int posiFinal = recorrerArreglo(arregloD,0 , tamArr, numBuscar);

    printf("Numero de la posicion:%d", posiFinal);
    return 0;
}

