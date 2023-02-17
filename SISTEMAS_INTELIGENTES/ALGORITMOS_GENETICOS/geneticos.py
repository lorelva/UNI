#Algoritmo genetico de Goldberg Max f(x)=x^2

"""
Paso 1: Generar poblacion inicial
Paso 2: Calcular fitness

Paso 3: Numero de generaciones
        WHILE(Numero de generaciones) Ciclo reproductivo
        3.1 Seleccion
        3.2 Cruza o recombinacion
        3.3 Muta
        3.4 Evaluacion o decodificacion
        
Paso 4: 
"""

import math
import random as rnd

def calfitness(poblacion):
    fitness=[]
    for i in poblacion:
        dec=math.pow(int(i,2),2)
        fitness.append(dec)
    return fitness
        
def pobInicial():
    poblacion=[]
    for k in range(4):    
        individuo= ""
        for i in range(5):
            x=rnd.random()
            if x<=0.5:
                individuo+="1"
            else:
                individuo+="0"
        poblacion.append(individuo)
        
    return poblacion

def prob_seleccion(fitness):
    pSeleccion=[]
    suma=sum(fitness)
    
    for i in fitness:
        pSeleccion.append(i/suma)
        
    #print(pSeleccion)
    return pSeleccion

def select_ruleta(pSeleccion, poblacion):
    
    pobSeleccionada=[]
    
    for i in range(4):
        x=rnd.random()
        #print(f"x({i}): {x}")
        #print(f"({i}) {pSeleccion}")
        #print(f"({i}) {poblacion}")

        if (x >= 0 and x < pSeleccion[0]):
            pobSeleccionada.append(poblacion[0])
        elif (x >= pSeleccion[0] and x < pSeleccion[0]+pSeleccion[1]):
            pobSeleccionada.append(poblacion[1])
        elif (x > pSeleccion[0]+pSeleccion[1] and x < pSeleccion[0]+pSeleccion[1]+pSeleccion[2]):
            pobSeleccionada.append(poblacion[2])
        else:
            pobSeleccionada.append(poblacion[3])
        #print(f"Poblacion: {pobSeleccionada}")
    return pobSeleccionada

def cruza(poblacion):
    pobcruzada=[]
    
    for i in range(2):
        ind1, ind2= 0, 0
        while(ind1==ind2):
            ind1=rnd.randint(0,3)
            ind2=rnd.randint(0,3)
        
        print(ind1, ind2)
        ptocruce=rnd.randint(0,4)
        print(ptocruce)
        pobcruzada.append(poblacion[ind1][0:ptocruce]+poblacion[ind2][ptocruce:5])
        pobcruzada.append(poblacion[ind2][0:ptocruce]+poblacion[ind1][ptocruce:5])
        print(pobcruzada)
    return pobcruzada
        
#enumerate: enumera la cadena
def mutacion(poblacion):
    pobmutada=[]
    pMuta=0.1

    
    for i in range(4):
        individuo=""
        x=rnd.random()
        
        if (x<pMuta):
            
            ptomuta=rnd.randint(0,4)
            #print(ptomuta)
            #print(poblacion[i])
        
            for index,gen in enumerate(poblacion[i]):
                if (index==ptomuta):
                    #hacer el intercambio
                    if gen=="0":
                        individuo+="1"
                    else:
                        individuo+="0"
                else:
                    individuo+=gen
            pobmutada.append(individuo)
            print(pobmutada)
        else:
            pobmutada.append(poblacion[i])
    return pobmutada

def evaluacion(poblacion):
    pobEvaluada=[]
    for i in poblacion:
        pobEvaluada.append(int(i, 2))
    return pobEvaluada
    

#Funcion principal
#while
poblacion=pobInicial()
ng=5
i=0
while(i<ng): #Ciclo reproductivo

  #print(poblacion)
  fitness=calfitness(poblacion)
  #print(fitness)
  pSeleccion=prob_seleccion(fitness)
  print("Poblacion con ruleta: ")
  poblacion=select_ruleta(pSeleccion, poblacion)
  #print(poblacion)
  print("Poblacion con cruza y mutacion: ")
  poblacion=cruza(poblacion)
  pobalacion=mutacion(poblacion)
  print(evaluacion(poblacion))
  i+=1