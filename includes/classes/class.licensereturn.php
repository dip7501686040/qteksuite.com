<?php

class Licensereturn extends App {


    public static function add($data) {
        //print_r($data);die('__pratik');
    	global $database;
        
        //print_r($assetsid);die();
        $users = getTable("people");
    	$lastid = $database->insert("licensereturn", [
    		"license_number" => $data['license_number'],
    		"license_category" => $data['license_category'],
    		"employee_name" => $data['employee_name'],
    		"department" => $data['department'],
    		"project_name" => $data['project_name'],
    		"manager_name" => $data['manager_name'],
    		"approval_name" => $data['approval_name'],
    		"comments" => $data['comments'],
    		"checkin_date" => $data['checkin_date'],
    		"checkout_date" => $data['checkout_date'],
    		"status" => $data['status']
    		
    	]);
    	if ($lastid == "0") { return "11"; } else { logSystem("License Return Added - ID: " . $lastid); return "10"; }
    }


    public static function addApi($data) {
        global $database;


        $customfields = getTable("assets_customfields");
        $customfieldsdata = array();

        foreach ($customfields as $customfield) {
            $customfieldsdata[$customfield['id']] = $data[$customfield['id']];
        }

        $lastid = $database->insert("licensereturn", [
    		"license_number" => $data['license_number'],
    		"license_category" => $data['license_category'],
    		"employee_name" => $data['employee_name'],
    		"department" => $data['department'],
    		"project_name" => $data['project_name'],
    		"manager_name" => $data['manager_name'],
    		"approval_name" => $data['approval_name'],
    		"comments" => $data['comments'],
    		"checkin_date" => $data['checkin_date'],
    		"checkout_date" => $data['checkout_date'],
    		"status" => $data['status']
    		
    	]);
        if ($lastid == "0") { return "11"; } else { logSystem("Asset Added - ID: " . $lastid); return "10"; }
    }

    public static function edit($data) {
    	global $database;
        //print_r($data);die();
        
    	$database->update("licensereturn", [
                "license_number" => $data['license_number'],
    		"license_category" => $data['license_category'],
    		"employee_name" => $data['employee_name'],
    		"department" => $data['department'],
    		"project_name" => $data['project_name'],
    		"manager_name" => $data['manager_name'],
    		"approval_name" => $data['approval_name'],
    		"comments" => $data['comments'],
    		"checkin_date" => $data['checkin_date'],
    		"checkout_date" => $data['checkout_date'],
    		"status" => $data['status']
    	], [ "id" => $data['id'] ]);
    	logSystem("License Return Edited - ID: " . $data['id']);
    	return "20";
    }



    public static function editApi($data) {
    	global $database;
        $customfields = getTable("assets_customfields");
        $customfieldsdata = array();

        foreach ($customfields as $customfield) {
            $customfieldsdata[$customfield['id']] = $data[$customfield['id']];
        }
    	$database->update("licensereturn", [
                "license_number" => $data['license_number'],
    		"license_category" => $data['license_category'],
    		"employee_name" => $data['employee_name'],
    		"department" => $data['department'],
    		"project_name" => $data['project_name'],
    		"manager_name" => $data['manager_name'],
    		"approval_name" => $data['approval_name'],
    		"comments" => $data['comments'],
    		"checkin_date" => $data['checkin_date'],
    		"checkout_date" => $data['checkout_date'],
    		"status" => $data['status']
    	], [ "id" => $data['id'] ]);
    	logSystem("License Edited - ID: " . $data['id']);
    	return "20";
    }



    public static function delete($id) {
    	global $database;
        $database->delete("licensereturn", [ "id" => $id ]);
    	logSystem("License Return Deleted - ID: " . $id);
    	return "30";
    }

    public static function nextAssetTag() {
    	global $database;
        $max = $database->max("licensereturn", "id");
    	return $max+1;
    	}
    
}

?>
