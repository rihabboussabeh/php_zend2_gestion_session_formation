<?php

/* tablegateway constructeur mte3o m3a les methode illi mech nzidohem */ 

namespace Application\Model;
use Application\Model\Session;
 use Zend\Db\TableGateway\TableGateway;
 
class Sessiontable {
    
   protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }
 public function getSession($idp)
     {
         $idp  = (int) $idp;
         $rowset = $this->tableGateway->select(array('idp' => $idp));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $idp");
         }
         return $row;
     }
     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }
      public function deleteSession($idp)
     {
         $this->tableGateway->delete(array('idp' => (int) $idp));
     }
       public function saveSession(Session $session)
     {
         $data = array(
           
              'langage' => $session->langage,
         
              'datedebut' => $session->datedebut,
              'nbh' => $session->nbh,
             'prixh' => $session->prixh,
             'prixs' => $session->prixs,
              'nbg' => $session->nbg,
          'idformateur' => $session->idformateur,
              'etat' => $session->etat,
                  'id_centre' => $session->id_centre,
             
        
           
        );

         $idp = (int) $session->idp;
         if ($idp == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getSession($idp)) {
                 $this->tableGateway->update($data, array('idp' => $idp));
             } else {
                 throw new \Exception('Proposisition id does not exist');
             }
         }
     }
     
      public function fetchid($idp)
     {
        $resultSet = $this->tableGateway->select(array('idp' => (int) $idp));
         return $resultSet ;
         
     }
       public function fetchallbyformateurid($idformateur)
     {
         
         $rowset = $this->tableGateway->select(array('idformateur' => $idformateur));
         return $rowset;
     }
              public function fetchallbycentreid($id_centre)
     {
         
         $rowset = $this->tableGateway->select(array('id_centre' => $id_centre));
         return $rowset;
     }
     
}
