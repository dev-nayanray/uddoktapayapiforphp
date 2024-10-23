<?php
require_once( 'functions.php' );

if ( isset( $_POST[ 'paynowbtn' ] ) ) {
    // Retrieve data from the form
    $full_name = isset( $_POST[ 'cname' ] ) ? $_POST[ 'cname' ] : '';
    $email = isset( $_POST[ 'cemail' ] ) ? $_POST[ 'cemail' ] : '';
    $amount = isset( $_POST[ 'cpayamount' ] ) ? $_POST[ 'cpayamount' ] : 0;
    $order_id = isset( $_POST[ 'corderID' ] ) ? $_POST[ 'corderID' ] : 0;
    $user_id = isset( $_POST[ 'cID' ] ) ? $_POST[ 'cID' ] : 0;
    // Assuming cID is the user ID

    // Call the pay_url function
    $payment_url = pay_url( $full_name, $email, $amount, $order_id, $user_id );
    header("location: $payment_url");

    // Display the payment link
    echo 'IF do not redirect to payment please click <a href="'.htmlspecialchars( $payment_url ).'">Pay Now '.$amount.'</a>';
}
?>
