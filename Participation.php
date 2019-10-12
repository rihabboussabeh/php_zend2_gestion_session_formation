<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Participation {
 public $id;
 public $id_event;
 public $id_participant;
 public $etat;
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id    = (!empty($data['id'])) ? $data['id'] : null;
          
         $this->id_session = (!empty($data['id_event'])) ? $data['id_event'] : null;
           $this->id_participant = (!empty($data['id_participant'])) ? $data['id_participant'] : null;
            $this->etat= (!empty($data['etat'])) ? $data['etat'] : null;
          
         
        
     }
}
 