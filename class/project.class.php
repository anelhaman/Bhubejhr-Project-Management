<?php
class Project{
	public $id;
	public $name;
	private $db;

    public function __construct() {
    	global $wpdb;
    	$this->db = $wpdb;
    }

    public function create($name,$description,$user_id){
    	$this->db->query('INSERT INTO project(name,description,user_id,create_time) VALUE(:name,:description,:user_id,:create_time)');
		$this->db->bind(':name',$name);
		$this->db->bind(':description',$description);
		$this->db->bind(':user_id',$user_id);
		$this->db->bind(':create_time' ,date('Y-m-d H:i:s'));
		$this->db->execute();
		return $this->db->lastInsertId();
	}

	public function edit($project_id,$name,$description,$user_id){
    	$this->db->query('UPDATE project SET name = :name,description = :description,edit_time = :edit_time WHERE id = :project_id AND user_id = :user_id');
		$this->db->bind(':project_id',$project_id);
		$this->db->bind(':name',$name);
		$this->db->bind(':description',$description);
		$this->db->bind(':user_id',$user_id);
		$this->db->bind(':edit_time' ,date('Y-m-d H:i:s'));
		$this->db->execute();
	}

	public function delete($project_id,$user_id){
		$this->db->query('DELETE FROM project WHERE id = :project_id AND user_id = :user_id');
		$this->db->bind(':project_id',$project_id);
		$this->db->bind(':user_id',$user_id);
		$this->db->execute();
	}

    public function get($project_id){
    	$this->db->query('SELECT project.id project_id,project.name project_name,project.description project_description,project.user_id project_user_id,project.create_time project_craete_time,(SELECT COUNT(id) FROM activity WHERE projectid = project.id) project_total_activity FROM project AS project WHERE project.id = :project_id');
		$this->db->bind(':project_id',$project_id);
		$this->db->execute();
		$dataset = $this->db->single();
		return $dataset;
    }

    public function listWithUser($user_id){
		$this->db->query('SELECT project.id project_id,project.name project_name,project.description project_description,project.user_id project_user_id,project.create_time project_create_time,(SELECT COUNT(id) FROM activity WHERE projectid = project.id) project_total_activity FROM project AS project WHERE project.user_id = :user_id');
		$this->db->bind(':user_id',$user_id);
		$this->db->execute();
		$dataset = $this->db->resultset();
		return $dataset;
	}
}



?>
