<?php

require_once "../../DAO/AlumnosDAO.php";

AlumnosDAO::delete($_GET["id"]);
header("Location: listar.php");
die();
