<?php
/*     kol table les attribu mte3haa  w les fonction  exchange*/
namespace Application\Model;





class Session {
 public $idp;
 
 public $langage;
 
 public $datedebut;  
 public $nbh;
 public $prixh;
  public $prixs;
 public $nbg;  
 public $idformateur;
 public $etat;
  public $id_centre;

  
   
   public function exchangeArray($data)
     {
       //tab en objet
         $this->idp     = (!empty($data['idp'])) ? $data['idp'] : null;
          
         $this->langage = (!empty($data['langage'])) ? $data['langage'] : null;
           $this->objectif = (!empty($data['objectif'])) ? $data['objectif'] : null;
           $this->prequis = (!empty($data['prequis'])) ? $data['prequis'] : null;
         $this->description  = (!empty($data['datedebut'])) ? $data['datedebut'] : null;
         $this->nbh  = (!empty($data['nbh'])) ? $data['nbh'] : null;
         $this->prixh = (!empty($data['prixh'])) ? $data['prixh'] : null;
               $this->prixs = (!empty($data['prixs'])) ? $data['prixs'] : null;
         $this->nbg  = (!empty($data['nbg'])) ? $data['nbg'] : null;
         $this->idformateur = (!empty($data['idformateur'])) ? $data['idformateur'] : null;
         $this->etat = (!empty($data['etat'])) ? $data['etat'] : null;
         $this->id_centre = (!empty($data['id_centre'])) ? $data['id_centre'] : null;
         
        
     }
}
 