#!/usr/bin/python3

def verifica(info):
    llista = info.split(" ")
    dni = llista[3][:-6] + "\n"
    f = open('includes/presents.txt','r+')
    presents = f.readlines();
    present = False
    if dni in presents:
        present = True
    else:
        f.write(dni);
    f.close()
    return present