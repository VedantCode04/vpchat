<?php
session_start();
include_once "config.php";
require_once "encrypt.php";
$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($uname) && !empty($email) && !empty($password)) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                  echo "This email already exist!, try another one";
            } else {
                  if (isset($_FILES['profile'])) {
                        $imgName = $_FILES['profile']['name'];
                        $imgType = $_FILES['profile']['type'];
                        $tmpName = $_FILES['profile']['tmp_name'];

                        $imgExplode = explode('.', $imgName);
                        $imgExt = end($imgExplode);

                        $extensions = ["jpeg", "png", "jpg"];
                        if (in_array($imgExt, $extensions) === true) {
                              $types = ["image/jpeg", "image/jpg", "image/png"];
                              if (in_array($imgType, $types) === true) {
                                    $time = time();
                                    $new_img_name = $time . $imgName;

                                    $dir = "images/".$new_img_name;

                                    $move = move_uploaded_file($tmpName, $dir);
                                    if ($move) {
                                          $ran_id = rand(time(), 100000000);
                                          $status = "Active";

                                          //encryption
                                          $encrypt_pass = encrypt($password);
                                          $email = encrypt($email);
                                          $uname = encrypt($uname);


                                          $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, uname, email, password, image, status)
                                VALUES ( {$ran_id}, '{$uname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                                          if ($insert_query) {
                                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                                if (mysqli_num_rows($select_sql2) > 0) {
                                                      $result = mysqli_fetch_assoc($select_sql2);
                                                      $_SESSION['unique_id'] = $result['unique_id'];
                                                      echo "success";
                                                } else {
                                                      echo "This email address not Exist!";
                                                }
                                          } else {
                                                echo "Error!! Try again";
                                          }
                                    }
                              } else {
                                    echo "Upload image (jpg, jpeg, png) 3";
                              }
                        } else {
                              echo "Upload image (jpg, jpeg, png) 1";
                        }
                  }
            }
      } else {
            echo "enter valid email";
      }
} else {
      echo "enter every details please";
}
