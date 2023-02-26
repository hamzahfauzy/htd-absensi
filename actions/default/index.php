<?php

Page::set_title('Dashboard');
$conn = conn();
$db   = new Database($conn);

$data = [
    'subjects' => $db->exists('subjects'),
    'devices' => $db->exists('devices'),
    'presences' => $db->exists('presences'),
];

return $data;