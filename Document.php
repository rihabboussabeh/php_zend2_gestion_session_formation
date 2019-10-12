<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Document {
 public $id;

 public $libelle;
  public $id_session;
 public $code;
  public $etat;
 
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id    = (!empty($data['id'])) ? $data['id'] : null;
             $this->libelle = (!empty($data['libelle'])) ? $data['libelle'] : null;
         $this->id_session = (!empty($data['id_session'])) ? $data['id_session'] : null;
        
            $this->code= (!empty($data['code'])) ? $data['code'] : null;
              $this->etat= (!empty($data['etat'])) ? $data['etat'] : null;
          
         
        
     }
}
 