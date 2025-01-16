<?php


class TransportModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getPassengerId($id)
    {
        $sql = 'SELECT Passengerid FROM student WHERE id=?';
        $query = $this->db->query($sql,$id);
        $result = $query->result();
        return $result;
    }

    public function transportInfo($data)
    {
        foreach($data as $row)
        {
            $passengerId = $row->Passengerid;
        }
        $sql='SELECT * FROM passengers,routes,stations WHERE passengers.Routeid=routes.id AND passengers.Stationid=stations.id AND passengers.id=?';
        $query = $this->db->query($sql, $passengerId);
        if (!$query) {
            echo "Something went wrong";
        }
        return $query->result();
    }

    public function loadActiveRoute($data)
    {
        foreach($data as $row)
        {
            $passengerId = $row->Passengerid;
        }
        $sql = 'SELECT * FROM passengers,currentroute,transportstaff,subroutes WHERE passengers.Routeid=currentroute.routeid AND currentroute.driverid=transportstaff.id AND currentroute.subrouteid=subroutes.id AND passengers.id=? AND currentroute.status=FALSE';
        $query = $this->db->query($sql, $passengerId);
        return $query->result();
    }

    public function loadLastRoute($data)
    {
        $date = date("Y-m-d");
        foreach($data as $row)
        {
            $passengerId = $row->Passengerid;
        }
        $sql = 'SELECT * FROM passengers,currentroute,transportstaff,subroutes WHERE passengers.Routeid=currentroute.routeid AND currentroute.driverid=transportstaff.id AND currentroute.subrouteid=subroutes.id AND passengers.id=? AND date(currentroute.Reachedat)=? AND currentroute.status=TRUE ORDER BY currentroute.Reachedat desc LIMIT 1';
        $query = $this->db->query($sql,array($passengerId, $date));
        return $query->result();
    }

    public function vehicleInfo($busId)
    {
        return $this->db->where('id', $busId)
            ->get('buses')->row();
    }

}