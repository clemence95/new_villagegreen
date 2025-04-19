# Dictionnaire de données – Projet Village Green

<!-- Ce fichier regroupe toutes les données utiles pour modéliser la base de données du projet Village Green -->

## 📌 Sommaire

- [🛍️ Produit](#️-produit)
- [📂 Rubrique](#-rubrique)
- [📁 SousRubrique](#-sousrubrique)
- [🚚 Fournisseur](#-fournisseur)
- [👤 Client](#-client)
- [🧑‍💼 Commercial](#-commercial)
- [🏠 Adresse](#-adresse)
- [🛒 Commande](#-commande)
- [📦 LigneCommande](#-lignecommande)
- [📄 Document](#-document)
- [📝 Notes générales](#notes-générales)

---

## 🛍️ Produit

<!-- Produit : Éléments du catalogue vendus aux clients -->

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
| sous_rubrique_id      | INT          | Lien vers la sous-rubrique                                   | FK → SousRubrique(id)             |
| fournisseur_id        | INT          | Lien vers le fournisseur                                     | FK → Fournisseur(id)              |

---

## 📂 Rubrique

<!-- Rubrique : Catégorie principale de produits -->

| Attribut     | Type         | Description                        | Contraintes              |
|--------------|--------------|------------------------------------|--------------------------|
| id           | INT          | Identifiant unique                 | PK, Auto-incrémenté      |
| nom          | VARCHAR(100) | Nom de la rubrique                 | Obligatoire              |

---

## 📁 SousRubrique

<!-- SousRubrique : Sous-catégorie associée à une rubrique -->

| Attribut      | Type         | Description                            | Contraintes                       |
|---------------|--------------|----------------------------------------|-----------------------------------|
| id            | INT          | Identifiant unique                     | PK, Auto-incrémenté               |
| nom           | VARCHAR(100) | Nom de la sous-rubrique                | Obligatoire                       |
| rubrique_id   | INT          | Lien vers la rubrique parente          | FK → Rubrique(id)                 |

---

## 🚚 Fournisseur

<!-- Fournisseur : Fournisseur exclusif des produits -->

| Attribut      | Type          | Description                          | Contraintes                   |
|---------------|---------------|--------------------------------------|-------------------------------|
| id            | INT           | Identifiant unique                   | PK, Auto-incrémenté           |
| nom           | VARCHAR(100)  | Nom du fournisseur                   | Obligatoire                   |
| contact       | VARCHAR(100)  | Nom du contact                       | Optionnel                     |
| email         | VARCHAR(100)  | Email de contact                     | Format email, optionnel       |
| telephone     | VARCHAR(20)   | Téléphone du fournisseur             | Optionnel                     |

---

## 👤 Client

<!-- Client : Acheteur du catalogue (pro ou particulier) -->

| Attribut           | Type          | Description                                      | Contraintes                               |
|--------------------|---------------|--------------------------------------------------|-------------------------------------------|
| id                 | INT           | Identifiant client                               | PK, Auto-incrémenté                       |
| nom                | VARCHAR(100)  | Nom ou raison sociale                            | Obligatoire                               |
| type_client        | ENUM          | Particulier ou Professionnel                     | 'particulier', 'professionnel'            |
| email              | VARCHAR(100)  | Email du client                                  | Format email, unique                      |
| reference_client   | VARCHAR(50)   | Référence unique attribuée au client             | Obligatoire, unique                       |
| coefficient        | DECIMAL(3,2)  | Coefficient de vente appliqué                    | ≥ 1.00                                    |
| commercial_id      | INT           | Commercial attribué                              | FK → Commercial(id)                       |

---

## 🧑‍💼 Commercial

<!-- Commercial : Conseiller commercial affecté au client -->

| Attribut                | Type          | Description                                  | Contraintes                |
|-------------------------|---------------|----------------------------------------------|----------------------------|
| id                      | INT           | Identifiant unique                           | PK, Auto-incrémenté        |
| nom                     | VARCHAR(100)  | Nom du commercial                            | Obligatoire                |
| email                   | VARCHAR(100)  | Email professionnel                          | Obligatoire, format email  |
| specialise_particuliers | BOOLEAN       | Gère exclusivement les clients particuliers  | true / false               |

---

## 🏠 Adresse

<!-- Adresse : Lieu de livraison ou facturation -->

| Attribut      | Type          | Description                                  | Contraintes                      |
|---------------|---------------|----------------------------------------------|----------------------------------|
| id            | INT           | Identifiant unique                           | PK, Auto-incrémenté              |
| client_id     | INT           | Client concerné                              | FK → Client(id)                  |
| type_adresse  | ENUM          | Type d’adresse                               | 'facturation', 'livraison'       |
| rue           | VARCHAR(255)  | Rue                                          | Obligatoire                      |
| code_postal   | VARCHAR(10)   | Code postal                                  | Obligatoire                      |
| ville         | VARCHAR(100)  | Ville                                        | Obligatoire                      |
| pays          | VARCHAR(100)  | Pays                                         | Obligatoire                      |

---

## 🛒 Commande

<!-- Commande : Regroupe les produits achetés -->

| Attribut               | Type         | Description                                      | Contraintes                          |
|------------------------|--------------|--------------------------------------------------|--------------------------------------|
| id                     | INT          | Identifiant unique                               | PK, Auto-incrémenté                  |
| client_id              | INT          | Lien vers le client                              | FK → Client(id)                      |
| date_commande          | DATE         | Date de la commande                              | Obligatoire                          |
| reduction              | DECIMAL(5,2) | Réduction en % (professionnels uniquement)       | Optionnel, 0–100                     |
| mode_paiement          | ENUM         | Mode de règlement                                | 'carte', 'virement', 'chèque'        |
| statut_paiement        | ENUM         | Paiement effectué ou différé                     | 'payé', 'en attente'                 |
| adresse_facturation_id | INT          | Adresse de facturation                           | FK → Adresse(id)                     |
| adresse_livraison_id   | INT          | Adresse de livraison                             | FK → Adresse(id)                     |

---

## 📦 LigneCommande

<!-- LigneCommande : Détail des produits commandés -->

| Attribut         | Type         | Description                               | Contraintes                    |
|------------------|--------------|-------------------------------------------|--------------------------------|
| id               | INT          | Identifiant unique                        | PK, Auto-incrémenté            |
| commande_id      | INT          | Commande associée                         | FK → Commande(id)              |
| produit_id       | INT          | Produit concerné                          | FK → Produit(id)               |
| quantite         | INT          | Quantité commandée                        | ≥ 1                            |
| prix_unitaire_ht | DECIMAL(10,2)| Prix unitaire HT au moment de la commande | Obligatoire                    |

---

## 📄 Document

<!-- Document : Pièces jointes liées à une commande -->

| Attribut         | Type         | Description                                  | Contraintes                          |
|------------------|--------------|----------------------------------------------|--------------------------------------|
| id               | INT          | Identifiant unique du document               | PK, Auto-incrémenté                  |
| commande_id      | INT          | Commande liée au document                    | FK → Commande(id)                    |
| type_document    | ENUM         | Type de document                             | 'facture', 'bon_livraison'           |
| date_creation    | DATE         | Date de création du document                 | Obligatoire                          |
| chemin_fichier   | VARCHAR(255) | Chemin ou nom du fichier stocké              | Obligatoire                          |

> ⚠️ **Tous les documents doivent être conservés pendant 3 ans.**

---

## 📝 Notes générales

<!-- Infos utiles concernant la gestion métier -->

- **Calcul du prix de vente** : Le prix de vente est calculé à partir du prix d'achat en appliquant un coefficient spécifique au client.
- **Réductions commerciales** : Possibles uniquement pour les clients professionnels et gérées par le commercial.
- **Facturation** : Une commande partiellement livrée est totalement facturée. Une facture ne concerne qu'une seule commande.
- **Livraison** : Une commande peut donner lieu à plusieurs bons de livraison (expéditions multiples).

