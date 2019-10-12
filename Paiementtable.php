<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Paiement;
 use Zend\Db\TableGateway\TableGateway;
 
class Paiementtable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
 public function getPaiement($id)
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
           public function fetchbyparticipant($id_participant)
     {
         
         $rowset = $this->tableGateway->select(array('id_participant' => $id_participant));
         return $rowset;
     }
           public function fetchsessionparticipant($id_participant,$id_session)
     {
         
         $rowset = $this->tableGateway->select(array('id_participant' => $id_participant,'id_session' => $id_session));
         return $rowset;
     }
      public function deletePaiement($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
       public function savePaiement(Paiement $paiement)
     {
         $data = array(
              'id_session' => $paiement->id_session,
             
            'id_participant' => $paiement->id_participant,
             
               'montant' => $paiement->montant,
              'date' => $paiement->date,
           
        
           
        );

         $id = (double) $paiement->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getPaiement($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Proposisition id does not exist');
             }
         }
     }
     
      public function fetchid($idp)
     {
        $resultSet = $this->tableGateway->select(array('id' => (int) $id));
         return $resultSet ;
         
     }
         public function fetchallbysessionid($id_session)
     {
         
         $rowset = $this->tableGateway->select(array('id_session' => $id_session));
         return $rowset;
     }
 
          public function fetchidsession($id_session)
     {
        $resultSet = $this->tableGateway->select(array('id_session' => (int) $id_session));
         return $resultSet ;
         
     }
          public function fetchsessionbyparticipant($id_participant)
     {
         
         $rowset = $this->tableGateway->select(array('id_participant' => $id_participant));
         return $rowset;
     }
  
     
}
