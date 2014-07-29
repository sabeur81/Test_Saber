<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Medecin
 *
 * @author DELL
 */

include '../Model/connexion.php';
class Medecin {
    public $id_med;
    public $civilite_med;
    public $nom_med;
    public $prenom_med;
    public $mail_med;
    public $specialite;
    public $date_naissance_med;
    public $faculte;
    public $photo_med;
    public $login_med;
    public $password_med;
    public $adherance;
    public $gov_med;
    public $del_med;
    public $adresse_med;
    public $tel1_med;
    public $tel2_med;
    
    
    
    public function __construct($id_med, $civilite_med, $nom_med, $mail_med, $specialite, $date_naissance_med, $faculte, $photo_med, $login_med, $password_med, $adherance, $gov_med, $del_med, $adresse_med, $tel1_med, $tel2_med) {
        $this->id_med = $id_med;
        $this->civilite_med = $civilite_med;
        $this->nom_med = $nom_med;
        $this->mail_med = $mail_med;
        $this->specialite = $specialite;
        $this->date_naissance_med = $date_naissance_med;
        $this->faculte = $faculte;
        $this->photo_med = $photo_med;
        $this->login_med = $login_med;
        $this->password_med = $password_med;
        $this->adherance = $adherance;
        $this->gov_med = $gov_med;
        $this->del_med = $del_med;
        $this->adresse_med = $adresse_med;
        $this->tel1_med = $tel1_med;
        $this->tel2_med = $tel2_med;
    }

    
    public function getId_med() {
        return $this->id_med;
    }

    public function setId_med($id_med) {
        $this->id_med = $id_med;
    }
    public function getPrenom_med() {
        return $this->prenom_med;
    }

    public function setPrenom_med($prenom_med) {
        $this->prenom_med = $prenom_med;
    }

        public function getCivilite_med() {
        return $this->civilite_med;
    }

    public function setCivilite_med($civilite_med) {
        $this->civilite_med = $civilite_med;
    }

    public function getNom_med() {
        return $this->nom_med;
    }

    public function setNom_med($nom_med) {
        $this->nom_med = $nom_med;
    }

    public function getMail_med() {
        return $this->mail_med;
    }

    public function setMail_med($mail_med) {
        $this->mail_med = $mail_med;
    }

    public function getSpecialite() {
        return $this->specialite;
    }

    public function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }

    public function getDate_naissance_med() {
        return $this->date_naissance_med;
    }

    public function setDate_naissance_med($date_naissance_med) {
        $this->date_naissance_med = $date_naissance_med;
    }

    public function getFaculte() {
        return $this->faculte;
    }

    public function setFaculte($faculte) {
        $this->faculte = $faculte;
    }

    public function getPhoto_med() {
        return $this->photo_med;
    }

    public function setPhoto_med($photo_med) {
        $this->photo_med = $photo_med;
    }

    public function getLogin_med() {
        return $this->login_med;
    }

    public function setLogin_med($login_med) {
        $this->login_med = $login_med;
    }

    public function getPassword_med() {
        return $this->password_med;
    }

    public function setPassword_med($password_med) {
        $this->password_med = $password_med;
    }

    public function getAdherance() {
        return $this->adherance;
    }

    public function setAdherance($adherance) {
        $this->adherance = $adherance;
    }

    public function getGov_med() {
        return $this->gov_med;
    }

    public function setGov_med($gov_med) {
        $this->gov_med = $gov_med;
    }

    public function getDel_med() {
        return $this->del_med;
    }

    public function setDel_med($del_med) {
        $this->del_med = $del_med;
    }

    public function getAdresse_med() {
        return $this->adresse_med;
    }

    public function setAdresse_med($adresse_med) {
        $this->adresse_med = $adresse_med;
    }

    public function getTel1_med() {
        return $this->tel1_med;
    }

    public function setTel1_med($tel1_med) {
        $this->tel1_med = $tel1_med;
    }

    public function getTel2_med() {
        return $this->tel2_med;
    }

    public function setTel2_med($tel2_med) {
        $this->tel2_med = $tel2_med;
    }

   function insert_med($req)
   {
    $res=  mysql_query($req);
    if(!$res)
    {
        echo 'pb';
        throw new Exception('probleme d execution'. mysql_error());
    }
    else{
        header('location:confirm_insert_med.php');
    }
   }
   
   
     function chercher_med($req)
  {
    
         
         $res=mysql_query($req);
   $nb=  mysql_num_rows($res);
?>

        
        <table>
<caption><?PHP echo $nb.' Medecins Disponibles';?></caption>
<col><col><col>
<thead>
<tr><th>Civilite <th>Nom <th>prenom<th>specialite<th>adresse<th>photo<th>Action
</thead>
<tbody>
 <?PHP
     if($nb>0)  
     {
     while($ligne=mysql_fetch_array($res))
     {
        ?> <tr><td> <?PHP echo $ligne['civilite_med'];?> 
               <td><?PHP echo $ligne['nom_med'];?> 
               <td><?PHP echo$ligne['prenom_med'];?>
               <td><?PHP echo$ligne['specialite'];?>
               <td><?PHP echo$ligne['adresse_med'];?>
                   
               <td> <img src="<?PHP echo '../web/upload/'.$ligne['photo_med']?>" alt="im" width="80" height="80"/>         
               <td><a href="nouveauRDV.php">demander rendez-vous</a>
                   
                   <?PHP
    }
    ?>
    
</tbody>
</table>
        
      
        
        
        
        
        
 
<?PHP }}}
   
   
   



