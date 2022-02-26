#Getting started:
Ce projet est un site d'une agence de voyage qui cible les prospects du marche marocain
qui veulent faire des voyages organises.

#Objectifs:
-Etre visible sur le web.
-Acquerir de nouveaux clients.
-Promouvoir l'agence de voyage sur le marche marocain.

#author:
Ce projet est realise par Otmane KSAANI un developpeur web.

#overview:
##installation:
git clone git@github.com:otmane1993/projet-final-otmane.git

##dependencies:
-Packages front end:axios+react router v6...
-Packages back end:laravel passport...

#overview technique:
##technical assets:
Parmi les technologies utilisees pour ce projet, il y'a:
-Laravel+PHPMyAdmin: pour le BackEnd.
-React js+CSS+Bootstrap: pour le FrontEnd.

##environnememt base de donnees:
-MCD: Le MCD comporte 4 tables User, Sejour, Ville et Hotel.
-MLD:
-Use Case: Le use Case comporte 2 acteurs l'admin et le user.

##Sitemap:
-www.agencia.com: Page d'accueil.
-www.agencia.com/register: Page d'inscription.
-www.agencia.com/login: Page d'authentification.
-www.agencia.com/modify:Page de modification des coordonnees.
-www.agencia.com/history: Page d'historique de reservation.
-www.agencia.com/thanks: Page de remerciement apres reservation.
-www.agencia.com/404: Page erreur 404.

##Api:
Cette application consomme une API,parmi ses routes:
-www.agencia.com/api/register: pour s'inscrire.
-www.agencia.com/api/login: pour s'authentifier.
-www.agencia.com/api/sejours: pour obtenir les sejours d'une recherche.
-www.agencia.com/api/user/update/{id}: pour mettre a jour les coordonnes d'un user.
-www.agencia.com/api/reservation/store: pour creer une reservation.
-www.agencia.com/api/reservation/fetch/{id}: pour obtenir tous les reservations d'un user.