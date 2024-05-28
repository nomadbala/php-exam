<link rel="stylesheet" href="app/css/header.css">
<link rel="stylesheet" href="app/css/payment.css">
<link rel="stylesheet" href="app/css/footer.css">

<?php include "app/templates/empty_header.php"; ?>

<main>
    <form action="http://localhost:8080/itstep/exam/app/api/methods/addSubscription.php" method="post" id="mainForm"
        name="mainForm">
        <input type="text" name="cardNumber" id="cardNumber" placeholder="Enter number of your card" maxlength="16">
        <input type="text" name="period" id="period" placeholder="Enter your date until" maxlength="5">
        <input type="text" name="cvv" id="cvv" placeholder="Enter your CVV" maxlength="3">
        <button type="submit" id="submitBtn">Pay</button>
    </form>
</main>

<?php include "app/templates/footer_template.php"; ?>

<script src="app/js/payment.js"></script>