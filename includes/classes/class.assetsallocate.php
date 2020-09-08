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
        
        $target_dir = $scriptpath . "uploads/assetsallocate/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        //echo $scriptpath;die();
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    	$lastid = $database->insert("assetsallocate", [
    		"userid" => $data['userid'],
    		"checkout_date" => dateDb($data['checkout_date']),
    		"checkin_date" => dateDb($data['checkin_date']),
    		"notes" => $data['notes'],
                "file" => "uploads/assetsallocate/".$_FILES["file"]["name"],
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
        
        $target_file_old = 0; 
        $target_file_old = $database->get("assetsallocate", "file", [ "id" => $data['id'] ]);
        if(!empty($_FILES["file"]["name"])){
                $target_dir = $scriptpath . "uploads/assetsallocate/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["file"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                        $target_file = "uploads/assetsallocate/".$_FILES["file"]["name"];
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }else{
                $target_file = $target_file_old;
            }
        
    	$database->update("assetsallocate", [
                "userid" => $userid,
                "manufacturer" => $manufacturerid,
    		"checkout_date" => dateDb($data['checkout_date']),
    		"checkin_date" => dateDb($data['checkin_date']),
    		"notes" => $data['notes'],
                "file" => $target_file,
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
