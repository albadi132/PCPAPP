import sys
n = int(input())
for i in range(n):
 name = sys.stdin.readline().rstrip('\n')
 print('Hi %s!' % (name))
