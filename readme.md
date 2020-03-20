- Quelles sont les 2 méthodes HTTP utilisables dans un formulaire en PHP ?

> `GET` et `POST` sont les méthodes HTTP utilisés dans un formulaire PHP

- Quelle est la différence entre `include`, `include_once`, `require` et `require_once` ?
  
  >     Avec `require()`, il y aura une erreur fatale, et le script s'arrêtera
  > 
  >     Avec `include()`, il y aura un avertissement, mais le script continuera,     s'il le peut
  > 
  >     Avec `once`, dans les deux cas (include et require), le fichier ne sera inclu     qu'une     seule fois, par exemple dans le cas où le fichier est inclu dans     une boucle

- Quelle fonction devez-vous appeler pour utiliser les sessions dans votre application
  
  > `session_start`

- Qu'est-ce qu'un DSN et à quoi sert-il dans le cadre de PDO ?

- Quelle est la différence entre une requête préparée et une requête non préparée ?
  
  > Une requête préparée ou requête paramétrable est utilisée pour exécuter la même requête plusieurs fois, avec une grande efficacité. Elles vont créées en trois temps : la préparation, la compilation et l’exécution.
  
  

- Quelle est la différence entre la méthode `GET` et la méthode `POST` ?
  
  >     Pour faire simple, on utilise `GET` pour obtenir des données, et `POST`     pour
  >       transmettre des données, même s’il est parfaitement possible     d’envoyer 
  >       des données avec `GET` et d’en recevoir avec `POST`.
