<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Evenement

{
 public $id;
 public $titre;
 public $date;
     public $description;
      public $lieu;
   public $id_formateur;
 
     public $etat;
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->titre = (!empty($data['titre'])) ? $data['titre'] : null;
         $this->date  = (!empty($data['date'])) ? $data['date'] : null;    
               $this->description  = (!empty($data['description'])) ? $data['description'] : null;  
          $this->lieu  = (!empty($data['lieu'])) ? $data['lieu'] : null;
         $this->id_formateur = (!empty($data['id_formateur'])) ? $data['id_formateur'] : null;
       $this->etat = (!empty($data['etat'])) ? $data['etat'] : null;
         
 
        
     }
}
 