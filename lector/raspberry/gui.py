#!/usr/bin/python3

import tkinter.messagebox
from tkinter import font

from includes import lector

# Creo la finestra i els seus paràmetres.
tkMessageBox = tkinter.messagebox
top = tkinter.Tk()
top.title("Lector QR")
top.attributes('-fullscreen', True)

# Creo la font que faré servir.
helv36 = font.Font(family='Helvetica', size=36, weight='bold')

# Funció que obre una finestra en fer clic al botó.
def mostra():
    tkMessageBox.showinfo("Informació", lector.start_cam())

# Botó.
B = tkinter.Button(top, text ="Escaneja", command = mostra, height = 5, width = 30, font = helv36)

B.pack(fill="none", expand=True)
top.mainloop()
