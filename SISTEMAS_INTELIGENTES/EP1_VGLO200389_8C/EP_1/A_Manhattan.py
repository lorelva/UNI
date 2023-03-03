
##cadena "msg" que se utiliza para imprimir un mensaje en la consola antes de que se lea la matriz. 
def leer_matriz(msg: str):
    print(msg)
    #ingrese una matriz de 3x3 a través de la entrada estándar.
    matriz = []
    #verificar que no se ingresen números repetidos en la matriz.
    num_flg = [0] * 9

    #leer los valores de cada celda de la matriz. 
    for r in range(3):
        #se crea una lista vacía  para almacenar los valores de la fila actual.
        cur_row = []
        # lee una línea de entrada y la divide en una lista de valores utilizando 
        # el método "split()" y la función "strip()" para eliminar los espacios en blanco.
        line = input().strip().split()
        for c in range(3):
            v = line[c]
            num = 0
            #si es valido se convierte en un entero y se almacena en una variable llamada "num"
            if '0' < v < '9':
                num = int(v)
            cur_row.append(num)
            #Si se encuentra un número repetido, la función devuelve "None"
            if num_flg[num] == 1:
                return None
            num_flg[num] = 1
        matriz.append(cur_row)
    return matriz

##busca la posición del número "num" en la matriz.
def encontrar_pos(matriz, num):
    #se verifica si su valor es igual a "num", si es valido las devuelve
    for r in range(3):
        for c in range(3):
            if matriz[r][c] == num:
                return r, c

##representan el estado actual y el estado objetivo de un juego del 8-puzzle.
def calcular_distancia(matriz_actual, matriz_meta):
    #se inicializa la varible dis
    dis = 0
    #calcula la distancia de Manhattan entre las celdas de la matriz actual 
    # y las celdas de la matriz objetivo
    #iterar sobre los números del 1 al 8.
    for i in range(1, 9):
        #obtener la posición de la celda correspondiente en ambas matrices. 
        r1, c1 = encontrar_pos(matriz_actual, i)
        r2, c2 = encontrar_pos(matriz_meta, i)
        #obtener la posición de la celda correspondiente en ambas matrices. 
        dis += abs(r1 - r2) + abs(c1 - c2)
    return dis


def mostrar_matriz(matriz):
    for r in range(3):
        for c in range(3):
            if matriz[r][c] == 0:
                print('_', end=' ')
            else:
                print(matriz[r][c], end=' ')
        print()
    print()


def main():
    matriz_actual = leer_matriz('Ingresa la matriz inicial:')
    if matriz_actual is None:
        print('Matriz invalida')
        return
    print()
    matriz_meta = leer_matriz('Ingresa la matriz destino:')
    if matriz_meta is None:
        print('Matriz invalida')
        return
    print()
    print('==========================')

    wx = [0, 1, 0, -1]
    wy = [1, 0, -1, 0]
    actualizado = True
    num_paso = 0
    while actualizado:
        num_paso += 1
        print("Movimiento ", num_paso, ':')
        print()
        mostrar_matriz(matriz_actual)

        actualizado = False
        r0, c0 = encontrar_pos(matriz_actual, 0)
        distancia_actual = calcular_distancia(matriz_actual, matriz_meta)
        for i in range(4):
            r1 = r0 + wy[i]
            c1 = c0 + wx[i]
            if r1 >= 0 and r1 < 3 and c1 >= 0 and c1 < 3:
                matriz_actual[r1][c1], matriz_actual[r0][c0] = matriz_actual[r0][c0], matriz_actual[r1][c1]
                next_dis = calcular_distancia(matriz_actual, matriz_meta)
                if next_dis < distancia_actual:
                    actualizado = True
                    break
                else:
                    matriz_actual[r1][c1], matriz_actual[r0][c0] = matriz_actual[r0][c0], matriz_actual[r1][c1]


if __name__ == '__main__':
    main()
