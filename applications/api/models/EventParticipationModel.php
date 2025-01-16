<?php


class EventParticipationModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert(array $eventParticipant)
	{
		if ($this->exists($eventParticipant)) {
			return "Already Submitted participation";
		} else {
			if($this->db->insert("event_participants", $eventParticipant)) {
				return "Submitted Successfully";
			} else {
				return "Something went wrong";
			}
		}
	}

	private function exists(array $eventParticipant)
	{
		$query = $this->db->get_where
		(
			'event_participants',
			array(
				'participant_student_id' => $eventParticipant['participant_student_id'],
				'participant_name' => $eventParticipant['participant_name'],
				'participant_class' => $eventParticipant['participant_class'],
				'participant_roll_no' => $eventParticipant['participant_roll_no'],
				'event_id' => $eventParticipant['event_id']
			)
		);

		return $query->num_rows() > 0;
	}

}
