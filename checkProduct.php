<!-- <php

$request = "SELECT id,productPath,productName , productPrice FROM theproduct WHERE productName =:productName";

$stmt = $this->_dbh->prepare($request);

$stmt->bindParam(":productName", $productName);
$stmt->execute();

$Results = $stmt->fetchAll(PDO::FETCH_OBJ);

error_log(print_r($Results, true));


if ($stmt->rowCount() > 0) {

    echo "trouve";

//     $searchResults = [];

//     foreach ($Results as $Result) {

//         $obj = new products;

//         $obj->setProductId($Result->id);
//         $obj->setProductName($Result->productName);
//         $obj->setProductPath($Result->productPath);
//         $obj->setPrice($Result->productPrice);
//         // $obj->setDescription($Result->Description);
//         // $obj->setStatus($Result->status);

//         $searchResults[] = $obj;
//     }

//     return $searchResults;
} -->
