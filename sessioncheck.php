<?php

session_start();
// Checks if seesion variable is set or not.
if (!isset($_SESSION['email'])) {
  header('location:/login');
}

