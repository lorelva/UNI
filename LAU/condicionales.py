
N = int(input())
i = 0

if N % 2 == 0:
    i = N % 2
else:
    i = N + 1
    
if N % 3 == 0:
    i= N-1
    
print(i)