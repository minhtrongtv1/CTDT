<?php
$results = array();
$count = $this->Paginator->param('count');
$results['total_count'] = $count;
foreach ($users as $user) {
    $results['items'][] = array(
        'id' => $user['User']['id'], 
        'avatar' => $user['User']['avatar'], 
        'name' => $user['User']['name'], 
        'department' => ((empty($user['Department']['name']))?"":$user['Department']['name']));
}
echo json_encode($results);