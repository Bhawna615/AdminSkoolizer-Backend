<?php


class SmsModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function loadBirthdays()
	{
		$day=date('d');
		$month=date('m');
		$sql='SELECT * FROM student WHERE DAY(Dob)=? AND MONTH(Dob)=?';
		$query=$this->db->query($sql,array($day,$month));
		$result=$query->result();
		return $result;
	}

	public function loadRecipients()
	{
		$query=$this->db->query('SELECT id,Name,Rollno,Smsno,Class FROM student');
		$result=$query->result();
		return $result;
	}

	public function getSmsData(array $ids)
	{
		$smsData = array();
		foreach ($ids as $key => $id) {
			$smsDataObject = $this->db->select('Name, Smsno')
				->where('id', $id)->get('student')->row();
			$smsData[] = array(
				'name' => $smsDataObject->Name,
				'number' => array("91".$smsDataObject->Smsno),
				'date' => date("d-m-Y")
			);
		}

		return $smsData;
	}

	public function getBirthdaySmsData(array $ids)
    {
        $smsData = array();
        foreach ($ids as $key => $id) {
            $smsDataObject = $this->db->select('Name, Smsno, Dob')
                ->where('id', $id)->get('student')->row();
            $smsData[] = array(
                'name' => $smsDataObject->Name,
                'number' => array("91".$smsDataObject->Smsno),
                'dob' => $smsDataObject->Dob
            );
        }

        return $smsData;
    }
}
