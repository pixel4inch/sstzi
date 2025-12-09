<?php
// FORM SUBMISSION — PHP PART
if(isset($_POST['submit'])){
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];

    echo "<div style='padding:20px; background:#e8ffe8; border:1px solid #b6eab6; margin:20px; border-radius:10px;'>
            <h3>Form Submitted Successfully</h3>
            <p><b>Name:</b> $name</p>
            <p><b>Email:</b> $email</p>
            <p><b>Phone:</b> $phone</p>
            <p><b>Message:</b> $message</p>
          </div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Get In Touch</title>

<style>
body{
    font-family: Arial, sans-serif;
    background: #f4f4f4;
}
.form-box{
    background: #fff;
    width: 380px;
    margin: 40px auto;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}
.form-box h2{
    text-align: center;
    margin-bottom: 20px;
}
input, textarea{
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
}
button{
    width: 100%;
    padding: 12px;
    background: #b28a4e;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
}
button:hover{
    background: #8a6a3f;
}
</style>

</head>
<body>

<div class="form-box">
    <h2>Get In Touch</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Your Name" required>

        <input type="email" name="email" placeholder="Your Email" required>

        <input type="text" name="phone" placeholder="Phone Number" required>

        <textarea name="message" rows="4" placeholder="Message"></textarea>

        <button type="submit" name="submit">Submit</button>
    </form>
</div>

</body>
</html>
