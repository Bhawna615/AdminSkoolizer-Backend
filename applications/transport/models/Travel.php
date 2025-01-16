<?php
class Travel extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();		
	}
	function verifyUser($email,$password)
	{
		$sql='SELECT * FROM transportstaff WHERE Email=?';
		$query=$this->db->query($sql,$email);
		$result=$query->result();
		foreach ($result as $row) {
			if (password_verify($password, $row->Password)) {
				return $result;
			}
			else
			{
				return FALSE;
			}
		}
	}
	function profile($id)
	{
		$sql='SELECT * FROM transportstaff WHERE id=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;
	}

	function loadroutes()
	{
		$query=$this->db->query('SELECT * FROM routes');
		$result=$query->result();
		return $result;
	}

	function routedetails($routeid)
	{
		$sql='SELECT * FROM subroutes WHERE routeid=?';
		$query=$this->db->query($sql,$routeid);
		$result=$query->result();
		return $result;
	}

	function loadCurrentRoute($id)
	{
		$sql='SELECT * FROM currentroute,routes,subroutes WHERE currentroute.routeid=routes.id AND currentroute.routeid=subroutes.routeid AND subroutes.id=currentroute.subrouteid AND currentroute.driverid=? AND currentroute.status=FALSE';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;
	}

	function beginRoute($id, $data)
	{
		$sql='SELECT * FROM currentroute WHERE driverid=? AND status=FALSE';
		$query=$this->db->query($sql, $id);
		$result=$query->num_rows();
		if ($result > 0) {
			echo "You are already on a Route";
		}
		else if ($result < 1) {
            $this->db->insert('currentroute', $data);
        }
	}

	function finishRoute($id)
	{
		$timestamp=date('Y-m-d h:i:s');
		$sql2='UPDATE passengers,currentroute,transportstaff SET passengers.Presence=FALSE where passengers.Routeid=currentroute.routeid AND currentroute.driverid=transportstaff.id AND transportstaff.id=? ';
		$query2=$this->db->query($sql2,$id);
		if (!$query2) {
		  echo "Something went wrong";
		}
		$sql='UPDATE currentroute SET status=TRUE,Reachedat=? WHERE driverid=? AND status=FALSE';
		$query=$this->db->query($sql,array($timestamp,$id));
		if (!$query) {
			echo "Something went wrong";
		}
	}

	function loadstations($routeid)
	{
		$sql='SELECT * FROM stations WHERE RouteId=?';
		$query=$this->db->query($sql,$routeid);
		if (!$query) {
			echo "Something went wrong";
		}
		$result=$query->result();
		return $result;
	}

	function loadpassengers($id)
	{
		$sql='SELECT routeid FROM currentroute WHERE driverid=?';
		$query=$this->db->query($sql,$id);
		if (!$query) {
			echo "Something went wrong";
		}
		$result=$query->result();
		foreach ($result as $row) {
			$routeid=$row->routeid;
		}

		$sql2='SELECT * FROM passengers WHERE routeid=?';
		$query2=$this->db->query($sql2,$routeid);
		$result2=$query2->result();
		return $result2;

	}

	public function togglestatus($passengerid)
	{
		$sql = 'UPDATE passengers SET Presence = !Presence WHERE id=?';
		$query = $this->db->query($sql, $passengerid);
		if (!$query) {
			echo "Something went Wrong";
		}
		$sql2 = 'SELECT Presence FROM passengers WHERE id=?';
		$query2 = $this->db->query($sql2, $passengerid);
		$result2 = $query2->result();
		return $result2;
	}

	    function updateuserpassword($id,$new)
   {
    $sql='UPDATE transportstaff SET Password=? WHERE id=?';
    $query=$this->db->query($sql,array($new,$id));
    if (!$query) {
      echo "Something went wrong";
    }
   }

function uploadimage($id,$img)
   {
    $sql='UPDATE transportstaff SET image=? WHERE id=?';
    $query=$this->db->query($sql,array($img,$id));
    if (!$query) {
        echo "Something went wrong";
    }
   }

     function loadmessages()
   {
    $sql='SELECT * FROM messages,audience WHERE messages.id=audience.messageid AND (audience.audience="Everyone" OR audience.audience="Transport Staff") ORDER BY messages.Timestamp desc';
    $query=$this->db->query($sql);
    $result=$query->result();
    return $result;
   }

   function mybusdetails()
   {
   		return $this->db->get('buses')->result();
   }

   function viewpassengerslist()
   {
   	$sql='SELECT * FROM passengers,routes,stations WHERE passengers.routeid=routes.id AND passengers.stationid=stations.id';
   	$query=$this->db->query($sql);
   	$result=$query->result();
   	return $result;
   }

   function getroutetimings()
   {
   		$sql = 'SELECT * FROM routes,subroutes WHERE routes.id=subroutes.routeid';
   		$query=$this->db->query($sql);
   		$result=$query->result();
   		return $result;
   }

   public function loadBuses()
   {
       $query = $this->db->get('buses');
       return $query->result();
   }
}
?>