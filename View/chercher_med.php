<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <link rel="stylesheet"  href="../web/css/styletable.css">
        <script  type="text/javascript" src="../web/js/jquery.js"></script>
        <script  type="text/javascript" src="../web/js/chercher_med.js"></script>
        <title></title>
    </head>
    <body>

        <form method="POST">
            <div class="chercher_med">
                <input type="search" name="recherche" placeholder="Nom et Prénom Medecin" style="fontsize: 10">
                <label>Governorat</label> 
                <select ID="governorat" name="governorat">

                    <option></option> 
                    <?php
                    mysql_connect("localhost", "root", "");
                    mysql_select_db('saas')or die("base innexistante");
                    $req = "SELECT * FROM `governorat`";
                    $res = mysql_query($req);
                    while ($ligne = mysql_fetch_array($res)) {
                        ?>

                        <option><?PHP echo $ligne['gov']; ?></option>


<?PHP } ?>
                </select>
                <label>Délegation</label> 
                <select ID="ville" name="ville">
                    <option></option>
                </select>

                <label>Spécialité</label> <select id="specialite"name="specialite">
                    <option></option>
                    <option>générale</option> 
                    <option>Cardiologie </option> 
                    <option>Chirurgie </option>
                    <option>Neurochirurgie</option>
                    <option>Neurologie</option> 
                    <option>Ophtalmologie</option>
                    <option>Psychiatrie</option>
                    <option>Dermatologie</option></select>

                <input type="submit" name="chercher_med" value="chercher"></div>
            <img src="../web/upload/chercher_med.gif" id="sc"width="150" align="center">   

        </form>
<?php
include '../controller/controller_medecin.php';
?>
        <!--<script  type="text/javascript" src="../web/js/jquery.js"></script>
        <script  type="text/javascript" src="../web/js/controle_med.js"></script>7
-->
    </body>
</html>