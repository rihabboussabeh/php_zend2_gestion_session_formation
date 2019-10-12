<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Seance;
 use Zend\Db\TableGateway\TableGateway;
 
class Seancetable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

  
       public function fetchid($id)
     {
        $resultSet = $this->tableGateway->select(array('id' => (int) $id));
         return $resultSet ;
         
     }
        public function getSeance($id)
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
       
     public function deleteSeance($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
     
        public function fetchallbyformateurid($id_formateur)
     {
         
         $rowset = $this->tableGateway->select(array('id_formateur' => $id_formateur));
         return $rowset;
     }

     
      public function saveSeance(Seance $seance)
     {
         $data = array(
            
 
  
             'dateseance' => $seance->dateseance,
             'id_session'  => $seance->id_session,
             
              'id_formateur'  => $seance->id_formateur,
         'etat'  => $seance->etat,
            
         );

         $id = (int) $seance->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getSeance($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('seance id does not exist');
             }
         }
     }
         public function fetchseancebysession($id_session)
     {
         
         $rowset = $this->tableGateway->select(array('id_session' => $id_session));
         return $rowset;
     }
     

     
}
