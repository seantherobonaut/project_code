from random import *

mystere=randint(1,100)
nb_coups=1
nb_coup_max=10
trouve=False

def saisie(n):
    global mystere
    global nb_coups
    global trouve
    if n==mystere:
        return 1
    elif n<mystere :
        return 2
    else:
        return 3

def coup_max():
    global mystere
    return("vous avez utilisé tous vos coups, le nombre mystere était",mystere)

print('jeu : trouver le nombre mystère entre 1 et 100')
while trouve==False and nb_coups<=nb_coup_max:
    try:
        n=int(input("Essaie %s:" %nb_coups))
    except:
        print("erreur de saisie")
    else:
        resultat = saisie(n)
        if resultat==1:
            print('Bravo vous avez trouvé le nombre mystere:',mystere,'en',nb_coups,'coups')
            trouve=True
        if resultat==2:
            print(n,'est trop petit')
        if resultat==3:
            print(n,'est trop grand')
        
    nb_coups=nb_coups+1

if trouve==False and nb_coups>=nb_coup_max:
    print(coup_max)
