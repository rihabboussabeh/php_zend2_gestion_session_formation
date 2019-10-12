<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Presence;
 use Zend\Db\TableGateway\TableGateway;
 
class Presencetable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

  
    
  public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
       
     public function deletePresence($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
     
        public function fetchallbyformateurid($id_formateur)
     {
         
         $rowset = $this->tableGateway->select(array('id_formateur' => $id_formateur));
         return $rowset;
     }
     public function fetchseanceparticipant($id_participant,$id_seance)
     {
         
         $rowset = $this->tableGateway->select(array('id_participant' => $id_participant,'id_seance' => $id_seance));
         return $rowset;
     }
        public function fetchparticipant($id_participant)
     {
         
         $rowset = $this->tableGateway->select(array('id_participant' => $id_participant));
         return $rowset;
     }
     
      public function savePresence(Presence $presence)
     {
         $data = array(
            
 
             'id_seance' => $presence->id_seance,
             'id_participant'  => $presence->id_participant,
              'etat'  => $presence->etat,
        
            
         );

         $id = (int) $presence->id;
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
     
}
