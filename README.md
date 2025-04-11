# mvc-gestion-bancaire

Application web de gestion bancaire développée en architecture MVC PHP permettant la gestion centralisée des clients, comptes et contrats par un administrateur unique.

## Points clés

- **Fonctionnalités** : Authentification sécurisée, tableau de bord statistique, CRUD complet pour clients, comptes bancaires et contrats
- **Architecture** : Modèle MVC, modélisation MERISE, base de données MySQL
- **Sécurité** : Hashage des mots de passe, protection contre les injections SQL

## Structure du projet

## Installation

```bash
# Clonage du dépôt
git clone https://github.com/plecompt/mvc-gestion-bancaire

# Configuration de la base de données
# 1. Configurer le fichier config/config.php avec les identifiants
# 2. Exécuter les script SQL d'initialisations avec les fichiers config/deploiement.sql et config/fill-database.sql
```

## Utilisation

1. Connectez-vous avec les identifiants administrateur uniques par défaut :
   - Email : admin@banque.fr
   - Mot de passe : admin1234

## Développement

### Structure du projet
```
root/
├── config/           # Configuration (DB, etc.)
├── subject/          # Sujet (cahier des charges)
├── merise/           # Merise (MCD, MLD, MPD)
├── controllers/      # Contrôleurs MVC
├── models/           # Modèles et DAO
│   └── repositories/ # Data Access Objects
│   └── enum/	      # Enums
├── views/            # Vues
├── assets/           # Ressources publiques (CSS, JS)
├── lib/              # Librairies internes
└── index.php         # Point d'entrée (routeur)
```

## Sécurité
- Hashage des mots de passe avec bcrypt
- Sessions sécurisées
- Protection contre les injections SQL via requêtes préparées

---