# Dictionnaire de données – Projet Village Green

## 📌 Sommaire

- [🛍️ Produit](#️-produit)
- [📂 Categorie](#-categorie)
- [🚚 Fournisseur](#-fournisseur)
- [👤 Utilisateur](#-utilisateur)
- [🏠 Adresse](#-adresse)
- [🛒 Commande](#-commande)
- [📦 LigneCommande](#-lignecommande)
- [📄 Document](#-document)
- [📝 Notes générales](#notes-générales)

---

## 🛍️ Produit

| Attribut              | Type         | Description                                                  | Contraintes                        |
|-----------------------|--------------|--------------------------------------------------------------|------------------------------------|
| id                    | INT          | Identifiant unique du produit                                | PK, Auto-incrémenté                |
| libelle_court         | VARCHAR(100) | Nom court du produit                                         | Obligatoire                        |
| libelle_long          | TEXT         | Description complète du produit                              | Obligatoire                        |
| reference_fournisseur | VARCHAR(50)  | Référence fournisseur                                        | Unique                             |
| prix_achat_ht         | DECIMAL(10,2)| Prix d'achat hors taxes                                      | Obligatoire, ≥ 0                   |
| photo                 | VARCHAR(255) | Chemin ou URL de l'image du produit                          | Optionnel                          |
| stock                 | INT          | Quantité disponible en stock                                 | ≥ 0                                |
| actif                 | BOOLEAN      | Produit actif ou désactivé                                   | true / false                       |
| categorie_id          | INT          | Lien vers la catégorie ou sous-catégorie                     | FK → Categorie(id)                 |
| fournisseur_id        | INT          | Lien vers le fournisseur                                     | FK → Fournisseur(id)              |

---

## 📂 Categorie

| Attribut    | Type         | Description                                              | Contraintes                            |
|-------------|--------------|----------------------------------------------------------|----------------------------------------|
| id          | INT          | Identifiant unique                                       | PK, Auto-incrémenté                    |
| nom         | VARCHAR(100) | Nom de la catégorie ou sous-catégorie                    | Obligatoire                            |
| parent_id   | INT          | Référence à la catégorie parente (null si racine)        | FK → Categorie(id), optionnel          |
| niveau      | INT          | Niveau hiérarchique dans la structure (ex : 0, 1, 2...)  | ≥ 0, facultatif mais utile             |

> ⚠️ Une catégorie sans `parent_id` est une **rubrique principale**.  
> Une catégorie avec `parent_id` est une **sous-rubrique**.

---

## 🚚 Fournisseur

| Attribut      | Type          | Description                          | Contraintes                   |
|---------------|---------------|--------------------------------------|-------------------------------|
| id            | INT           | Identifiant unique                   | PK, Auto-incrémenté           |
| nom           | VARCHAR(100)  | Nom du fournisseur                   | Obligatoire                   |
| contact       | VARCHAR(100)  | Nom du contact                       | Optionnel                     |
| email         | VARCHAR(100)  | Email de contact                     | Format email, optionnel       |
| telephone     | VARCHAR(20)   | Téléphone du fournisseur             | Optionnel                     |

---

## 👤 Utilisateur

| Attribut         | Type          | Description                                     | Contraintes                                |
|------------------|---------------|-------------------------------------------------|--------------------------------------------|
| id               | INT           | Identifiant utilisateur                         | PK, Auto-incrémenté                         |
| nom              | VARCHAR(100)  | Nom ou raison sociale                           | Obligatoire                                 |
| email            | VARCHAR(100)  | Email                                           | Format email, unique                        |
| reference        | VARCHAR(50)   | Référence interne                               | Obligatoire, unique                         |
| role             | ENUM          | Rôle dans le système                            | 'client_particulier', 'client_pro', 'commercial' |
| coefficient      | DECIMAL(3,2)  | Coefficient de vente appliqué (clients)         | ≥ 1.00, null si commercial                  |
| specialise_particuliers | BOOLEAN | Spécialisation client particulier (commerciaux) | null si client                              |
| commercial_id    | INT           | Commercial référent (clients uniquement)        | FK → Utilisateur(id), optionnel             |

---

## 🏠 Adresse

| Attribut       | Type          | Description                                  | Contraintes                      |
|----------------|---------------|----------------------------------------------|----------------------------------|
| id             | INT           | Identifiant unique                           | PK, Auto-incrémenté              |
| utilisateur_id | INT           | Utilisateur concerné                         | FK → Utilisateur(id)             |
| type_adresse   | ENUM          | Type d’adresse                               | 'facturation', 'livraison'       |
| rue            | VARCHAR(255)  | Rue                                          | Obligatoire                      |
| code_postal    | VARCHAR(10)   | Code postal                                  | Obligatoire                      |
| ville          | VARCHAR(100)  | Ville                                        | Obligatoire                      |
| pays           | VARCHAR(100)  | Pays                                         | Obligatoire                      |

---

## 🛒 Commande

| Attribut               | Type         | Description                                      | Contraintes                          |
|------------------------|--------------|--------------------------------------------------|--------------------------------------|
| id                     | INT          | Identifiant unique                               | PK, Auto-incrémenté                  |
| utilisateur_id         | INT          | Lien vers le client                              | FK → Utilisateur(id)                |
| date_commande          | DATE         | Date de la commande                              | Obligatoire                          |
| reduction              | DECIMAL(5,2) | Réduction en % (professionnels uniquement)       | Optionnel, 0–100                     |
| mode_paiement          | ENUM         | Mode de règlement                                | 'carte', 'virement', 'chèque'        |
| statut_paiement        | ENUM         | Paiement effectué ou différé                     | 'payé', 'en attente'                 |
| adresse_facturation_id | INT          | Adresse de facturation                           | FK → Adresse(id)                     |
| adresse_livraison_id   | INT          | Adresse de livraison                             | FK → Adresse(id)                     |

---

## 📦 LigneCommande

| Attribut         | Type         | Description                               | Contraintes                    |
|------------------|--------------|-------------------------------------------|--------------------------------|
| id               | INT          | Identifiant unique                        | PK, Auto-incrémenté            |
| commande_id      | INT          | Commande associée                         | FK → Commande(id)              |
| produit_id       | INT          | Produit concerné                          | FK → Produit(id)               |
| quantite         | INT          | Quantité commandée                        | ≥ 1                            |
| prix_unitaire_ht | DECIMAL(10,2)| Prix unitaire HT au moment de la commande | Obligatoire                    |

---

## 📄 Document

| Attribut         | Type         | Description                                  | Contraintes                          |
|------------------|--------------|----------------------------------------------|--------------------------------------|
| id               | INT          | Identifiant unique du document               | PK, Auto-incrémenté                  |
| commande_id      | INT          | Commande liée au document                    | FK → Commande(id)                    |
| type_document    | ENUM         | Type de document                             | 'facture', 'bon_livraison'           |
| date_creation    | DATE         | Date de création du document                 | Obligatoire                          |
| chemin_fichier   | VARCHAR(255) | Chemin ou nom du fichier stocké              | Obligatoire                          |

> ⚠️ Tous les documents doivent être conservés pendant 3 ans.

---

## 📝 Notes générales

- **Prix de vente** : Prix d'achat × coefficient (client).
- **Réductions** : Appliquées uniquement aux clients professionnels.
- **Livraisons** : Une commande peut être livrée partiellement.
- **Facturation** : Une facture par commande, même si livraison partielle.


