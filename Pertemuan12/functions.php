<?php

define("DEVELOPMENT", TRUE);
function dbConnect()
{
    $db = new mysqli("localhost", "root", "", "dbatol");
    return $db;
}
