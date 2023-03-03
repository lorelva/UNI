import random

##Se crean las matrices(listas) correspondientes para la planta y el zombie.
##Ademas se genera las tuplas de un rango entre 0 al 4 aleatoriamente con la función random 
##y ademaś se les asigna el nuemro de la columna a la que va a pertencer cada uno
def crear_matriz():
    planta = [(random.randint(0, 4), 0)]
    zombie = [(random.randint(0, 4), 4)]
    return planta, zombie


###Esta función se usa para calcular la distancia entre el zombie y la planta
##
def calcular_distancia(planta, zombie):
    zoom_n = len(zombie) ##almacena la longitud de la lista "zombie"
    zoom_flg = [0] * zoom_n   ##lista de ceros del mismo tamaño que zoom_n

    dis = 0  #variable que almacenará la distancia total entre el zombie a la planta
    ##se itera sobre cada una de las tuplas en la lista "planta"
    for p in planta:
        r = p[0]
        c = p[1]
        #se calcula la distancia mínima entre esa planta y todos los zombies 
        # -1 para indicar que no se ha encontrado ningún zombie aún
        zoom_id = -1
        # para indicar que no se ha encontrado una distancia minima todavia
        distancia_minima = -1   
        #se itera sobre todas las tuplas en la lista "zombie"
        for j in range(zoom_n):
            if zoom_flg[j]:
                continue
            r1 = zombie[j][0]
            c1 = zombie[j][1]
            distancia_actual = abs(r1 - r) + abs(c1 - c)

            #Si la distancia actual es menor que la distancia mínima anterior,
            # se actualiza la variable "distancia_minima" y se establece "zoom_id
            if distancia_minima == -1 or distancia_minima > distancia_actual:
                distancia_minima = distancia_actual
                zoom_id = j
        #si no se ha encontrado ningún zombie, se agrega un valor arbitrario de 100 a la distancia total
        if distancia_minima == -1:
            dis += 100
        #si no se le asigna el zombie como asignado a la lista
        else:
            dis += distancia_minima
            zoom_flg[zoom_id] = 1

    return dis


##Se imprime la matriz  de 5x5, se multiplica el simbolo por 5 para representar una casilla del tablero
def imprimir_matriz(planta, zombie):
    # 0 - Vacio 1 - planta 2 - zombie
    matriz = []
    for r in range(5):
        cur_row = ['*'] * 5
        matriz.append(cur_row)
    #iterar sobre cada fila y cada columna de la matriz
    for p in planta:
        matriz[p[0]][p[1]] = 'P'
    for z in zombie:
        matriz[z[0]][z[1]] = 'Z'
    
    #
    for r in range(5):
        for c in range(5):
            print(matriz[r][c], end='')
        print()
    print()

##recorre cada elemento en "zombie y verifica si está fuera del rango 
def esValido(zombie):
    for zoom in zombie:
        if zoom[0] < 0 or zoom[0] > 4 or zoom[1] < 0 or zoom[1] > 4:
            return False
    #devuelve "False", lo que indica que "zombie" no es válido de lo lo contrario true porque si es valido
    zoom_n = len(zombie)
    for i in range(zoom_n):
        for j in range(i + 1, zoom_n):
            if zombie[i] == zombie[j]:
                return False

    return True


def main():
    planta, zombie = crear_matriz()  #llama a  "crear_matriz" para generar una matriz que representa la ubicación inicial de la planta y el otro del zombie
    distancia_actual = calcular_distancia(planta, zombie)  ##se calcula la distancia

    #se define una lista de desplazamientos de movimiento para los zombies en las variables "wx" y "wy".
    wx = [0, 1, -1, 0]
    wy = [1, 0, 0, -1]

    #se ejecuta hasta que la distancia entre las plantas y los zombies es cero
    T = 0
    while distancia_actual > 0:
        #se incrementa el contador de pasos "T"
        T += 1
        print("\nPaso = ", T, ":")
        imprimir_matriz(planta, zombie)

        #calcula todas las posibles combinaciones de movimiento
        zoom_n = len(zombie)
        total_plan = 4 ** zoom_n
        for i in range(total_plan):
            p = i
            next_zoom_list = []
            for j in range(zoom_n):
                d = p % 4
                p //= 4
                r = zombie[j][0] + wy[d]
                c = zombie[j][1] + wx[d]
                next_zoom_list.append((r, c))
            #para las combinaciones validas se calcula la distancia entre las plantas y los zombies
            if esValido(next_zoom_list):
                distancia_sig = calcular_distancia(planta, next_zoom_list)
                if distancia_sig < distancia_actual:
                    distancia_actual = distancia_sig
                    zombie.clear()
                    for zoom in next_zoom_list:
                        zombie.append(zoom)
                        plant_n = len(planta)
                        #se rompe después de que se encuentra la primera combinación de movimiento 
                        for j in range(plant_n):
                            if planta[j] == zoom:
                                planta.pop(j)
                                break
                    break
    #e imprime la matriz final de plantas y zombies.              
    T += 1
    print("\nPaso = ", T, ":")
    imprimir_matriz(planta, zombie)


if __name__ == '__main__':
    main()
