# Container Manage Children

Une extension TYPO3 qui permet de gérer les éléments enfants directement dans l'interface d'édition des conteneurs b13/container.

## Fonctionnalités

- Gestion des éléments enfants directement dans l'interface d'édition des conteneurs
- Support multilingue (FR/EN)
- Compatible avec tous les types de conteneurs b13/container
- Interface utilisateur intuitive
- Support du glisser-déposer pour réorganiser les éléments
- Gestion des traductions des éléments enfants

## Prérequis

- TYPO3 v12.4 ou supérieur
- Extension b13/container v2.2 ou supérieur

## Installation

### Installation via Composer

```bash
composer require letsweb/container-manage-children
```

### Installation manuelle

1. Téléchargez l'extension depuis le dépôt
2. Placez le dossier dans `typo3conf/ext/`
3. Activez l'extension dans le gestionnaire d'extensions TYPO3

## Configuration

### TypoScript

L'extension ajoute automatiquement la configuration TypoScript nécessaire. Pour l'inclure dans votre template :

```typoscript
@import 'EXT:container_manage_children/Configuration/TypoScript/setup.typoscript'
```

### TCA

La configuration TCA est automatiquement chargée. Le champ `container_children` est ajouté uniquement aux éléments de type conteneur b13.

## Utilisation

1. Créez un élément de type conteneur b13
2. Dans l'interface d'édition du conteneur, vous verrez une nouvelle section "Éléments enfants"
3. Utilisez les boutons pour ajouter, modifier ou supprimer des éléments
4. Réorganisez les éléments par glisser-déposer

## Traductions

L'extension est disponible en :
- Français
- Anglais

Pour ajouter une nouvelle langue :
1. Créez un nouveau dossier dans `Resources/Private/Language/`
2. Copiez le fichier `locallang.xlf` et traduisez-le

## Contribution

Les contributions sont les bienvenues ! N'hésitez pas à :
- Signaler des bugs
- Proposer des améliorations
- Soumettre des pull requests

## Licence

Cette extension est publiée sous licence GPL-2.0-or-later.

## Auteur

- Letsweb
- Site web : https://www.letsweb.fr
- Email : contact@letsweb.fr

## Remerciements

- b13 GmbH pour l'extension container
- La communauté TYPO3

## Support

Pour toute question ou problème :
- Créez une issue sur GitHub
- Contactez-nous à contact@letsweb.fr

## Changelog

### Version 1.0.0 (2024-03-19)
- Version initiale
- Support des conteneurs b13
- Interface multilingue (FR/EN)
- Gestion des éléments enfants
- Support du glisser-déposer 