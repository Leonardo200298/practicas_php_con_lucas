<?php

if ((isset($_GET["valor1"])) && (isset($_GET["valor2"]))) {
    echo $_GET["valor1"] + $_GET["valor2"];
}
if ((isset($_GET["valorPro"])) && (isset($_GET["valorPro2"]))) {
    echo $_GET["valorPro"] * $_GET["valorPro2"];
}