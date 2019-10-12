<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Participant

{
 public $id;
  public $cin;
 public $nom;
 public $prenom;
   public $numtel;
 public $email;
 public $login;
 public $password;
  
   
   

  
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->cin     = (!empty($data['cin'])) ? $data['cin'] : null;
         $this->nom = (!empty($data['nom'])) ? $data['nom'] : null;
         $this->prenom  = (!empty($data['prenom'])) ? $data['prenom'] : null;    
          $this->numtel = (!empty($data['numtel'])) ? $data['numtel'] : null;
         $this->email = (!empty($data['email'])) ? $data['email'] : null;
      
         $this->login  = (!empty($data['login'])) ? $data['login'] : null;
         $this->password = (!empty($data['password'])) ? $data['password'] : null;
         
          
      
     }
}
 