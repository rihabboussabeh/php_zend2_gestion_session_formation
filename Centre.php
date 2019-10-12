<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Centre 

{
 public $id;
 public $nom;
  
     public $ville;
      public $adress;
   public $num_tel;

 public $email;
 
 public $login;
 public $password;

  
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->nom = (!empty($data['nom'])) ? $data['nom'] : null;
      
               $this->ville  = (!empty($data['ville'])) ? $data['ville'] : null;  
          $this->adress  = (!empty($data['adress'])) ? $data['adress'] : null;
         $this->num_tel = (!empty($data['num_tel'])) ? $data['num_tel'] : null;
   
         
         $this->email = (!empty($data['email'])) ? $data['email'] : null;
       
         $this->login  = (!empty($data['login'])) ? $data['login'] : null;
         $this->password = (!empty($data['password'])) ? $data['password'] : null;
        
     }
}
 