<?php

class Assetsreturn extends App {


    public static function add($data) {
        //print_r($data);die('__pratik');
    	global $database;
        
        $assetsid = 0;
        $assetcategoriesid = 0;
        $employeeid = 0;
        $departmentcategories = 0;
        
        
//        print_r($assetsid);die();
        
        if(isset($data['assets_category'])) {
            $assetcategoriesid = $database->get("assetcategories", "id", [ "name" => $data['assets_category'] ]);
            if($assetcategoriesid == "") $assetcategoriesid = $database->insert("manufacturers", [ "name" => $data['assetcategories'] ]);
        }
        
        if(isset($data['employee_name'])) {
            $employeeid = $database->get("people", "id", [ "name" => $data['employee_name'] ]);
            if($employeeid == "") $employeeid = $database->insert("people", [ "name" => $data['employee_name'] ]);
        }
        
        if(isset($data['department'])) {
            $employeeid = $database->get("people", "id", [ "name" => $data['employee_name'] ]);
            if($employeeid == "") $employeeid = $database->insert("people", [ "name" => $data['department'] ]);
        }

        $users = getTable("people");

    	$lastid = $database->insert("assetsreturn", [
    		"assets_number" => $data['assets_number'],
    		"assets_category" => $data['assets_category'],
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
    	if ($lastid == "0") { return "11"; } else { logSystem("Asset Return Added - ID: " . $lastid); return "10"; }
    }


    public static function addApi($data) {
        global $database;


        $customfields = getTable("assets_customfields");
        $customfieldsdata = array();

        foreach ($customfields as $customfield) {
            $customfieldsdata[$customfield['id']] = $data[$customfield['id']];
        }

        $lastid = $database->insert("assets", [
            "categoryid" => $data['categoryid'],
            "adminid" => $data['adminid'],
            "clientid" => $data['clientid'],
            "userid" => $data['userid'],
            "manufacturerid" => $data['manufacturerid'],
            "modelid" => $data['modelid'],
            "supplierid" => $data['supplierid'],
            "statusid" => $data['statusid'],
            "purchase_date" => $data['purchase_date'],
            "warranty_months" => $data['warranty_months'],
            "tag" => $data['tag'],
            "name" => $data['name'],
            "serial" => $data['serial'],
            "notes" => $data['notes'],
            "locationid" => $data['locationid'],
            "customfields" => serialize($customfieldsdata),
            "qrvalue" => $data['qrvalue'],

        ]);
        if ($lastid == "0") { return "11"; } else { logSystem("Asset Added - ID: " . $lastid); return "10"; }
    }

    public static function edit($data) {
    	global $database;
        //print_r($data);die();
        
    	$database->update("assetsreturn", [
                "assets_number" => $data['assets_number'],
    		"assets_category" => $data['assets_category'],
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
    	logSystem("Assets Return Edited - ID: " . $data['id']);
    	return "20";
    }



    public static function editApi($data) {
    	global $database;


        $customfields = getTable("assets_customfields");
        $customfieldsdata = array();

        foreach ($customfields as $customfield) {
            $customfieldsdata[$customfield['id']] = $data[$customfield['id']];
        }

    	$database->update("assets", [
            "categoryid" => $data['categoryid'],
    		"adminid" => $data['adminid'],
    		"clientid" => $data['clientid'],
    		"userid" => $data['userid'],
                "manufacturerid" => $data['manufacturerid'],
    		"modelid" => $data['modelid'],
    		"supplierid" => $data['supplierid'],
    		"statusid" => $data['statusid'],
    		"purchase_date" => $data['purchase_date'],
    		"warranty_months" => $data['warranty_months'],
    		"tag" => $data['tag'],
    		"name" => $data['name'],
    		"serial" => $data['serial'],
    		"notes" => $data['notes'],
            "locationid" => $data['locationid'],
            "customfields" => serialize($customfieldsdata),
            "qrvalue" => $data['qrvalue'],

    	], [ "id" => $data['id'] ]);
    	logSystem("Asset Edited - ID: " . $data['id']);
    	return "20";
    }



    public static function delete($id) {
    	global $database;
        $database->delete("assetsreturn", [ "id" => $id ]);
    	logSystem("Asset Return Deleted - ID: " . $id);
    	return "30";
    }

    public static function nextAssetTag() {
    	global $database;
        $max = $database->max("assetsreturn", "id");
    	return $max+1;
    	}


    public static function assignLicense($data) { //assign license to asset
    	global $database;
    	$lastid = $database->insert("licenses_assets", [
    		"licenseid" => $data['licenseid'],
    		"assetid" => $data['assetid']
    	]);
    	if ($lastid == "0") { return "11"; } else { return "10"; }
    }

    
}


?>
