<?PHP

include'../Model/Medecin.php';

$med=new Medecin("", "", "", "", "", "","", "","","","","", "", "","", "");

if(isset($_POST['enregistrer_med'])){
    
    $med->setCivilite_med($_POST['civilite_med']);
    $med->setNom_med(mysql_real_escape_string(htmlentities($_POST['nom_med'])));
    $med->setPrenom_med(mysql_real_escape_string(htmlentities($_POST['prenom_med'])));
    $med->setMail_med(mysql_real_escape_string(htmlentities($_POST['mail_med'])));
    $med->setSpecialite($_POST['specialite']);
    $med->setDate_naissance_med($_POST['daten_med']);
    $med->setFaculte(mysql_real_escape_string(htmlentities($_POST['faculte'])));
    
            
    
    $med->setPhoto_med($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'],'../web/upload/'.$med->getPhoto_med());
    $med->setLogin_med(mysql_real_escape_string(htmlentities($_POST['login_med'])));
    $med->setPassword_med(mysql_real_escape_string(htmlentities($_POST['password_med'])));
    $med->setAdherance($_POST['cnam']);
    $med->setGov_med($_POST['governorat']);
    $med->setDel_med($_POST['ville']);
    $med->setAdresse_med($_POST['adresse_med']);
    $med->setTel1_med(mysql_real_escape_string(htmlentities($_POST['tel1'])));
    $med->setTel2_med(mysql_real_escape_string(htmlentities($_POST['tel2'])));
    
    $req="INSERT INTO `medecin`
        (`id_med`, `civilite_med`,
        `nom_med`, `prenom_med`, 
        `mail_med`, `specialite`,
        `date_naissance_med`, 
        `faculte`, `photo_med`,
        `login_med`, `password_med`,
        `adherance`, `gov_med`, 
        `eleg_med`, `adresse_med`,
        `tel1_med`, `tel2_med`
        ) VALUES
        ( '',
          '" . $med->getCivilite_med() ."', '".$med->getNom_med()."',
          '" . $med->getPrenom_med() ."', '".$med->getMail_med()."', 
          '" . $med->getSpecialite()."',
          '" . $med->getDate_naissance_med(). "', '".$med->getFaculte()."',
          '" . $med->getPhoto_med(). "', '".$med->getLogin_med()."',
          '" . $med->getPassword_med(). "', '".$med->getAdherance()."',
          '" . $med->getGov_med(). "', '".$med->getDel_med()."',
          '" . $med->getAdresse_med()."', '".$med->getTel1_med()."',
          '" . $med->getTel2_med()."' 
             )";
    try{
    $med->insert_med($req);
    }
 catch (Exception $e){
     echo $e->getMessage();
 }
 
 
 }
 
    if(isset($_POST['chercher_med']))
{
    if(!empty($_POST['recherche'])){
    $choix[]='nom_med LIKE"%'.mysql_real_escape_string(htmlentities( $_POST['recherche'])).'%" OR prenom_med LIKE "%'.mysql_real_escape_string(htmlentities( $_POST['recherche'])).'%"';
    }
   
    if(!empty($_POST['governorat'])){
    $choix[]='gov_med LIKE "'.mysql_real_escape_string(htmlentities($_POST['governorat'])).'"';
    }
    if(!empty($_POST['ville'])){
    $choix[]='eleg_med LIKE "'.mysql_real_escape_string(htmlentities($_POST['ville'])).'"';
    }
    if(!empty($_POST['specialite'])){
    $choix[]='specialite LIKE "'.mysql_real_escape_string(htmlentities($_POST['specialite'])).'"';
    }
    
  if($choix!=""){
    $ch=  implode(' AND ', $choix);
    
    $req="SELECT *  FROM `medecin` WHERE $ch ";
    
   
   $med->chercher_med($req);
  //  echo$ch;
  }
 else {
      
  echo'aucune selection ';}
    
}



?>