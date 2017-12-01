<?php
class Project{
	public $id;
	public $name;
	private $db;

    public function __construct() {
    	global $wpdb;
    	$this->db = $wpdb;
    }

    public function get($project_id){
    	$this->db->query('SELECT project.id project_id,project.name project_name,project.owner project_owner_id,project.time project_craete_time,(SELECT COUNT(id) FROM activity WHERE projectid = project.id) project_total_activity FROM project AS project WHERE project.id = :project_id');
		$this->db->bind(':project_id',$project_id);
		$this->db->execute();
		$dataset = $this->db->single();
		return $dataset;
    }

    public function listWithUser($user_id){
		$this->db->query('SELECT project.id project_id,project.name project_name,project.owner project_owner_id,project.time project_create_time,(SELECT COUNT(id) FROM activity WHERE projectid = project.id) project_total_activity FROM project AS project WHERE owner = :user_id');
		$this->db->bind(':user_id',$user_id);
		$this->db->execute();
		$dataset = $this->db->resultset();
		return $dataset;
	}


	public function getall(){
		$this->db->query('SELECT * FROM project ');
		// $this->db->bind(':id',$id);
		$this->db->execute();

		$dataset = $this->db->resultset();

		return $dataset;

		// $this->id = $dataset['id'];
		// $this->name = $dataset['name'];

	}

	public function countAllProject(){
		$this->db->query('SELECT count(*) as n FROM project ');
		// $this->db->bind(':id',$id);
		$this->db->execute();

		$dataset = $this->db->single();

		return $dataset;
	}

	public function countProjectFormOwnerID($id){

			if ($id >= 10001 && $id <= 10010){

				return $this->countAllProject();


			}else{

				$this->db->query('SELECT count(*) as n FROM project where owner=:id');
				$this->db->bind(':id',$id);
				$this->db->execute();

				$dataset = $this->db->single();

				return $dataset;

			}




	}
	public function getProjectFromIdUser($id){

		if ($id >= 10001 && $id <= 10010){ // level admin

		return $this->getall();
		}
		else{  // level user
				$dataset = $this->getProjectOwnerID($id);
			return $dataset;

		}

	}
	public function getProjectnameFromID($id){
		$this->db->query('SELECT name FROM project where owner = :id');
		 $this->db->bind(':id',$id);
		 $this->db->execute();
 		$dataset = $this->db->resultset();

 		return $dataset;

	}
	public function getProjectFromID($id){
		$this->db->query('SELECT * FROM project where id = :id');
		 $this->db->bind(':id',$id);
		 $this->db->execute();
 		$dataset = $this->db->single();

 		return $dataset;

	}
	public function getProjectOwnerID($id){
		$this->db->query('SELECT * FROM project where owner = :id');
		 $this->db->bind(':id',$id);
		 $this->db->execute();
 		$dataset = $this->db->resultset();

 		return $dataset;

	}

	public function addproject($project_name,$id)
	{

		$id = trim($id);
		if($project_name != null){

			try {
				$this->db->query('INSERT INTO project VALUES (NULL, :name, :id, CURRENT_TIMESTAMP)');
				$this->db->bind(':name',$project_name);
				$this->db->bind(':id',$id);
				$this->db->execute();

				return 1;

			} catch (Exception $e) {


				echo "<a class='btn btnback  btn-warning' href='./'>กลับสู่หน้าหลัก</a><br>";
				echo "<pre id='prewarncontent'> ไม่สามารถ เพิ่มโครงการได้</pre>";

			}


		}else{
		echo "error project name is null";

		}
	}


}



?>
