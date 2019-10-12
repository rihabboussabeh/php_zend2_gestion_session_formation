<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Messageg {
 public $id;

  public $id_session;
    public $id_formateur;
 public $objet;
  public $message;
   public $datemessage;
 
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id    = (!empty($data['id'])) ? $data['id'] : null;
         $this->id_session = (!empty($data['id_session'])) ? $data['id_session'] : null;
        $this->id_formateur= (!empty($data['id_formateur'])) ? $data['id_formateur'] : null;
            $this->objet= (!empty($data['objet'])) ? $data['objet'] : null;
             $this->message= (!empty($data['message'])) ? $data['message'] : null;
                 $this->datemessage= (!empty($data['datemessage'])) ? $data['datemessage'] : null;
          
         
        
     }
}
 