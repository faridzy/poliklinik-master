<?php

/**
 * @Author: ELL
 * @Date:   2018-01-17 00:38:48
 * @Last Modified by:   ELL
 * @Last Modified time: 2018-01-17 00:48:58
 */
session_start();

session_destroy();
session_unset();
header('location:login.php?alert=2');
