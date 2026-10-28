# ✅ Checklist de Soumission Finale — Healthcare Portal

**Date de soumission :** _______________  
**Équipe :** LSI2 — Groupe G1  
**Version :** v1.0

---

## 🔧 1. Application (Code & Fonctionnalités)

### Base de Données
- [ ] La base `medical_appointment_db` est créée et importée correctement
- [ ] Les 6 tables existent : `users`, `patients`, `doctors`, `appointments`, `specialties`, `blocked_slots`
- [ ] Les spécialités de base sont préchargées (Cardiology, Dermatology, General Medicine, Pediatrics, Orthopedics)
- [ ] Les contraintes de clés étrangères sont actives (CASCADE DELETE)
- [ ] Les index de performance sont en place

### Authentification
- [ ] Inscription patient fonctionne (redirection vers dashboard_patient)
- [ ] Inscription médecin fonctionne (avec spécialité et ville)
- [ ] Connexion par email fonctionne
- [ ] Connexion par téléphone fonctionne
- [ ] Mauvais identifiants → message d'erreur affiché
- [ ] Compte désactivé → message d'erreur affiché
- [ ] Déconnexion fonctionne et détruit la session
- [ ] Accès direct aux dashboards sans connexion → redirection vers login

### Patient
- [ ] Tableau de bord patient charge correctement
- [ ] Liste des rendez-vous s'affiche avec bon statut
- [ ] Recherche de médecins par nom fonctionne
- [ ] Filtre par spécialité fonctionne
- [ ] Filtre par ville fonctionne
- [ ] Clic "Book Appointment" ouvre la modale
- [ ] Sélection de date charge les créneaux en AJAX
- [ ] Créneaux déjà pris s'affichent grisés
- [ ] Réservation avec créneau valide → succès + message flash
- [ ] Tentative de double réservation → message d'erreur

### Médecin
- [ ] Tableau de bord médecin charge correctement
- [ ] Compteurs (total, scheduled, completed, cancelled) sont corrects
- [ ] Onglet "Today" affiche les RDV du jour
- [ ] Onglet "Upcoming" affiche les futurs RDV
- [ ] Onglet "All" affiche tous les RDV
- [ ] Bouton "Complete" change le statut en `completed`
- [ ] Bouton "Cancel" change le statut en `cancelled`
- [ ] Confirmation de dialogue avant annulation

### Admin
- [ ] Tableau de bord admin charge correctement
- [ ] Liste des utilisateurs visible
- [ ] Gestion des comptes fonctionnelle

### Settings
- [ ] Modification du profil (nom, email, téléphone) sauvegardée correctement
- [ ] Changement de mot de passe → vérification ancien mdp
- [ ] Mauvais ancien mot de passe → message d'erreur

---

## 🗄️ 2. Base de Données

- [ ] `config.php` configuré avec les bons identifiants DB
- [ ] Connexion à la DB réussie (pas d'erreur "Could not connect")
- [ ] Jeu de données de test disponible (au moins 2 médecins, 1 patient, quelques RDV)
- [ ] Backup du fichier SQL final exporté et disponible

---

## 🐙 3. GitHub

- [ ] Repository créé et public (ou partagé avec l'encadrant)
- [ ] Tous les fichiers du projet poussés (`git push`)
- [ ] Le fichier `.sql` est inclus dans le repo
- [ ] `README.md` présent et complet
- [ ] Le repo ne contient pas de fichiers sensibles (ex: vrais mots de passe)
- [ ] Tag de version `v1.0` créé : `git tag v1.0 && git push --tags`
- [ ] URL du repo notée : `https://github.com/___________________`

---

## 📄 4. Documentation

- [ ] **Documentation Finale** (ce document) — complet et relu
  - Cahier des charges ✅
  - Product Backlog (20 US) ✅
  - Diagrammes UML décrits ✅
  - Architecture technique ✅
  - Méthodologie Scrum ✅
- [ ] **Sprint 1 Documentation** — validée
- [ ] **Sprint 2 Documentation** — validée
- [ ] **Sprint 3 Documentation** — validée (Review + Retrospective + Release)
- [ ] Tous les documents sont en PDF ou DOCX prêts à soumettre

---

## 📊 5. Présentation PowerPoint

- [ ] 12 diapositives créées
- [ ] Slide 1 : Introduction & titre du projet
- [ ] Slide 2 : Problématique & Solution
- [ ] Slide 3 : Objectifs
- [ ] Slide 4 : Méthodologie Scrum
- [ ] Slide 5 : Organisation de l'équipe
- [ ] Slide 6 : Product Backlog
- [ ] Slide 7 : Architecture système
- [ ] Slide 8 : Fonctionnalités implémentées
- [ ] Slide 9 : Scénario de démo
- [ ] Slide 10 : Défis & Solutions
- [ ] Slide 11 : Améliorations futures
- [ ] Slide 12 : Conclusion
- [ ] Design cohérent sur toutes les diapositives
- [ ] Noms des membres de l'équipe présents
- [ ] Format : `.pptx`

---

## 🎬 6. Démo Live

- [ ] Comptes de test créés en avance (patient + médecin)
- [ ] Au moins 2 médecins avec des spécialités différentes en base
- [ ] Créneau libre disponible pour la démo
- [ ] Application accessible en local sur l'ordinateur de présentation
- [ ] Navigateur ouvert en plein écran, zoom réglé à 90%
- [ ] Script de démo relu et mémorisé
- [ ] Durée testée : entre 8 et 10 minutes

---

## 📋 Récapitulatif Final

| Élément | Statut |
|---------|--------|
| Application fonctionnelle | ☐ |
| Base de données opérationnelle | ☐ |
| GitHub prêt | ☐ |
| Documentation complète | ☐ |
| Présentation PowerPoint | ☐ |
| Script de démo préparé | ☐ |
| **PRÊT À SOUMETTRE** | ☐ |

---

*Healthcare Portal v1.0 — Checklist de soumission finale*
