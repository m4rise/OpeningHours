# OpeningHours

### Installation du Projet

- 1 -
   Clonez ce dépot ou téléchargez directement l'archive.
   
- 2 -
   Modifiez si nécessaire les variables d'environnement (.env) et la config
   (Doctrine paramétré pour MySQL 8.0.17)
   
- 3 -
   Depuis la racine du répertoire, lancez la commande "composer install"
   afin d'installer les dépendances nécessaires
   
- 4 -
  Lancez les commandes :
    "php bin/console doctrine:database:create"
    "php bin/console doctrine:migrations:migrate"
    "php bin/console doctrine:fixtures:load"
    
- 5 -
  Par défaut 3 magasins sont crées par fixture, les horaires 
  par restaurant sont disponible aux URI correspondant à l'id en BDD de chaque restaurant :
  /{id} (1 <= id <= 3)
  
- 6 -
  Profitez des fonctionnalités et n'hésitez pas à me faire un retour si des améliorations sont possibles
  ou si des problèmes sont rencontrés!
