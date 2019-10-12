<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Seance {
 public $id;
 public $dateseance;
 public $id_session;
 public $id_formateur;
 public $etat;


  
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id    = (!empty($data['id'])) ? $data['id'] : null;
          
         $this->dateseance = (!empty($data['dateseance'])) ? $data['dateseance'] : null;
           $this->id_session = (!empty($data['id_session'])) ? $data['id_session'] : null;
           $this->id_formateur = (!empty($data['id_formateur'])) ? $data['id_formateur'] : null;
        $this->etat = (!empty($data['etat'])) ? $data['etat'] : null;

      
         
        
     }
}
 