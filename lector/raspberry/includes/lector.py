#!/usr/bin/python3

import os

from includes import verifica


# Per amagar el terminated cal utilitzar python3 qr.py 2> /dev/null.
def start_cam():
    #Initializes an instance of Zbar to the commandline to detect barcode data-strings.
    password = "password"
    codi = ""
    p=os.popen('/usr/bin/zbarcam --prescale=300x200','r')
    #print("Please Scan a QRcode to begin...")
    for i in p:
        codi = codi + i
        for n in i:
            if n == "=":
                os.system("killall zbarcam")
                break
    #print (codi)
    barcodedata = str(codi)[8:]
    #print (barcodedata)
    process = os.popen('echo "%s" | openssl enc -aes-256-cbc -d -a -k %s' % (barcodedata,password))
    informacio = process.read()

    assistit = verifica.verifica(informacio)
    if assistit == True:
        informacio = informacio + "Present: Sí\n"

    return informacio

#print (start_cam())
