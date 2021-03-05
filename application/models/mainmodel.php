<?php
class mainmodel extends CI_model 
{
	/***
*@function name:insertion  of student
*@author : Mahima s
*@date : 04/03/2021
***/

public function inreg($b)
{
 
   $this->db->insert("login",$b);
}
/***
*@function name:insertion of company
*@author : Mahima s
*@date : 04/03/2021
***/
public function inregs($a)
{
 
   $this->db->insert("login",$a);
}
/***
*@function name:interview details
*@author : Mahima s
*@date : 04/03/2021
***/
public function ireg($b)
{
 
   $this->db->insert("interview",$b);
}
/***
*@function name:selecting password
*@author : Mahima s
*@date : 04/03/2021
***/
public function selectpass($email,$pass)
{
$this->db->select('password');
$this->db->from("login");
$this->db->where("email",$email);
$qry=$this->db->get()->row('password');
return $qry;
}

/***
*@function name:fetching id
*@author : Mahima s
*@date : 04/03/2021
***/
public function getuserid($email)
{
$this->db->select('id');
$this->db->from("login");
$this->db->where("email",$email);
return $this->db->get()->row('id');
}
/***
*@function name:fetching id
*@author : Mahima s
*@date : 04/03/2021
***/
public function getuser($id)
{
$this->db->select('*');
$this->db->from("login");
$this->db->where("id",$id);
return $this->db->get()->row();
}
/***
*@function name:view student details
*@author : Mahima s
*@date : 05/03/2021
***/
public function viewstudent()
{
	$this->db->select('*');
	$qry=$this->db->get("student");
	return $qry;
}
/***
    *@function name:view qualification details
    *@author : Mahima s
    *@date : 05/03/2021
    ***/
public function viewqualification()
{
	$this->db->select('*');
	$this->db->join('skills','skills.loginid=qualification.loginid','inner');
	$qry=$this->db->get("qualification");
	return $qry;
}
/***
    *@function name:view project details
    *@author : Mahima s
    *@date : 05/03/2021
    ***/
public function viewproject()
{
	$this->db->select('*');
	$qry=$this->db->get("project");
	return $qry;
}
/***
    *@function name:view paper details
    *@author : Mahima s
    *@date : 05/03/2021
    ***/
public function viewpaper()
{
	$this->db->select('*');
	$qry=$this->db->get("paper");
	return $qry;
}
}
	?>