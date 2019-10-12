<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;




class Repense{
 public $id;

  public $id_question;
 
 
  public $repense;
   public $id_formateur;
   public $date;
 
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->id    = (!empty($data['id'])) ? $data['id'] : null;
         $this->id_question = (!empty($data['id_question'])) ? $data['id_question'] : null;
    
             $this->repense= (!empty($data['repense'])) ? $data['repense'] : null;
             
           $this->id_formateur= (!empty($data['id_formateur'])) ? $data['id_formateur'] : null;
          
                 $this->date= (!empty($data['date'])) ? $data['date'] : null;
          
         
        
     }
}
 