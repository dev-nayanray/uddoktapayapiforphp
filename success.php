<?php
include 'functions.php';
$response = [];

if ( isset( $_GET[ 'invoice_id' ] ) ) {
    $response = pay_status( $_GET[ 'invoice_id' ] ?? '' );
}

// Decode the JSON string
$json = $json = json_decode( $response, true );

// Extracting metadata for user_id and order_id
$user_id = $json[ 'metadata' ][ 'user_id' ];
$order_id = $json[ 'metadata' ][ 'order_id' ];

?>

<h2>Personal Information:</h2>
<table width = '400' border = '1'>
<tr>
<td>Invoice ID </td>
<td><?php echo $json[ 'invoice_id' ];
?></td>
</tr>
<tr>
<td>User ID: </td>
<td><?php echo $user_id;
?></td>
</tr>
<tr>
<td>Name: </td>
<td><?php echo $json[ 'full_name' ];
?></td>
</tr>
<tr>
<td>Email: </td>
<td><?php echo $json[ 'email' ];
?></td>
</tr>
</table>

<h2>Payment Information:</h2>
<table width = '400' border = '1'>
<tr>
<td>Status: </td>
<td><?php echo $json[ 'status' ];
?></td>
</tr>
<tr>
<td>Payment Method: </td>
<td><?php echo $json[ 'payment_method' ];
?> </td>
</tr>
<tr>
<td>Order ID: </td>
<td><?php echo $order_id;
?></td>
</tr>
<tr>
<td>Date: </td>
<td><?php echo $json[ 'date' ];
?></td>
</tr>
<tr>
<td>Amount: </td>
<td><?php echo $json[ 'amount' ];
?></td>
</tr>
<tr>
<td>Sender Number: </td>
<td><?php echo $json[ 'sender_number' ];
?></td>
</tr>
<tr>
<td>Transaction ID: </td>
<td><?php echo $json[ 'transaction_id' ];
?></td>
</tr>
<tr>
<td>Fees: </td>
<td><?php echo $json[ 'fee' ];
?></td>
</tr>
<tr>
<td>Total Charge: </td>
<td><?php echo $json[ 'charged_amount' ];
?></td>
</tr>
</table>

<a href = 'payment.php'>Go to pay</a>