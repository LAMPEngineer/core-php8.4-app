<?php

namespace Controllers\Sessions;

// log the user out
logout();

header('location: /');
exit();