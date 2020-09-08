<?php

class Manager extends App {

    // ----------------------------------------------------------------------------------------------
    // CATEGORIES

    public static function addManagerCategory($data) {
    	global $database;
        if(!isset($data['color'])) $data['color'] = "#167cc1";
    	$lastid = $database->insert("managercategories", [ "name" => $data['name'], "color" => $data['color'] ]);
    	if ($lastid == "0") { return "11"; } else { logSystem("ManagerCategory Added - ID: " . $lastid); return "10"; }
    	}

    public static function editManagerCategory($data) {
    	global $database;
        if(!isset($data['color'])) $data['color'] = "#167cc1";
    	$database->update("managercategories", [ "name" => $data['name'], "color" => $data['color'] ], [ "id" => $data['id'] ]);
    	logSystem("ManagerCategory Edited - ID: " . $data['id']);
    	return "20";
    	}

    public static function deleteManagerCategory($id) {
    	global $database;
        $database->delete("managercategories", [ "id" => $id ]);
    	logSystem("ManagerCategory Deleted - ID: " . $id);
    	return "30";
    	}


}

?>
