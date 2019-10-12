<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Presence {
 public $id;
 public $id_seance;
 public $id_participant; 
 public $etat; 


  
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id    = (!empty($data['id'])) ? $data['id'] : null;    
         $this->id_seance = (!empty($data['id_seance'])) ? $data['id_seance'] : null;
           $this->id_participant = (!empty($data['id_participant'])) ? $data['id_participant'] : null;
           $this->etat = (!empty($data['etat'])) ? $data['etat'] : null;
      
      
         
        
     }
}
 