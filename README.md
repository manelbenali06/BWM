###Application e-commerce Symfony-Angular
========================
###Pour SYMFONY
============
Lors du clone, il faut :

- Installer les vendors : composer install

- Décommenter la ligne JWT_PASSPHRASE dans .env
    ou encore mieux, mettre cette ligne dans .env.local

- Générer les clés publique et privée pour JWT (voir trame de cours)

- Vérifier le paramétrage du mailer dans le .env :
    MAILER_DSN=smtp://localhost:1025

- Vérifier le paramétrage de la BD dans le .env : bwm
- Vérifier le paramétrage de la BD dans le .prod : bwm_test

- Créer les BDs si elles n'existent pas dans votre serveur

- Exécuter les migrations pour générer le schéma physique

- Si vous avez des problèmes pour exécuter les migrations :
    Mettez en cohérence vos migrations avec celles du dépôt
    Supprimez toutes les tables de votre BD (data et structure)
    Relancez les migrations

- Renseigner les clés pour Recaptcha v3 dans .env.local

- Dans ces fixtures :
    L'admin est :           Login = ..........  Password = .....
    Tous les autres users : Login = voir mails BD   Password = ...

  
## Documentations

L'ensemble des éléments de documentation sont rangés dans [le dossier docs/](./docs). Vous trouverez néanmoins les éléments utiles au quotidien ci-dessous.

### Le [schéma d'entités](./docs/MERSIE/mcd.png)

![](./docs/mcd.svg)


Pour la partie Angular
====================
Ce projet a été généré avec Angular CLI version 16.0.4.

Serveur de développement
Exécuter ng serve pour un serveur de développement. Accédez à http://localhost:4200/. L'application se rechargera automatiquement si vous modifiez l'un des fichiers source.

Échafaudage de code
Exécutez ng generate component component-namepour générer un nouveau composant. Vous pouvez également utiliser ng generate directive|pipe|service|class|guard|interface|enum|module.

Construire
Exécutez ng buildpour générer le projet. Les artefacts de construction seront stockés dans le dist/répertoire.

Exécution de tests unitaires
Run ng testpour exécuter les tests unitaires via Karma .

Exécution de tests de bout en bout
Run ng e2epour exécuter les tests de bout en bout via une plateforme de votre choix. Pour utiliser cette commande, vous devez d'abord ajouter un package qui implémente des fonctionnalités de test de bout en bout.

Aide supplémentaire
Pour obtenir plus d'aide sur l'utilisation de la CLI angulaire ng helpou consultez la page de présentation de la CLI angulaire et de référence des commandes .
