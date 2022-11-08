<?php
class Challenge
{

    private $id;
    private $libelle;
    private $point;
    private $flag;
    private $url;

    public function __construct($unId, $unLibelle, $unPoint, $unFlag, $unUrl)
    {
        $this->id = $unId;
        $this->unLibelle = $unLibelle;
        $this->point = $unPoint;
        $this->flag = $unFlag;
        $this->url = $unUrl;
    }

    public function __toString()
    {
        return $this->id;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getLibelle()
    {
        return $this->libelle;
    }
    public function getPoint()
    {
        return $this->point;
    }
    public function getFlag()
    {
        return $this->flag;
    }
    public function getUrl()
    {
        return $this->url;
    }
}
