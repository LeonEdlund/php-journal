<?php
session_unset();
session_destroy();
header('location: ?route=posts');
die();
