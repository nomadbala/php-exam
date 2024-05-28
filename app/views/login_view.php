<link rel="stylesheet" href="app/css/header.css">
<link rel="stylesheet" href="app/css/authorization.css">
<link rel="stylesheet" href="app/css/footer.css">

<?php include "app/templates/empty_header.php"; ?>


<main>
    <form action="http://localhost:8080/itstep/exam/app/api/methods/loginUser.php" method="post" id="mainForm"
        name="mainForm">
        <input type="text" name="login" id="login" placeholder="Enter your login" required>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <button id="register_btn" type="submit">Login</button>
    </form>
</main>

<?php include "app/templates/footer_template.php"; ?>

<script src="app/js/login.js"></script>