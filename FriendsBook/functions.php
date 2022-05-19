<?php
  session_start();

  function db_connect() {
    
    if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
      echo 'We don\'t have mysqli!!!';
  } else {
      echo 'Phew we have it!';
  }
    global $conn; 
    $db_server = "localhost:8011";
    $username = "root";
    $password = "";
    $db_name = "facebook";

    $conn = new mysqli($db_server, $username, $password, $db_name);
    
    if ($conn->connect_error) {
      die("Error: " . $conn->connect_error);
    }
  }

  function redirect_to($url) {
    header("Location: " . $url);
    exit();
  }

  function is_auth() {
    return isset($_SESSION['user_id']);
  }

  function check_auth() {
    if(!is_auth()) {
      redirect_to("/index.php?logged_in=false");
    }
  }