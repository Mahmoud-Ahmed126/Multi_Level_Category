<?php
class Category extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}
	public function get_categories(){

		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('parent_id', 0);

		$parent = $this->db->get();

		$categories = $parent->result_array();
		$i=0;
		foreach($categories as $p_cat){

			$categories[$i]['sub'] = $this->sub_categories($p_cat['id']);
			$i++;
		}
		return $categories;
	}
	public function sub_categories($id){

		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('parent_id', $id);

		$child = $this->db->get();
		$categories = $child->result_array();
		$i=0;
		foreach($categories as $p_cat){

			$categories[$i]['sub'] = $this->sub_categories($p_cat['id']);
			$i++;
		}
		return $categories;
	}
}


//	public function get_categories()
//	{
//
//		$this->db->select('*');
//		$this->db->from('categories');
//		$this->db->where('parent_id', 0);
//
//		$parent = $this->db->get();
//
//		$categories = $parent->result();
//		$i = 0;
//		foreach ($categories as $p_cat) {
//
//			$categories[$i]->sub = $this->sub_categories($p_cat->id);
//			$i++;
//		}
//		return $categories;
//	}
//
//	public function sub_categories($id)
//	{
//
//		$this->db->select('*');
//		$this->db->from('categories');
//		$this->db->where('parent_id', $id);
//
//		$child = $this->db->get();
//		$categories = $child->result();
//		$i = 0;
//		foreach ($categories as $p_cat) {
//
//			$categories[$i]->sub = $this->sub_categories($p_cat->id);
//			$i++;
//		}
//		return $categories;
//	}
//}
