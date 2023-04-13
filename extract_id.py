import json

f = open('datafile.txt')

r = f.read();
y = json.loads(r);
f.close()
file1 = open('myfile.txt', 'w') 
lenn = len(y['result']['lead'])
for i in range(0,lenn):
    file1.write(y['result']['lead'][i]['id']+"\n")

