<?php
session_start();
include_once "php/config.php";
require_once "php/decrypt.php";

if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}

$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);

    $email = decrypt($row['email']);
    $uname = decrypt($row['uname']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>verify</title>
    <link rel="stylesheet" href="css/register.css" />
    <base href="/vp-chat/">
</head>

<body>
    <div class="verify" style="color: green;">
        <div class="reg" style="color: green;">
            <p>OTP</p>
        </div>
        <div class="form">
            <form action="#" class="register-form" id="regForm" enctype="multipart/form-data" method="POST">
                <!-- error message  -->
                <div class="error" style="color: green;">
                    OTP sent to <?php echo $email; ?>
                </div>
                <input type="tel" placeholder="enter OTP" name="otp" required id="otp" />
                <br />
                <input type="submit" value="Submit" class="button" />

            </form>
        </div>
    </div>
    </div>

    <script>
        let form = document.querySelector("form");
        submitbtn = form.querySelector("input.button");
        form.onsubmit = (e) => {
            e.preventDefault();
        };


        uname = "<?php echo $uname ?>"
        mail = "<?php echo $email ?>";
        otp_sent = Math.floor(100000 + Math.random() * 900000);

        Email.send({
            SecureToken: "86e6f1c6-e78c-41d1-81c5-a9857e820582",
            To: mail,
            From: "patprp9@gmail.com",
            Subject: "OTP to register in VPCHAT",
            Body: `Hello ${uname}, your OTP for logging in vpchat is ${otp_sent}`
        }).then(
            message => alert("OTP sent")
        )

        var count = 2;
        submitbtn.onclick = () => {
            user_otp = form.querySelector("input[name='otp']");
            console.log(user_otp.value)
            if (user_otp.value == otp_sent) {
                location.href = "user.php";
            } else {
                user_otp.value = "";
                alert(`wrong OTP. Please try again`);
            }
        }
    </script>
</body>

</html>