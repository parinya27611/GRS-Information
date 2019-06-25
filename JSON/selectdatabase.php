<?php
include_once("connect.php");
$arrJSON=array();
$Json=array();
$sql = "SELECT * FROM tb_owner ";
$result = $conn->query($sql);

 while($row = $result->fetch_assoc()) {
        $arrJSON ["ID OWNER= "] = $row["id_owner"];
        $arrJSON ["FIRST NAME = "] = $row["ow_fname"];
        $arrJSON ["LAST NAME = "] = $row["ow_lname"];
        $arrJSON ["ID CARD = "] = $row["ow_idcard"];
        $arrJSON ["SHOP NAME = "] = $row["ow_shopname"];
        $arrJSON ["SHOP TYPE = "] = $row["ow_type"];
        $arrJSON ["ADRESS = "] = $row["ow_address"];
        $arrJSON ["TIME OPEN = "] = $row["ow_open"];
        $arrJSON ["TIME CLOSE = "] = $row["ow_close"];
        $arrJSON ["PHONE = "] = $row["ow_phone"];
        array_push($Json,$arrJSON); 
    }
$conn->close();
echo json_encode($Json);
?>