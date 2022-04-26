<?php
  require_once "../functions.php";

  // end all sessions
  session_destroy();

  redirect_to("/index.php");