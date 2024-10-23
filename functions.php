<?php
$baseURL = 'https://sandbox.uddoktapay.com/';
$apiKEY = '982d381360a69d419689740d9f2e26ce36fb7a50';

function pay_url( $full_name = '', $email = '', $amount = 0, $order_id = 0, $user_id = 0 ) {
    global $baseURL;
    global $apiKEY;

    $fields = [
        'full_name' => $full_name,
        'email' => $email,
        'amount' => $amount,
        'metadata' => [
            'user_id' => $user_id,
            'order_id' => $order_id
        ],
        'redirect_url' => 'http://localhost/payment-method-test/success.php', //invoice link here if you want invoice page
        'return_type' => 'GET',
        'cancel_url' => 'http://localhost/payment-method-test/failed.php', //you can use here payments.php page
        'webhook_url' => 'https://payment.youthit.net/'
    ];

    $curl = curl_init();

    curl_setopt_array( $curl, [
        CURLOPT_URL => $baseURL . 'api/checkout-v2',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode( $fields ),
        CURLOPT_HTTPHEADER => [
            'RT-UDDOKTAPAY-API-KEY: ' . $apiKEY,
            'accept: application/json',
            'content-type: application/json'
        ],
    ] );

    $response = curl_exec( $curl );
    $err = curl_error( $curl );
    curl_close( $curl );

    if ( $err ) {
        return 'cURL Error #:' . $err;
    } else {
        $responseData = json_decode( $response, true );
        // Decode the JSON response
        return isset( $responseData[ 'payment_url' ] ) ? $responseData[ 'payment_url' ] : '#';
    }
}

// this function for check invoice data

function pay_status( $invoice_id = '' ) {
    global $baseURL;
    global $apiKEY;

    $fields = [
        'invoice_id'     => "$invoice_id"
    ];

    $curl = curl_init();

    curl_setopt_array( $curl, [
        CURLOPT_URL => $baseURL . 'api/verify-payment',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode( $fields ),
        CURLOPT_HTTPHEADER => [
            'RT-UDDOKTAPAY-API-KEY: ' . $apiKEY,
            'accept: application/json',
            'content-type: application/json'
        ],
    ] );

    $response = curl_exec( $curl );
    $err = curl_error( $curl );

    curl_close( $curl );

    // var_dump( $response );
    // var_dump( $response[ 'invoice_id' ] );

    if ( $err ) {
        return 'Payment error please try again.  #:' . $err;
    } else {
        return $response;
    }

}

?>
