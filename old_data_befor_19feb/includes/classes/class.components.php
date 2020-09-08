<?php

class Components extends App {


    public static function add($data) {
    	global $database;
        global $scriptpath;
        
        //die();
        $categoryid = 0;
        $manufactureid = 0;
        $modelid = 0;
        $supplierid = 0;
        $locationid = 0;

        if(isset($data['category'])) {
            $categoryid = $database->get("assetcategories", "id", ["name" => $data['category'] ]);
            if($categoryid == "") $categoryid = $database->insert("assetcategories", [ "name" => $data['category'], "color" => rand_color() ]);
        }
        
            $target_dir = $scriptpath . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR ."components";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["image"]["tmp_name"]);
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
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        
        
    	$lastid = $database->insert("components", [
                "company_name" => $data['company_name'],
                "consumables_name" => $data['consumables_name'],
                "category" => $categoryid,
                "manufacture" => $data['manufacture'],
                "location" => $data['location'],
                "model_no" => $data['model_no'],
                "item_no" => $data['item_no'],
                "order_no" => $data['order_no'],
                "purchase_date" => $data['purchase_date'],
                "purchase_cost" => $data['purchase_cost'],
                "currency" => $data['currency'],
                "statusid" => $data['statusid'],
                "quanitity" => $data['quanitity'],
                "image" => $target_file,

    	]);
    	if ($lastid == "0") { return "11"; } else { logSystem("Component Added - ID: " . $lastid); return "10"; }
    }


    public static function addApi($data) {
        global $database;


        $customfields = getTable("assets_customfields");
        $customfieldsdata = array();

        foreach ($customfields as $customfield) {
            $customfieldsdata[$customfield['id']] = $data[$customfield['id']];
        }

        $lastid = $database->insert("components", [
            "categoryid" => $data['categoryid'],
            "adminid" => $data['adminid'],
            "clientid" => $data['clientid'],
            "userid" => $data['userid'],
            "manufactureid" => $data['manufactureid'],
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
        $companyid = 0;
        $currencyid = 0;
        $manufactureid = 0;
        $modelid = 0;
        $supplierid = 0;
        $locationid = 0;
        $statusid = 0;
        $target_file_old = 0; 
        $target_file_old = $database->get("components", "image", [ "id" => $data['id'] ]);

        if(isset($data['company_name'])) {
            $companyid = $database->get("company", "id", [ "company_name" => $data['company_name'] ]);
            if($companyid == "") $companyid = $database->insert("company", [ "company_name" => $data['company_name'] ]);
        }
        if(isset($data['category'])) {
            $categoryid = $database->get("assetcategories", "id", [ "name" => $data['category'] ]);
            if($categoryid == "") $categoryid = $database->insert("assetcategories", [ "name" => $data['category'], "color" => rand_color() ]);
        }

        if(isset($data['manufacture'])) {
            $manufactureid = $database->get("manufacturers", "id", [ "name" => $data['manufacture'] ]);
            if($manufactureid == "") $manufactureid = $database->insert("manufacturers", [ "name" => $data['manufacture'] ]);
        }

        if(isset($data['model_no'])) {
            $modelid = $database->get("models", "id", [ "name" => $data['model_no'] ]);
            if($modelid == "") $modelid = $database->insert("models", [ "name" => $data['model'] ]);
        }

        if(isset($data['currency'])) {
            $currencyid = $database->get("currency", "id", [ "currency_name" => $data['currency'] ]);
            if($currencyid == "") $currencyid = $database->insert("currency", [ "currency_name" => $data['currency'] ]);
        }

            if(!empty($_FILES["image"]["name"])){
                $target_dir = $scriptpath . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR ."components";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
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
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }else{
                $target_file = $target_file_old;
            }

    	$database->update("components", [
                "company_name" => $companyid,
                "consumables_name" => $data['consumables_name'],
                "category" => $categoryid,
                "manufacture" => $manufactureid,
                "location" => $data['location'],
                "model_no" => $modelid,
                "item_no" => $data['item_no'],
                "order_no" => $data['order_no'],
                "purchase_date" => $data['purchase_date'],
                "purchase_cost" => $data['purchase_cost'],
                "currency" => $currencyid,
                "image" => $target_file,
                "statusid" => $data['statusid']

    	], [ "id" => $data['id'] ]);
    	logSystem("Components Edited - ID: " . $data['id']);
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
            "manufactureid" => $data['manufactureid'],
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
        $database->delete("components", [ "id" => $id ]);
    	logSystem("Components Deleted - ID: " . $id);
    	return "30";
    }

    public static function nextAssetTag() {
    	global $database;
        $max = $database->max("assets", "id");
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
