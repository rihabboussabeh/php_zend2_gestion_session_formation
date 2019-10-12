<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Formation {
 public $id;
 public $langage;
 public $objectif;
 public $prequis;
 public $idformateur;
  
     
 
  
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->langage = (!empty($data['langage'])) ? $data['langage'] : null;
         $this->objectif = (!empty($data['objectif'])) ? $data['objectif'] : null;
         
         $this->prequis  = (!empty($data['prequis'])) ? $data['prequis'] : null;
            $this->idformateur  = (!empty($data['idformateur'])) ? $data['idformateur'] : null;
     }
}
 