<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Evenement;
 
 use Zend\Db\TableGateway\TableGateway;
 
class Evenementtable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
      public function getEvenement($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
 
       
   
     
     public function deleteEvenement($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
     
        public function saveEvenement(Evenement $evenement)
     {
         $data = array(
 
              'titre' => $evenement->titre,
              'date' => $evenement->date,
              'description' => $evenement->description,
             'lieu' => $evenement->lieu,
              'id_formateur' => $evenement->id_formateur,
                 'etat' => $evenement->etat,
          
            
        );

         $id = (int) $evenement->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getEvenement($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('evenement id does not exist');
             }
         }
     }
     
     
      public function fetchid($id)
     {
        $resultSet = $this->tableGateway->select(array('id' => (int) $id));
         return $resultSet ;
         
     }
     
       public function fetchallbycentreid($lieu)
     {
         
         $rowset = $this->tableGateway->select(array('lieu' => $lieu));
         return $rowset;
     }
     
       public function fetchformateurid($id_formateur)
     {
         
         $rowset = $this->tableGateway->select(array('id_formateur' => $id_formateur));
         return $rowset;
     }
     

     
     
     
}
