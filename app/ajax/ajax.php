<?php

switch ($_REQUEST['action']) {
    case 'tabScore': {

            $date1 = new DateTime('now', new DateTimeZone('Indian/Reunion'));
            $date2 = new DateTime('2022-11-09 00:00:00', new DateTimeZone('Indian/Reunion'));
            $interval = $date1->diff($date2);
            $minuteur =   $interval->format('%H:%I:%S');

            $pdo = new PDO('mysql:host=localhost;dbname=hackathon_victor', 'root', '');

            $sql = "select * from infotabscore";
            $res = $pdo->query($sql);
            $lignes = $res->fetchAll();
            $i = 1;


            // afficher les lignes en json avec l'objet partie 

            $partie = json_encode(['partie' => $lignes, 'minuteur' => ['time' => $minuteur]]);
            echo $partie;

            // echo json_encode($test);


            // var_dump($session1);
            break;
        }

    case 'testFlag': {
            $flag = $_REQUEST['flag'];
            $pdo = new PDO('mysql:host=localhost;dbname=hackathon_2022', 'root', 'root');
            $sql = "SELECT * from enigme where flag='$flag';";
            $res = $pdo->query($sql);
            $lignes = $res->fetchAll();
            if (count($lignes) > 0) {
                echo 'true';
            } else {
                echo 'false';
            }
            break;
        }

    case 'addPoint': {
            $id = $_POST['idEnigme'];
            $idEquipe = $_POST['idEquipe'];
            // $equipe = $_request['equipe'];
            $pdo = new PDO('mysql:host=localhost;dbname=hackathon_2022', 'root', 'root');
            $sql = "UPDATE compopartie SET enigme_id=enigme_id +1, scoreActuel=scoreActuel + (select point from enigme where id=$id) where equipe_id=" . $idEquipe . ";";
            echo $sql;

            $res = $pdo->exec($sql);
            // query sql avec gestion erreur
            if ($res) {
                echo 'true';
            } else {
                echo 'false';
            }
            break;
        }

    default: {
            // include("vues/v_connexion.php");
            // break;
        }
}
