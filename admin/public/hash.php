<?php

$password = "admin123";

echo password_hash($password, PASSWORD_DEFAULT);
//echo password_hash("admin123", PASSWORD_DEFAULT);