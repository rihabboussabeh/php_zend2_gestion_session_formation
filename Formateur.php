<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Formateur 

{
 public $id;
 public $nom;
 public $prenom;
  public $datenaiss;
   public $numtel;
    public $ville;
 public $email;
 public $etud_dip;
 public $exp_stage;
 
 public $login;
 public $password;

  
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->nom = (!empty($data['nom'])) ? $data['nom'] : null;
         $this->prenom  = (!empty($data['prenom'])) ? $data['prenom'] : null;    
         
         $this->datenaiss     = (!empty($data['datenaiss'])) ? $data['datenaiss'] : null;
         $this->numtel = (!empty($data['numtel'])) ? $data['numtel'] : null;
         $this->ville  = (!empty($data['ville'])) ? $data['ville'] : null;  
         
         $this->email = (!empty($data['email'])) ? $data['email'] : null;
         $this->etud_dip  = (!empty($data['etud_dip'])) ? $data['etud_dip'] : null;
         $this->exp_stage = (!empty($data['exp_stage'])) ? $data['exp_stage'] : null;      
       
         $this->login  = (!empty($data['login'])) ? $data['login'] : null;
         $this->password = (!empty($data['password'])) ? $data['password'] : null;
        
     }
}
 