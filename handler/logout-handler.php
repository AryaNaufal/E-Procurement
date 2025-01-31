<?php
require_once __DIR__ . '/../#include/config.php';
session_start();
session_destroy();
header("Location: " . SERVER_NAME);
