
# 🎵 Projet Fil Rouge CDA – Village Green

## ✨ Description

Ce projet vise à développer une application e-commerce pour l’entreprise **Village Green**, spécialisée dans la distribution de matériel musical.  
L'objectif est de moderniser leur système de gestion des commandes et de facturation afin d'optimiser leur workflow. Le projet comprend :

- Un site web responsive  
- Une application mobile

---

## 🎯 Objectifs

- Automatiser la gestion des commandes et de la facturation  
- Développer des interfaces accessibles aux particuliers et aux professionnels  
- Offrir une solution sécurisée, fiable et adaptée aux besoins de l'entreprise

---

## 🛠 Fonctionnalités

### 🌐 Site Web

#### Front-Office

- Consultation du catalogue (rubriques et sous-rubriques)  
- Ajout/Suppression de produits dans le panier  
- Inscription et connexion/déconnexion des utilisateurs particuliers  
- Validation du panier et création de commande  
- Visualisation de l'historique des commandes

#### Back-Office (Administrateur)

- Gestion CRUD des produits (ajout, modification, suppression)  
- Gestion des commandes  
- Tableau de bord avec indicateurs de performance (chiffre d'affaires, produits/clients les plus performants)

#### Autres

- Compatibilité avec les navigateurs principaux et les appareils mobiles  
- Module de recherche avancée

---

### 📱 Application Mobile

- Consultation du catalogue  
- Connexion pour visualiser l'historique des commandes  
- Consultation du profil utilisateur

---

## 🏗 Architecture

- **Langage** : PHP  
- **Framework** : Symfony  
- **Base de données** : MySQL  
- **Authentification API** : JWT pour sécuriser les échanges

### Conteneurs Docker :

- 🐳 Conteneur PHP pour l'exécution du site  
- 🐳 Conteneur MySQL pour la base de données  
- 🐳 Conteneur Mailhog pour l'envoi/réception d'emails

---

## 🚀 Installation

1. Clonez le projet :

   ```bash
   git clone https://github.com/clemence95/new_villagegreen.git
   ```

2. Installez les dépendances :

   ```bash
   composer install
   ```

3. Configurez le fichier `.env` avec vos informations de base de données.

4. Exécutez les migrations :

   ```bash
   php bin/console doctrine:migrations:migrate
   ```

5. Lancez les conteneurs Docker :

   ```bash
   docker-compose up
   ```

6. Démarrez le serveur Symfony :

   ```bash
   symfony server:start
   ```

---

## 🌍 Déploiement

- Préparez un environnement de production avec Docker  
- Configurez les variables d'environnement (base de données, JWT)  
- Mettez en ligne via un service d'hébergement (ex. OVH, Heroku)

---

## ✅ Tests

- Tests unitaires avec PHPUnit  
- Scénarios de test pour les principales fonctionnalités :
  - Navigation dans le catalogue  
  - Création et validation de commande  
  - Connexion et inscription des utilisateurs

---

## 🤝 Contribution

- Utilisation de Trello pour le suivi des tâches  
- Planification des étapes sous forme de diagramme de Gantt

---

## 📂 Organisation typique du projet Symfony

```plaintext
bin/             # Scripts pour les commandes Symfony  
config/          # Configuration (routes, services, etc.)  
migrations/      # Scripts pour gérer les migrations de la base de données  
public/          # Fichiers accessibles (CSS, JS, images)  
src/             # Code source (contrôleurs, entités, etc.)  
  ├── Controller/  # Contrôleurs de l'application  
  ├── Entity/      # Entités pour la gestion des données  
  ├── Repository/  # Classes pour interagir avec la base de données  
  └── Service/     # Services pour la logique métier  
templates/       # Fichiers Twig pour le rendu des pages  
tests/           # Tests unitaires et fonctionnels  
translations/    # Fichiers pour la traduction  
var/             # Cache et logs  
vendor/          # Bibliothèques installées via Composer  
```

---

## 🐳 Compléments spécifiques Docker

- `docker-compose.yaml` : Configuration des conteneurs (PHP, MySQL...)  
- `Dockerfile` : Fichier pour créer des conteneurs personnalisés

---

## 🔌 API

- Ajout des contrôleurs dans `src/Controller/`  
- Configuration des modules JWT dans `config/packages/`

---

## 📱 Mobile

- Regroupement des ressources dans `/mobile/`

---

## 🏆 Évaluation

Ce projet met en valeur mes compétences dans :

- Développement web (front-end et back-end)  
- Gestion des données (SQL, API sécurisée)  
- Conception logicielle (MVC, Docker)


Gestion des données (SQL, API sécurisée)

Conception logicielle (MVC, Docker)​

