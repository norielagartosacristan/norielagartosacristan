<?php
class CJDropshippingModel {
    private $apiKey;

    public function __construct() {
        $this->apiKey = 'f7d22ba1b5ce4659af1f408336ae7734';
    }

    // Function to get product list from CJ
    public function getProducts() {
        $apiUrl = 'https://cjdropshipping.com/my.html#/authorize/API';
        $params = [
            'page' => 1,
            'pageSize' => 20,
            'token' => $this->apiKey
        ];
        $query = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl . '?' . $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    // Function to place an order
    public function submitOrder($orderData) {
        $apiUrl = 'https://api.cjdropshipping.com/api/order/add';
        $orderData['apiKey'] = $this->apiKey;
        $jsonData = json_encode($orderData);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }
}
