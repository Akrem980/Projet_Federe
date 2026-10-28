# Documentation Finale — Healthcare Portal
## Application de Gestion des Rendez-vous Médicaux

**Projet :** Healthcare Portal  
**Équipe :** LSI2 – Groupe G1  
**Année académique :** 2025–2026  
**Version :** 1.0 (Release Finale)  
**Technologies :** PHP · MySQL · HTML/CSS/JS  

---

## Table des Matières

1. [Cahier des Charges](#1-cahier-des-charges)
2. [Product Backlog](#2-product-backlog)
3. [Diagrammes UML](#3-diagrammes-uml)
4. [Architecture Technique](#4-architecture-technique)
5. [Méthodologie Scrum](#5-méthodologie-scrum)

---

## 1. Cahier des Charges

### 1.1 Description du Projet

Le **Healthcare Portal** est une application web de gestion des rendez-vous médicaux. Elle permet aux patients de rechercher des médecins par spécialité et par ville, de réserver des créneaux horaires disponibles, et de gérer leurs rendez-vous. Les médecins disposent d'un tableau de bord dédié pour visualiser, accepter et gérer leurs consultations. Un administrateur supervise l'ensemble du système, les utilisateurs et les données.

L'application est développée en **PHP/MySQL** avec une interface frontend en **HTML, CSS et JavaScript pur**, sans frameworks supplémentaires.

### 1.2 Objectifs

- Fournir une plateforme numérique centralisée permettant aux patients de trouver un médecin qualifié et de prendre rendez-vous en ligne.
- Simplifier la gestion des consultations pour les praticiens grâce à un tableau de bord clair et interactif.
- Offrir un système d'administration robuste permettant de gérer les utilisateurs, les spécialités et les rendez-vous.
- Garantir la sécurité des données de santé via l'authentification, le contrôle des rôles (RBAC) et le hachage des mots de passe.
- Respecter les principes d'une architecture 3-tiers : présentation, logique métier, données.

### 1.3 Utilisateurs Cibles

| Rôle | Description |
|------|-------------|
| **Patient** | Tout utilisateur souhaitant prendre rendez-vous avec un médecin. Il peut s'inscrire, rechercher un médecin, réserver et consulter ses rendez-vous. |
| **Médecin (Doctor)** | Professionnel de santé inscrit sur la plateforme. Il gère ses rendez-vous depuis son tableau de bord. |
| **Administrateur (Admin)** | Gestionnaire système ayant accès à toutes les données, utilisateurs et paramètres de la plateforme. |

### 1.4 Besoins Fonctionnels

#### Module Authentification
- Inscription d'un nouvel utilisateur (patient ou médecin) avec rôle, prénom, nom, email, téléphone, mot de passe
- Validation des champs obligatoires et unicité de l'email
- Connexion via email ou numéro de téléphone
- Hachage du mot de passe avec `password_hash()` / `password_verify()`
- Redirection automatique vers le tableau de bord selon le rôle
- Déconnexion sécurisée (destruction de session)
- Compte désactivable par l'administrateur

#### Module Patient
- Tableau de bord affichant les prochains rendez-vous et leur statut (scheduled, completed, cancelled)
- Recherche de médecins par nom, spécialité et/ou ville
- Visualisation des créneaux disponibles d'un médecin pour une date donnée
- Réservation d'un rendez-vous (avec vérification anti-doublon)
- Modification des informations de profil (nom, email, téléphone, mot de passe)

#### Module Médecin
- Tableau de bord avec compteurs : total, programmés, complétés, annulés
- Onglets : aujourd'hui, à venir, tous les rendez-vous
- Marquer un rendez-vous comme "completed"
- Annuler un rendez-vous
- Modification du profil

#### Module Administrateur
- Vue d'ensemble des utilisateurs (patients et médecins)
- Gestion des comptes (activation/désactivation)
- Accès aux données des rendez-vous
- Gestion des spécialités médicales

### 1.5 Besoins Non-Fonctionnels

| Critère | Détail |
|---------|--------|
| **Sécurité** | Sessions PHP, hachage bcrypt, échappement des données SQL (`mysqli_real_escape_string`, requêtes préparées) |
| **Performance** | Requêtes SQL optimisées avec index (email, doctor_id, appointment_date) |
| **Portabilité** | Compatible avec tout navigateur moderne (Chrome, Firefox, Edge, Safari) |
| **Maintenabilité** | Code organisé en modules séparés : Process/, Dashboards/, Web_Pages/, DataBase/ |
| **Fiabilité** | Vérification de l'existence du créneau avant insertion, gestion des erreurs avec messages flash |
| **Accessibilité** | Interface responsive (grille CSS adaptative), typographie lisible (DM Sans), contrastes respectés |
| **Scalabilité** | Structure de base de données normalisée permettant l'ajout de nouvelles spécialités et utilisateurs |

---

## 2. Product Backlog

| ID | User Story | Priorité | Sprint | Statut |
|----|-----------|----------|--------|--------|
| US-01 | En tant que visiteur, je veux m'inscrire avec mon nom, email, téléphone et mot de passe afin d'accéder à la plateforme. | Haute | Sprint 1 | ✅ Done |
| US-02 | En tant que visiteur, je veux choisir un rôle (patient ou médecin) lors de l'inscription pour que le système crée le bon profil. | Haute | Sprint 1 | ✅ Done |
| US-03 | En tant que médecin, je veux renseigner ma spécialité et ma ville lors de l'inscription pour apparaître dans les résultats de recherche. | Haute | Sprint 1 | ✅ Done |
| US-04 | En tant qu'utilisateur, je veux me connecter avec mon email ou mon téléphone afin d'accéder à mon espace personnel. | Haute | Sprint 1 | ✅ Done |
| US-05 | En tant qu'utilisateur, je veux être redirigé automatiquement vers mon tableau de bord selon mon rôle après connexion. | Haute | Sprint 1 | ✅ Done |
| US-06 | En tant qu'utilisateur, je veux recevoir un message d'erreur clair si mes identifiants sont incorrects ou si mon compte est désactivé. | Moyenne | Sprint 1 | ✅ Done |
| US-07 | En tant qu'utilisateur, je veux pouvoir me déconnecter et être redirigé vers la page d'accueil. | Haute | Sprint 1 | ✅ Done |
| US-08 | En tant que patient, je veux rechercher des médecins par nom, spécialité et ville pour trouver le praticien adapté à mes besoins. | Haute | Sprint 2 | ✅ Done |
| US-09 | En tant que patient, je veux voir les informations d'un médecin (spécialité, ville) sur une carte dédiée pour choisir le bon. | Haute | Sprint 2 | ✅ Done |
| US-10 | En tant que patient, je veux voir les créneaux horaires disponibles d'un médecin pour une date donnée via une interface modale. | Haute | Sprint 2 | ✅ Done |
| US-11 | En tant que patient, je veux réserver un créneau en un clic et recevoir une confirmation avec message flash. | Haute | Sprint 2 | ✅ Done |
| US-12 | En tant que patient, je veux que le système empêche une double réservation d'un même créneau. | Haute | Sprint 2 | ✅ Done |
| US-13 | En tant que patient, je veux consulter la liste de mes rendez-vous et leur statut dans mon tableau de bord. | Moyenne | Sprint 2 | ✅ Done |
| US-14 | En tant que médecin, je veux voir les rendez-vous du jour, à venir et passés dans mon tableau de bord par onglets. | Haute | Sprint 2 | ✅ Done |
| US-15 | En tant que médecin, je veux marquer un rendez-vous comme "terminé" pour tenir à jour mon historique de consultations. | Haute | Sprint 2 | ✅ Done |
| US-16 | En tant que médecin, je veux pouvoir annuler un rendez-vous (aujourd'hui ou à venir) depuis mon tableau de bord. | Haute | Sprint 2 | ✅ Done |
| US-17 | En tant que médecin, je veux visualiser des compteurs (total, programmés, complétés, annulés) sur mon tableau de bord. | Moyenne | Sprint 3 | ✅ Done |
| US-18 | En tant qu'utilisateur, je veux modifier mes informations personnelles (nom, email, téléphone) depuis la page "Settings". | Moyenne | Sprint 3 | ✅ Done |
| US-19 | En tant qu'utilisateur, je veux changer mon mot de passe depuis la page "Settings" avec vérification de l'ancien mot de passe. | Haute | Sprint 3 | ✅ Done |
| US-20 | En tant qu'administrateur, je veux visualiser l'ensemble des utilisateurs, rendez-vous et médecins depuis mon tableau de bord. | Haute | Sprint 3 | ✅ Done |

---

## 3. Diagrammes UML

### 3.1 Diagramme de Cas d'Utilisation (Use Case Diagram)

**Acteurs :**
- **Visiteur** (non authentifié) : S'inscrire, Se connecter
- **Patient** : Rechercher médecin, Voir créneaux, Réserver rendez-vous, Voir mes rendez-vous, Modifier profil, Se déconnecter
- **Médecin** : Voir tableau de bord, Voir rendez-vous (aujourd'hui / à venir / tous), Marquer terminé, Annuler rendez-vous, Modifier profil, Se déconnecter
- **Administrateur** : Gérer utilisateurs, Gérer spécialités, Superviser rendez-vous, Se déconnecter

**Relations :**
- Patient `<<include>>` Se connecter pour Réserver rendez-vous
- Médecin `<<include>>` Se connecter pour accéder au Dashboard
- Réservation `<<extend>>` Voir créneaux (préalable obligatoire)
- Modifier profil est partagé entre Patient, Médecin et Admin (`<<generalization>>`)

---

### 3.2 Diagramme de Classes (Class Diagram)

#### Classe `User`
| Attribut | Type |
|----------|------|
| id | int |
| first_name | string |
| last_name | string |
| email | string |
| phone | string |
| password | string (hashed) |
| role | enum(admin, doctor, patient) |
| is_active | bool |
| created_at | timestamp |

**Méthodes :** `login()`, `logout()`, `updateProfile()`, `changePassword()`

---

#### Classe `Patient` (hérite de User)
| Attribut | Type |
|----------|------|
| id | int |
| user_id | int (FK → User) |
| first_name | string |
| last_name | string |
| email | string |
| phone | string |

**Méthodes :** `searchDoctor()`, `bookAppointment()`, `getAppointments()`

---

#### Classe `Doctor` (hérite de User)
| Attribut | Type |
|----------|------|
| id | int |
| user_id | int (FK → User) |
| first_name | string |
| last_name | string |
| phone | string |
| city | string |
| specialty_id | int (FK → Specialty) |

**Méthodes :** `getAppointments()`, `markCompleted()`, `cancelAppointment()`, `getAvailableSlots()`

---

#### Classe `Appointment`
| Attribut | Type |
|----------|------|
| id | int |
| patient_id | int (FK → Patient) |
| doctor_id | int (FK → Doctor) |
| appointment_date | date |
| start_time | time |
| end_time | time |
| status | enum(scheduled, completed, cancelled) |
| created_at | timestamp |

**Méthodes :** `create()`, `updateStatus()`, `cancel()`, `complete()`

---

#### Classe `Specialty`
| Attribut | Type |
|----------|------|
| id | int |
| name | string |
| description | text |

---

#### Classe `BlockedSlot`
| Attribut | Type |
|----------|------|
| id | int |
| doctor_id | int (FK → Doctor) |
| start_datetime | datetime |
| end_datetime | datetime |
| reason | string |

---

**Relations :**
- `User` 1 ──── 1 `Patient` (composition)
- `User` 1 ──── 1 `Doctor` (composition)
- `Patient` 1 ──── * `Appointment`
- `Doctor` 1 ──── * `Appointment`
- `Doctor` * ──── 1 `Specialty`
- `Doctor` 1 ──── * `BlockedSlot`

---

### 3.3 Diagramme de Séquence — Réservation d'un Rendez-vous

```
Patient         Browser         find_doctor.php      get_slots.php      book_appointment.php      DB
  |                |                  |                     |                    |                  |
  |-- GET /find_doctor.php ---------->|                     |                    |                  |
  |                |<-- Render liste médecins + filtres ----|                    |                  |
  |                |-- SELECT doctors + specialties ------->|-- query ---------->|                  |
  |                |                  |<---- résultats -----|                    |                  |
  |                |<-- Afficher cartes médecins ----------|                    |                  |
  |                |                  |                     |                    |                  |
  |-- Clic "Book Appointment" -------->|                     |                    |                  |
  |                |<-- Ouvrir Modal Booking --------------->|                    |                  |
  |-- Choisir date + GET slots ------->|-- AJAX GET /get_slots.php?doctor_id=X&date=Y              |
  |                |                  |                     |-- SELECT appointments WHERE date=Y -->|
  |                |                  |                     |<--- liste créneaux occupés ---------|
  |                |<-- Afficher créneaux disponibles ------|                    |                  |
  |-- Sélectionner créneau ---------->|                     |                    |                  |
  |-- Clic "Confirm Booking" -------->|                     |                    |                  |
  |                |<-- POST /book_appointment.php ---------|-- checkAuth() --->|                  |
  |                |                  |                     |                    |-- SELECT patient_id
  |                |                  |                     |                    |<-- patient found |
  |                |                  |                     |                    |-- CHECK duplicate slot
  |                |                  |                     |                    |<-- 0 rows (OK)   |
  |                |                  |                     |                    |-- INSERT appointment
  |                |                  |                     |                    |<-- success       |
  |<-- Redirect dashboard_patient.php + message "Succès" --|                    |                  |
```

---

## 4. Architecture Technique

### 4.1 Frontend

L'interface utilisateur est développée entièrement en **HTML5, CSS3 et JavaScript vanilla**, sans framework externe. Les choix de design s'appuient sur :

- **Typographie** : Google Fonts – *DM Sans* (poids 400, 500, 600)
- **Design System** : Variables CSS (`--blue`, `--green`, `--red`, `--border`, etc.) pour une cohérence visuelle totale
- **Layout** : Architecture à deux colonnes (sidebar fixe + contenu principal) avec en-tête fixe
- **Composants** : Cartes médecins (grid CSS responsive), tableau de bord à onglets (tabs), modal de réservation, badges de statut colorés
- **Interaction** : Fetch API (AJAX) pour le chargement asynchrone des créneaux horaires

### 4.2 Architecture Backend (3-Tiers)

```
┌────────────────────────────────────────────────────┐
│           COUCHE PRÉSENTATION (Tier 1)             │
│  HTML / CSS / JS : HealthCare.html, register.html  │
│  Dashboards : dashboard_patient, doctor, admin     │
└────────────────────┬───────────────────────────────┘
                     │ HTTP Requests (GET / POST)
┌────────────────────▼───────────────────────────────┐
│            COUCHE LOGIQUE MÉTIER (Tier 2)          │
│  PHP Scripts :                                     │
│  • login_process.php    — Authentification         │
│  • register_process.php — Inscription + RBAC       │
│  • book_appointment.php — Réservation              │
│  • manage_appointment.php — Gestion statuts        │
│  • update_settings.php  — Profil utilisateur       │
│  • get_slots.php        — Créneaux (AJAX/JSON)     │
│  • logout.php           — Déconnexion              │
│  config.php             — Connexion DB + helpers   │
└────────────────────┬───────────────────────────────┘
                     │ mysqli queries (PDO-style)
┌────────────────────▼───────────────────────────────┐
│             COUCHE DONNÉES (Tier 3)                │
│  MySQL : medical_appointment_db                    │
│  Tables : users, patients, doctors,                │
│           appointments, specialties, blocked_slots │
└────────────────────────────────────────────────────┘
```

### 4.3 Structure de la Base de Données

**Base de données :** `medical_appointment_db`

| Table | Description | Clés |
|-------|-------------|------|
| `users` | Compte de tous les utilisateurs | PK: id, UNIQUE: email |
| `patients` | Profil étendu du patient | PK: id, FK: user_id → users |
| `doctors` | Profil étendu du médecin | PK: id, FK: user_id → users, specialty_id → specialties |
| `specialties` | Catalogue des spécialités médicales | PK: id, UNIQUE: name |
| `appointments` | Rendez-vous entre patient et médecin | PK: id, FK: patient_id, doctor_id |
| `blocked_slots` | Créneaux bloqués par le médecin | PK: id, FK: doctor_id → doctors |

**Index de performance :**
- `idx_appointment_doctor` sur `appointments.doctor_id`
- `idx_appointment_patient` sur `appointments.patient_id`
- `idx_appointment_date` sur `appointments.appointment_date`
- `idx_doctor_city` sur `doctors.city`
- `idx_doctor_specialty` sur `doctors.specialty_id`
- `idx_users_email` sur `users.email`

**Spécialités préchargées :** Cardiology, Dermatology, General Medicine, Pediatrics, Orthopedics

### 4.4 Sécurité

| Mécanisme | Implémentation |
|-----------|----------------|
| **Hachage des mots de passe** | `password_hash($pwd, PASSWORD_DEFAULT)` — bcrypt |
| **Vérification** | `password_verify($input, $hash)` |
| **Sessions PHP** | `session_start()`, `$_SESSION['user_id']`, `$_SESSION['user_role']` |
| **Contrôle d'accès (RBAC)** | Fonction `checkAuth($required_role)` dans `config.php`, appelée en tête de chaque dashboard |
| **Injection SQL** | `mysqli_real_escape_string()` + requêtes préparées (`mysqli_prepare / bind_param`) |
| **XSS** | `htmlspecialchars()` sur toutes les données affichées |
| **Validation entrées** | Vérification côté serveur des champs obligatoires, rôles valides, longueur minimale du mot de passe |
| **Compte désactivé** | Vérification du champ `is_active` avant toute connexion |

---

## 5. Méthodologie Scrum

### 5.1 Équipe Scrum

| Rôle | Responsabilité |
|------|----------------|
| **Product Owner** | Définit les User Stories, priorise le Product Backlog, valide les livrables |
| **Scrum Master** | Facilite les cérémonies Scrum, lève les obstacles, assure l'application du cadre Agile |
| **Développeurs** | Conception, développement backend (PHP/MySQL), frontend (HTML/CSS/JS), tests |

### 5.2 Organisation des Sprints

#### Sprint 1 — Fondations & Authentification
**Durée :** 2 semaines  
**Objectif :** Mise en place de la base de données, du système d'authentification complet (inscription, connexion, déconnexion, RBAC) et des interfaces de base.  
**User Stories :** US-01 à US-07  
**Livrables :**
- Schéma complet de la base de données (`medical_appointment_db.sql`)
- Pages `HealthCare.html` (login) et `register.html`
- Scripts PHP : `login_process.php`, `register_process.php`, `logout.php`, `config.php`
- Dashboards de base pour les 3 rôles

---

#### Sprint 2 — Fonctionnalités Cœur Métier
**Durée :** 2 semaines  
**Objectif :** Implémentation de la recherche de médecins, du système de créneaux horaires et de la réservation de rendez-vous. Dashboard médecin fonctionnel.  
**User Stories :** US-08 à US-16  
**Livrables :**
- `find_doctor.php` avec filtres (spécialité, ville, nom)
- `get_slots.php` (API AJAX retournant les créneaux JSON)
- `book_appointment.php` avec anti-doublon
- `dashboard_doctor.php` avec onglets et actions
- `dashboard_patient.php` avec liste de rendez-vous

---

#### Sprint 3 — Finalisation & Polish
**Durée :** 2 semaines  
**Objectif :** Ajout de la gestion des profils utilisateurs, tableau de bord administrateur, amélioration de l'interface, corrections de bugs, release finale.  
**User Stories :** US-17 à US-20  
**Livrables :**
- `settings.php` (édition profil + changement mot de passe)
- `update_settings.php`
- `dashboard_admin.php`
- `manage_appointment.php` (complétion/annulation)
- Release v1.0 sur GitHub

---

### 5.3 Cérémonies Scrum

| Cérémonie | Description | Fréquence |
|-----------|-------------|-----------|
| **Sprint Planning** | L'équipe sélectionne les User Stories du backlog pour le sprint à venir, les décompose en tâches techniques et estime les charges. | Début de chaque sprint |
| **Daily Scrum** | Réunion de 15 min : chaque membre partage ce qu'il a fait, ce qu'il va faire, et les blocages rencontrés. | Quotidien |
| **Sprint Review** | Démo des fonctionnalités développées aux parties prenantes. Validation ou rejet des User Stories. | Fin de chaque sprint |
| **Sprint Retrospective** | L'équipe analyse ce qui a bien fonctionné, ce qui peut être amélioré, et définit des actions concrètes. | Fin de chaque sprint |

### 5.4 Artefacts Scrum

| Artefact | Description |
|----------|-------------|
| **Product Backlog** | Liste priorisée de toutes les User Stories du projet (US-01 à US-20) |
| **Sprint Backlog** | Sous-ensemble des User Stories sélectionnées pour le sprint en cours |
| **Incrément** | Version fonctionnelle livrée à la fin de chaque sprint |
| **Definition of Done** | US validée = fonctionnalité développée, testée manuellement, intégrée sans régression |

---

*Document généré pour la soumission finale du projet Healthcare Portal — v1.0*
