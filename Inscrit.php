<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Inscrit {
 public $id;
 
  public $id_session;
 
 
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id    = (!empty($data['id'])) ? $data['id'] : null;
     
         $this->id_session = (!empty($data['id_session'])) ? $data['id_session'] : null;
        
          
         
        
     }
}
 