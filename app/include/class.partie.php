<?php
class Session
{
    private $idEquipe;
    private  $dateDebut;
    private  $dateFin;

    public function __construct(string $unIdEquipe, string $uneDateDebut, string $uneDateFin)
    {
        $this->idEquipe = $unIdEquipe;
        $this->dateDebut = $uneDateDebut;
        $this->dateFin = $uneDateFin;
    }

    public function getIdEquipe()
    {
        return $this->idEquipe;
    }
    public function getDateDebut()
    {
        return $this->dateDebut;
    }
    public function getDateFin()
    {
        return $this->dateFin;
    }

    public function getTempsMinuteur($dateDebut, $dateFin)
    {
        // $dateDebut = $this->dateDebut;
        $heureDebut =  explode(' ', $dateDebut)[1];
        $heureFin =  explode(' ', $dateFin)[1];

        $h =  intval(explode(':', $heureFin)[0]) - intval(explode(':', $heureDebut)[0]);
        $m =  intval(explode(':', $heureFin)[1]) - intval(explode(':', $heureDebut)[1]);
        $s =  intval(explode(':', $heureFin)[2]) - intval(explode(':', $heureDebut)[2]);

        if ($h < 10 && $h >= 0) {
            $h = '0' . $h;
        }
        if ($m < 10 && $m >= 0) {
            $m = '0' . $m;
        }
        if ($s < 10 && $s >= 0) {
            $s = '0' . $s;
        }


        echo $h . ':' . $m . ':' . $m;
        // echo intval(date($dateFin, 'hh'));


        // $hours = intval(date($dateDebut, 'hh')) - intval(date($dateFin, 'hh'));
        // return $hours;
    }
}
