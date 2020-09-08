<?php

class Department extends App {

    // ----------------------------------------------------------------------------------------------
    // CATEGORIES

    public static function addDepartmentCategory($data) {
    	global $database;
        if(!isset($data['color'])) $data['color'] = "#167cc1";
    	$lastid = $database->insert("departmentcategories", [ "name" => $data['name'], "color" => $data['color'] ]);
    	if ($lastid == "0") { return "11"; } else { logSystem("DepartmentCategory Added - ID: " . $lastid); return "10"; }
    	}

    public static function editDepartmentCategory($data) {
    	global $database;
        if(!isset($data['color'])) $data['color'] = "#167cc1";
    	$database->update("departmentcategories", [ "name" => $data['name'], "color" => $data['color'] ], [ "id" => $data['id'] ]);
    	logSystem("DepartmentCategory Edited - ID: " . $data['id']);
    	return "20";
    	}

    public static function deleteDepartmentCategory($id) {
    	global $database;
        $database->delete("departmentcategories", [ "id" => $id ]);
    	logSystem("DepartmentCategory Deleted - ID: " . $id);
    	return "30";
    	}


}

?>
