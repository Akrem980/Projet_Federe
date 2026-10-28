# 🎬 Script de Démonstration — Healthcare Portal
## Guide de Présentation Live (Démo Guidée)

**Durée estimée :** 8–10 minutes  
**Prérequis :** Application lancée sur `localhost`, base de données importée, navigateur en plein écran

---

## 🎤 Introduction (30 secondes)

> *"Bonjour, je m'appelle [Votre Nom] et je vais vous présenter le Healthcare Portal, notre application web de gestion des rendez-vous médicaux développée en PHP, MySQL et JavaScript. L'application supporte trois types d'utilisateurs : les patients, les médecins et l'administrateur. Je vais vous montrer le parcours complet d'un patient qui réserve un rendez-vous, puis la gestion côté médecin."*

---

## 📍 Étape 1 — Page d'Accueil & Inscription Patient (1 minute 30)

**URL :** `http://localhost/healthcare-portal/Web_Pages/HealthCare.html`

> *"Voici la page d'accueil de l'application. Elle sert à la fois de page de bienvenue et de formulaire de connexion. Pour commencer, je vais créer un compte patient."*

1. Cliquer sur le lien **"Register here"** pour aller sur la page d'inscription.

> *"La page d'inscription propose deux rôles : Patient ou Médecin. Pour un médecin, des champs supplémentaires apparaissent : la spécialité et la ville."*

2. Remplir le formulaire avec les données suivantes :
   - **Prénom :** Ahmed
   - **Nom :** Benali
   - **Email :** ahmed.benali@test.com
   - **Téléphone :** 0612345678
   - **Mot de passe :** test1234
   - **Confirmer mot de passe :** test1234
   - **Rôle :** Patient

3. Cliquer sur **"Create Account"**.

> *"Le système vérifie que l'email est unique, que les mots de passe correspondent et que tous les champs obligatoires sont remplis. Le mot de passe est haché avec bcrypt avant d'être stocké en base. Après inscription, l'utilisateur est automatiquement redirigé vers son tableau de bord patient."*

---

## 📍 Étape 2 — Tableau de Bord Patient (45 secondes)

> *"Voici le tableau de bord patient. Il affiche les prochains rendez-vous avec leur statut — 'scheduled', 'completed' ou 'cancelled'. Pour l'instant, il est vide car le compte vient d'être créé. Le menu latéral propose : Dashboard, Find Doctors, Settings et Logout."*

4. Faire un tour rapide de l'interface (pointer le sidebar, les badges de statut).

---

## 📍 Étape 3 — Recherche de Médecin (1 minute 30)

5. Cliquer sur **"Find Doctors"** dans le sidebar.

> *"La page de recherche permet de filtrer les médecins par nom, spécialité et ville. Les résultats s'affichent sous forme de cartes avec le nom, la spécialité et la localisation du praticien."*

6. Dans le filtre **"Specialty"**, sélectionner **"Cardiology"**.
7. Cliquer sur **"Search"**.

> *"L'application filtre les médecins en temps réel depuis la base de données. Supposons qu'un médecin cardiologue apparaît — par exemple Dr. Karima Mansouri à Tunis. Je clique sur 'Book Appointment'."*

8. Cliquer sur **"Book Appointment"** sur l'une des cartes.

---

## 📍 Étape 4 — Réservation du Rendez-vous (1 minute 30)

> *"Une modale s'ouvre avec les informations du médecin. Je dois choisir une date, puis les créneaux disponibles se chargent automatiquement via une requête AJAX."*

9. Sélectionner une date dans le futur (ex : demain).

> *"Les créneaux sont générés dynamiquement en interrogeant les rendez-vous existants pour ce médecin à cette date. Les créneaux déjà pris apparaissent grisés et non cliquables."*

10. Cliquer sur un créneau disponible (ex : **09:00**).

> *"Je sélectionne le créneau. Le bouton 'Confirm Booking' s'active uniquement après sélection d'un créneau."*

11. Cliquer sur **"Confirm Booking"**.

> *"Le système vérifie une dernière fois côté serveur que ce créneau n'a pas été pris entre-temps, puis insère le rendez-vous en base avec le statut 'scheduled'. Une confirmation flash s'affiche."*

12. Observer le message de succès vert en haut du tableau de bord patient.
13. Vérifier que le rendez-vous apparaît dans le dashboard.

> *"Le rendez-vous est maintenant visible dans le tableau de bord patient avec la date, le nom du médecin et le statut 'Scheduled'."*

---

## 📍 Étape 5 — Connexion en tant que Médecin (45 secondes)

14. Cliquer sur **"Logout"** dans le sidebar.
15. Revenir sur `HealthCare.html`.

> *"Je me connecte maintenant avec le compte du médecin pour voir comment la réservation apparaît de son côté."*

16. Entrer les identifiants du médecin (compte créé au préalable).
17. Cliquer sur **"Login"**.

> *"Le système détecte le rôle 'doctor' et redirige automatiquement vers le tableau de bord médecin."*

---

## 📍 Étape 6 — Tableau de Bord Médecin (1 minute 30)

> *"Voici le tableau de bord médecin. Les quatre compteurs en haut affichent le total des rendez-vous, les programmés, les complétés et les annulés. Les onglets permettent de naviguer entre 'Today', 'Upcoming' et 'All Appointments'."*

18. Cliquer sur l'onglet **"Upcoming"**.

> *"Je vois le rendez-vous qu'Ahmed vient de réserver — avec son nom, son numéro de téléphone, la date et l'heure. Deux actions sont disponibles : marquer comme terminé ou annuler."*

19. Cliquer sur **"Complete"** pour marquer le rendez-vous comme terminé.

> *"Le système met à jour le statut en 'completed' et recharge la page. Le compteur 'Completed' passe à 1."*

---

## 📍 Étape 7 — Paramètres Utilisateur (30 secondes, optionnel)

20. Cliquer sur **"Settings"** dans le sidebar.

> *"La page Settings permet à tout utilisateur — patient ou médecin — de modifier ses informations personnelles et de changer son mot de passe. Le changement de mot de passe nécessite de confirmer l'ancien mot de passe."*

---

## 🎤 Conclusion (30 secondes)

> *"Voilà la démonstration complète du Healthcare Portal. Nous avons vu le parcours complet d'un patient : inscription, recherche de médecin, sélection d'un créneau horaire et réservation. Puis côté médecin : visualisation et gestion des rendez-vous. L'application implémente un système RBAC complet, une sécurisation des données et une interface moderne responsive."*

> *"Ce projet a été développé en 3 sprints Scrum avec une équipe de 4 personnes sur 6 semaines. La version finale est disponible sur GitHub. Merci de votre attention — nous sommes disponibles pour répondre à vos questions."*

---

## 💡 Conseils pour la Démo Live

- Avoir deux comptes préparés en avance : un patient et un médecin avec des rendez-vous déjà existants
- Utiliser un navigateur en mode plein écran, zoom à 90% pour tout afficher
- Avoir phpMyAdmin ouvert dans un autre onglet pour montrer la base de données si demandé
- Préparer un créneau horaire libre pour la démo live (éviter les conflits)
- En cas d'erreur : mentionner sereinement la gestion des erreurs comme feature, non comme bug

---

*Script de démo — Healthcare Portal v1.0*
