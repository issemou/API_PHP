<?php

class Authors
{
    /**
     * Authors Properties
     */
    public $id;
    public $firstname;
    public $lastname;

    /**
     * Authors constructor.
     * @param $id
     */
    function __construct($id) {

        global $db;

        $id = str_secur($id);

        $reqAuthor = $db->prepare('SELECT * FROM authors WHERE id = ?');
        $reqAuthor->execute([$id]);
        $data = $reqAuthor->fetch();

        $this->id = $id;
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];

    }


    /**
     * Envoie de tous les auteurs
     * @return array
     */
    static function getAllAuthors() {

        global $db;

        $reqAuthors = $db->prepare('SELECT * FROM authors');
        $reqAuthors->execute([]);
        return $reqAuthors->fetchAll();
    }
    
    /**
     * Ajout de l'autheur
     * @api authors
     */
    static function CreatAuthor($firstname,$lastname){

        global $db;

        $firstname=str_secur($firstname);
        $lastname=str_secur($lastname);

        $reqAuthors = $db->prepare('INSERT INTO authors(firstname,lastname) VALUES (?,?)');
       if($reqAuthors->execute([$firstname,$lastname]))
       {
                  return true;
       }
    }

}