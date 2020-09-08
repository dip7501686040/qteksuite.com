<?php

class Assetsallocate extends App {


    public static function add($data) {
        //print_r($data);die('__pratik');
    	global $database;
        
        $manufacturerid = 0;
        
        if(isset($data['manufacturer'])) {
            $manufacturerid = $database->get("manufacturers", "id", [ "name" => $data['manufacturer'] ]);
            if($manufacturerid == "") $manufacturerid = $database->insert("manufacturers", [ "name" => $data['manufacturer'] ]);
        }

        $users = getTable("people");

    	$lastid = $database->insert("assetsallocate", [
    		"userid" => $data['userid'],
    		"checkout_date" => dateDb($data['checkout_date']),
    		"checkin_date" => dateDb($data['checkin_date']),
    		"notes" => $data['notes'],
    		"manufacturer" => $manufacturerid,
    	]);
    	if ($lastid == "0") { return "11"; } else { logSystem("Asset Allocate Added - ID: " . $lastid); return "10"; }
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
        $categoryid = 0;
        $userid = 0;
        $manufacturerid = 0;
        
        if(isset($data['manufacturer'])) {
            $manufacturerid = $database->get("manufacturers", "id", [ "name" => $data['manufacturer'] ]);
            if($manufacturerid == "") $manufacturerid = $database->insert("manufacturers", [ "name" => $data['manufacturer'] ]);
        }
        
        if(isset($data['userid'])) {
            $userid = $database->get("people", "id", [ "name" => $data['userid'] ]);
            //if($userid == "") $userid = $database->insert("manufacturers", [ "name" => $data['manufacturer'] ]);
            
        }
        
    	$database->update("assetsallocate", [
                "userid" => $userid,
                "manufacturer" => $manufacturerid,
    		"checkout_date" => dateDb($data['checkout_date']),
    		"checkin_date" => dateDb($data['checkin_date']),
    		"notes" => $data['notes'],
    	], [ "id" => $data['id'] ]);
    	logSystem("Assets allocate Edited - ID: " . $data['id']);
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
        $database->delete("assetsallocate", [ "id" => $id ]);
    	logSystem("Asset Allocate Deleted - ID: " . $id);
    	return "30";
    }

    public static function nextAssetTag() {
    	global $database;
        $max = $database->max("assetsallocate", "id");
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

    public static function unassignLicense($id) { //unassign license to asset
    	global $database;
        $database->delete("licenses_assets", [ "id" => $id ]);
    	return "30";
    }
}


?>
