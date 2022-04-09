# E-LIBRARY

## DESCRIPTION
E-LIBRARY is a project written in PHP, HTML AND CSS to manage a school library. It's a little project which will help librairian to be more at ease for books management.
It helps by registring students users,student's classes, books, and differents lends students INSTALLATION

## INSTALLATION
* Clone the repository
```
git clone https://github.com/MiguelGillesIT/E-LIBRARY.git
```

* Create a database named **biblio** and import the **biblio.sql** in root directory.
*  In   **userbiblio** table create a new user by filling manually the differents fields. The password must be hashed with Bcrypt algorithm. You can use this site to create the hash  [Bcrypt.online](https://bcrypt.online/). The cost factor used must be 10. 
*  In the model/model file change **username** and **password** of database for configuration. 
* Add manually new books in **livre** table.


## USAGE
* Log yourself with e-mail and password from **userbiblio** table.

## AUTHORS

* [KOUEVIDJIN MIGUEL](https://github.com/MiguelGillesIT)
