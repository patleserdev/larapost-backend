# larapost-backend
Backend api incluant auth sanctums et token
- model users 
- model categories (de posts)
- posts 
- roles (users)
- login avec regénération de token et suppression des précédents : l'utilisateur a un seul token actif
- logout 
- token with sanctum

## Partie backend - api
l' API est sécurisée avec sanctum , il est nécessaire d'être connecté pour exécuter une requête api.

### posts
- ajouter un post
- supprimer un post
- modifier un post (tout ou partie)
### categories
- ajouter une categorie
- supprimer une categorie
- modifier une categorie
### roles
- ajouter un role
- supprimer un role
- modifier un role
### users
- ajouter un utilisateur
- supprimer un utilisateur
- modifier un utilisateur
- modifier le role d'un utilisateur
- optimisation des structures json de sortie

## Partie frontend

- installation paramétrage de tailwind
- configuration de vite et react
- paramétrage du react router
- premières routes