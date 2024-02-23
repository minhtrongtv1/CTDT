<?php

$relative_user_id = $record['User']['id'];
$relative_user_name = $record['User']['name'];
echo json_encode(array('relative_user_id' => $relative_user_id, 'relative_user_name' => $relative_user_name));
