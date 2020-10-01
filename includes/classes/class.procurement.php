<?php
class Procurement extends App
{
    public static function add($data)
    {
        global $database;
        $lastid = $database->insert("procurements", [
            "purchase_order_number" => $data['purchase_order_number'],
            "manufacture" => $data['manufacture'],
            "purchase_qty" => $data['purchase_qty'],
            "invoice_number" => $data['invoice_number'],
            "effective_end_date" => $data['effective_end_date'],
            "amount" => $data['amount'],
            "cost_center" => $data['cost_center'],
            "status" => $data['status'],
            "vendor" => $data['vendor'],
            "category" => $data['category'],
            "suplier_name" => $data['suplier_name'],
            "ownner_name" => $data['ownner_name'],
            "bussiness_name" => $data['bussiness_name'],
            "application_name" => $data['application_name'],
            "partno_sku" => $data['partno_sku'],
            "contract_agreement" => $data['contract_agreement'],
            "effective_start_date" => $data['effective_start_date'],
            "purchase_type" => $data['purchase_type'],
            "project_id" => $data['project_id'],
            "location" => $data['location'],
            "email_notification_180" => $data['email_notification_180'],
            "email_notification_90" => $data['email_notification_90'],
            "email_notification_60" => $data['email_notification_60'],
            "email_notification_30" => $data['email_notification_30'],
            "notes" => $data['notes']
        ]);
        if ($lastid == "0") {
            return "11";
        } else {
            logSystem("Procurement Added - ID: " . $lastid);
            return "10";
        }
    }

    public static function procurementLicenseAssignment($data)
    {
        global $database;

        $lastid = $database->insert("procurements_licenses", [
            "procurement_id" => $data['procurementid'],
            "license_id" => $data['licenseid'],
            "date" => $data['date']
        ]);
        if ($lastid == "0") {
            return "11";
        } else {
            logSystem("License assigned to procurement - ID: " . $lastid);
            return "10";
        }
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
                if ($files["doc_files"]["size"][$key] > 500000) {
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
                        $database->insert("procurement_files", [
                            "procurement_id" => $data['procurement_id'],
                            "file_name" => $files['doc_files']['name'][$key]
                        ]);
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        }
    }
    public static function edit($data){
        global $database;
        $database->update("procurements", [
            "purchase_order_number" => $data['purchase_order_number'],
            "manufacture" => $data['manufacture'],
            "purchase_qty" => $data['purchase_qty'],
            "invoice_number" => $data['invoice_number'],
            "effective_end_date" => $data['effective_end_date'],
            "amount" => $data['amount'],
            "cost_center" => $data['cost_center'],
            "status" => $data['status'],
            "vendor" => $data['vendor'],
            "category" => $data['category'],
            "suplier_name" => $data['suplier_name'],
            "ownner_name" => $data['ownner_name'],
            "bussiness_name" => $data['bussiness_name'],
            "application_name" => $data['application_name'],
            "partno_sku" => $data['partno_sku'],
            "contract_agreement" => $data['contract_agreement'],
            "effective_start_date" => $data['effective_start_date'],
            "purchase_type" => $data['purchase_type'],
            "project_id" => $data['project_id'],
            "location" => $data['location'],
            "email_notification_180" => $data['email_notification_180'],
            "email_notification_90" => $data['email_notification_90'],
            "email_notification_60" => $data['email_notification_60'],
            "email_notification_30" => $data['email_notification_30'],
            "notes" => $data['notes']

        ], ["id" => $data['procurement_id']]);
        logSystem("Procurement Edited - ID: " . $data['procurement_id']);
        return "20";
    }
}
