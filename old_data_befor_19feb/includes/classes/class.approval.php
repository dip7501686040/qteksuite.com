<?php

class Approval extends App {

    // ----------------------------------------------------------------------------------------------
    // CATEGORIES

    public static function addApprovalCategory($data) {
    	global $database;
        if(!isset($data['color'])) $data['color'] = "#167cc1";
    	$lastid = $database->insert("approvalcategories", [ "name" => $data['name'], "color" => $data['color'] ]);
    	if ($lastid == "0") { return "11"; } else { logSystem("ApprovalCategory Added - ID: " . $lastid); return "10"; }
    	}

    public static function editApprovalCategory($data) {
    	global $database;
        if(!isset($data['color'])) $data['color'] = "#167cc1";
    	$database->update("approvalcategories", [ "name" => $data['name'], "color" => $data['color'] ], [ "id" => $data['id'] ]);
    	logSystem("ApprovalCategory Edited - ID: " . $data['id']);
    	return "20";
    	}

    public static function deleteApprovalCategory($id) {
    	global $database;
        $database->delete("approvalcategories", [ "id" => $id ]);
    	logSystem("ApprovalCategory Deleted - ID: " . $id);
    	return "30";
    	}


}

?>
