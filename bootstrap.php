<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/config/db.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/helpers/Connection.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Category.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Product.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/User.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Basket.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Order.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Section.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Stone.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/app/models/Material.php";
