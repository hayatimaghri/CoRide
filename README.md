# 🚗 CoRide

> Plateforme web de covoiturage destinée aux salariés d'entreprises partenaires.

## 📌 Présentation du projet

**CoRide** est une application web développée pour **MobiliTech**, une startup spécialisée dans la mobilité durable en entreprise.

L'objectif est de permettre aux employés de différentes entreprises partenaires de :

- publier des trajets domicile-travail ;
- rechercher des trajets compatibles avec leur situation ;
- réserver une place ;
- suivre leurs réservations ;
- gérer le statut des réservations ;
- bénéficier d'un **score de compatibilité basé sur l'IA**.

Contrairement à un simple filtre SQL par ville ou par horaire, CoRide utilise une brique IA afin de fournir :

- un score de compatibilité sur 100 ;
- une justification du score ;
- un horaire suggéré.

---

# 🎯 Objectifs

Le projet répond aux objectifs suivants :

- Concevoir une base de données relationnelle cohérente.
- Implémenter une architecture MVC avec Laravel.
- Sécuriser l'accès avec Laravel Breeze.
- Gérer les utilisateurs, entreprises, trajets et réservations.
- Appliquer les règles métier du covoiturage.
- Intégrer une brique IA avec `laravel/ai`.
- Stocker le résultat structuré de l'IA grâce à un **Custom Cast**.
- Fournir une interface Blade simple et ergonomique.

---

# 👥 Règles métier

CoRide respecte les règles suivantes :

1. Un employé appartient à une seule entreprise.
2. L'adresse email professionnelle d'un employé est unique.
3. Un employé peut être :
   - conducteur ;
   - passager ;
   - conducteur et passager.
4. Un trajet est proposé par un conducteur.
5. Un trajet contient :
   - une ville de départ ;
   - une ville d'arrivée ;
   - un horaire ;
   - un nombre de places disponibles ;
   - des jours de récurrence.
6. Le nombre de réservations confirmées ne peut pas dépasser le nombre de places disponibles.
7. Un passager ne peut pas réserver deux fois le même trajet.
8. Une réservation possède un statut :
   - `en_attente`
   - `confirmee`
   - `refusee`
   - `annulee`
9. Les transitions de statut sont contrôlées.
10. Un trajet avec des réservations confirmées ne peut pas être supprimé.
11. Le score IA est calculé uniquement lorsqu'un **passager recherche un trajet**.
12. Le scoring IA n'est jamais calculé côté conducteur.
13. Les suppressions respectent l'intégrité référentielle.

---

# 🤖 Fonctionnalité IA

L'une des fonctionnalités principales de CoRide est le **score de compatibilité IA**.

Lorsqu'un passager recherche un trajet, l'application transmet à l'IA :

- la ville de résidence du passager ;
- la ville de départ ;
- la ville d'arrivée ;
- l'horaire ;
- les jours de récurrence.

L'IA retourne une réponse structurée contenant :

```json
{
    "score": 90,
    "justification": "Témara et Rabat sont des villes proches...",
    "horaire_suggere": "08:15:00"
}