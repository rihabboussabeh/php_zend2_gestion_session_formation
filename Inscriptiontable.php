<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Inscription;
 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\Sql\Expression;
 use Zend\Db\ResultSet\ResultSet;
 use Zend\Form\Annotaion\AnnotationBuilder;
 use Form\Element\Select;
  
 

class Inscriptiontable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
 public function getInscription($id)
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
      public function deleteInscription($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
       public function saveInscription(Inscription $inscription)
     {
         $data = array(
           
              'id_session' => $inscription->id_session,
              'id_participant' => $inscription->id_participant,
               'etat' => $inscription->etat,
           
        
           
        );

         $id = (int) $inscription->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getInscription($id)) {
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
             public function fetchsession()
     { 
 
         
         $resultSet= $this->tableGateway;
        return $resultSet->select($this->tableGateway)
                    ->group('id_session')
                    ->order('id')
                    ->getQuery()->getResult();
     } 
     
     
   
}
