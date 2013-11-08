<?php
class Products extends CI_Model {
	
	function get_all() {
		
		$results = $this->db->get('items')->result();
		
	// 	foreach ($results as &$result) {
			
	// 		if ($result->option_values) {
	// 			$result->option_values = explode(',',$result->option_values);
	// 		}
			
	// 	}
		
	// 	return $results;
		
	 }
	
	function get($id) {
		
		$results = $this->db->get_where('items', array('productId' => $id))->result();
		$result = $results[0];
		
		// if ($result->option_values) {
		// 	$result->option_values = explode(',',$result->option_values);
		// }
		
		return $result;
	}
	
}
