<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Participation;
 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Sql\Expression;
 use Zend\Db\ResultSet\ResultSet;
 

class Participationtable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
 public function getParticipation($id)
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
              public function fetchevenementid($id_event)
     {
         
         $rowset = $this->tableGateway->select(array('id_event' => $id_event));
         return $rowset;
     }
     
     
     
           public function fetchevent($id_participant,$id_event)
     {
         
         $rowset = $this->tableGateway->select(array('id_participant' => $id_participant,'id_event' => $id_event));
         return $rowset;
     }
      public function deleteParticipation($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
       public function saveParticipation(Participation $participation)
     {
         $data = array(
           
              'id_event' => $participation->id_event,
              'id_participant' => $participation->id_participant,
               'etat' => $participation->etat,
           
        
           
        );

         $id = (int) $participation->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getParticipation($id)) {
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
         public function fetchallbysessionid($id_event)
     {
         
         $rowset = $this->tableGateway->select(array('id_event' => $id_event));
         return $rowset;
     }
 
          public function fetchidsession($id_event)
     {
        $resultSet = $this->tableGateway->select(array('id_event' => (int) $id_event));
         return $resultSet ;
         
     }
          public function fetchsessionbyparticipant($id_participant)
     {
         
         $rowset = $this->tableGateway->select(array('id_participant' => $id_participant));
         return $rowset;
     }
             
}
