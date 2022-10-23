#include <stdio.h>

struct nodo{
    int dato;
    struct nodo *padre;
    struct nodo *izq;
    struct nodo *der;
};


struct nodo *raiz= NULL;
struct nodo *Crear_Nuevo_Nodo(int n, nodo, *padre){
    nodo *nuevo_nuevo = new nodo();
    nuevo_nodo->dato=n;
    nuevo_nodo->der=NULL;
    nuevo_nodo->izq=NULL;
    nuevo_nodo->padre=padre;
    return nuevo_nodo;
}

void Insertar_Nodo(nodo *&raiz, int n, nodo *padre){
    
    if (raiz ==NULL){
        
        nodo *nuevo_nodo =Crear_Nuevo_Nodo(n,padre);
        raiz=nuevo_nodo;
    }else{
        int valorRaiz=raiz->dato;
        
        if(n<valorRaiz){
            Insertar_Nodo(raiz->izq, n,raiz)
        }else{
            Insertar_Nodo(raiz->der, n,raiz)
        }
    }
}


void Imprime_Nodo(nodo *raiz, int aux){
    if(raiz==NULL){
        
        return ;
    }
    Imprime_Nodo(raiz->der, aux+1);
    for(int i=0;i<aux;i++){
        
        printf("   ");
    }
    printf("%d\n", raiz->dato);
    Imprime_Nodo(raiz->izq, aux+1)
    
}


int main(){
    
    int aux=0;
    int dato, datito;
    
    printf("Ingrese valor de la longitud del arbol\n");
    scanf("%d", &datito);
    int num[datito];
    for(int i=0;i<datito;i++){
        scanf("%d", &num[]);
        dato num[i];
        Insertar_Nodo(raiz, dato, NULL);
    }
    Imprime_Nodo(raiz, aux);
    return 0;
}
