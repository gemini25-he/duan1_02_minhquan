<?php
include '../../models/pdo.php';
header("Content-type: application/json; charset=UTF-8");
http_response_code(200); // 200 - Everything will be 200 OK

if (!empty($_GET)) {
    $response = array();
    try {
        // Retrieve data from query parameters
        $partnerCode = $_GET["partnerCode"];
        $accessKey = $_GET["accessKey"];
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa'; // Use your actual secret key
        $orderId = $_GET["orderId"];
        $localMessage = $_GET["localMessage"];
        $message = $_GET["message"];
        $transId = $_GET["transId"];
        $orderInfo = $_GET["orderInfo"];
        $amount = $_GET["amount"];
        $errorCode = $_GET["errorCode"];
        $responseTime = $_GET["responseTime"];
        $requestId = $_GET["requestId"];
        $extraData = $_GET["extraData"];
        $payType = $_GET["payType"];
        $orderType = $_GET["orderType"];
        $m2signature = $_GET["signature"]; // MoMo signature

        // Checksum
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
            "&orderType=" . $orderType . "&transId=" . $transId . "&message=" . $message . "&localMessage=" . $localMessage . "&responseTime=" . $responseTime . "&errorCode=" . $errorCode .
            "&payType=" . $payType . "&extraData=" . $extraData;

        $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);

        if ($m2signature == $partnerSignature) {
            if ($errorCode == '0') {
                // Update payment status in the database
                $sql = "UPDATE don_hang SET trang_thai_thanh_toan = 'Đã thanh toán' WHERE ma_hoa_don = '$orderId'";
                // Use your pdo_execute or other database function to execute this query
                pdo_execute($sql);

                $response['message'] = "Payment success";
            } else {
                $response['message'] = $message;
            }
        } else {
            $response['message'] = "Invalid signature";
        }
    } catch (Exception $e) {
        $response['message'] = $e->getMessage();
    }

    echo json_encode($response);
}
?>
