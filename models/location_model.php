<?php


class location_model extends model
{
    public function __construct(){
        parent::__construct();

    }


    public function getCityCount()
    {
        $query="SELECT COUNT(stid), town
                FROM student
                GROUP BY town;";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchAll();
        return $final;
    }
    public function getDataAccordingToLocation($location)
    {
        $query="SELECT stid , fname , address FROM student WHERE town = '{$location}'";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchAll();
        return $final;
    }



}