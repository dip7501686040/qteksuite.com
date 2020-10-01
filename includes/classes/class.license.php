<?php

class License extends App
{


    public static function add($data)
    {
        global $database;

        // $customfields = getTable("licenses_customfields");
        // $customfieldsdata = array();
        // foreach ($customfields as $customfield) {
        //     $customfieldsdata[$customfield['id']] = $data[$customfield['id']];
        // }


        $lastid = $database->insert("licenses", [
            "statusid" => $data['statusid'],
            "categoryid" => $data['categoriesid'],
            "supplierid" => $data['supplierid'],
            "edition" => $data['edition'],
            "version" => $data['version'],
            "application_name" => $data['application_name'],
            "serial" => encrypt_decrypt('encrypt', $data['serial']),
            "notes" => $data['notes'],
            "licenseid" => $data['licenseid'],
            "purchase_typeid" => $data['purchase_typeid'],
            "contract_num" => $data['contract_num'],
            "vendor_name" => $data['vendor_name'],
            "part_number" => $data['part_number'],
            "amount" => $data['amount'],
            "purchase_quantity" => $data['purchase_quantity'],
            "qunatity_per_unit" => $data['qunatity_per_unit'],
            "purchase_order_number" => $data['purchase_order_number'],
            "owner_name" => $data['owner_name'],
            "project_id" => $data['project_id'],
            "cost_center" => $data['cost_center'],
            "business_unit" => $data['business_unit'],
            "purchase_date" => $data['purchase_date'],
            "license_start_date" => $data['license_start_date'],
            "license_expiry_date" => $data['license_expiry_date'],
            "location" => $data['location']
        ]);
        if ($lastid == "0") {
            return "11";
        } else {
            logSystem("License Added - ID: " . $lastid);
            return "10";
        }
    }


    public static function edit($data)
    {
        global $database;
        $customfields = getTable("licenses_customfields");
        $customfieldsdata = array();

        foreach ($customfields as $customfield) {
            $customfieldsdata[$customfield['id']] = $data[$customfield['id']];
        }

        $database->update("licenses", [
            "status" => $data['status'],
            "category" => $data['category'],
            "suplier_name" => $data['suplier_name'],
            "edition" => $data['edition'],
            "version" => $data['version'],
            "application_name" => $data['application_name'],
            "serial" => encrypt_decrypt('encrypt', $data['serial']),
            "notes" => $data['notes'],
            "license_typeid" => $data['license_typeid'],
            "purchase_typeid" => $data['purchase_typeid'],
            "contract_num" => $data['contract_num'],
            "vendor_name" => $data['vendor_name'],
            "part_number" => $data['part_number'],
            "amount" => $data['amount'],
            "purchase_quantity" => $data['purchase_quantity'],
            "qunatity_per_unit" => $data['qunatity_per_unit'],
            "purchase_order_number" => $data['purchase_order_number'],
            "owner_name" => $data['owner_name'],
            "project_id" => $data['project_id'],
            "cost_center" => $data['cost_center'],
            "business_unit" => $data['business_unit'],
            "purchase_date" => $data['purchase_date'],
            "license_start_date" => $data['license_start_date'],
            "license_expiry_date" => $data['license_expiry_date'],
            "location" => $data['location']
        ], ["id" => $data['license_id']]);
        logSystem("License Edited - ID: " . $data['license_id']);
        return "20";
    }

    public static function delete($id)
    {
        global $database;
        $database->delete("licenses", ["id" => $id]);
        logSystem("License Deleted - ID: " . $id);
        return "30";
    }

    public static function nextLicenseTag()
    {
        global $database;
        $max = $database->max("licenses", "id");
        return $max + 1;
    }


    public static function addFile($data, $files)
    {
        global $database;
        if (!empty($files["doc_files"]["name"])) {
            foreach ($files["doc_files"]["name"] as $key => $value) {

                $target_dir = "uploads/assets/";
                $target_file = $target_dir . basename($files["doc_files"]["name"][$key]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check file size
                if ($files["doc_files"]["size"][$key] > 3000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {

                    echo "Sorry, your file was not uploaded.";

                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($files["doc_files"]["tmp_name"][$key], $target_file)) {
                        echo "The file " . basename($files["doc_files"]["name"][$key]) . " has been uploaded.";
                        $target_file = "/uploads/assets/" . $files["doc_files"]["name"][$key];
                        $database->insert("license_files", [
                            "license_id" => $data['license_id'],
                            "file_name" => $files['doc_files']['name'][$key]
                        ]);
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        }
    }


    public static function assignAsset($data)
    { //assign license to asset
        global $database;
        $lastid = $database->insert("licenses_assets", [
            "licenseid" => $data['licenseid'],
            "assetid" => $data['assetid']
        ]);
        if ($lastid == "0") {
            return "11";
        } else {
            return "10";
        }
    }

    public static function unassignAsset($id)
    { //unassign license to asset
        global $database;
        $database->delete("licenses_assets", ["id" => $id]);
        return "30";
    }


    public static function countUsedSeats($id)
    { //unassign license to asset
        global $database;
        return $database->count("licenses_assets", ["licenseid" => $id]);
    }

    public static function addFinance($data)
    {
        global $database;
        $lastid=$database->insert(
            "license_finance",
            ["license_id" => $data['license_id'],
            "amount" => $data['amount'],
            "currency" =>$data['currency'],
            "frequency" =>$data['frequency']
            ]
        );
        if ($lastid == "0") {
            return "11";
        } else {
            logSystem("License Finance Added - ID: " . $lastid);
            return "10";
        }
    }
}
