<?php

session_start();

// Cerramos la sesión:
session_unset();
session_destroy();

header("Location: ./login");
