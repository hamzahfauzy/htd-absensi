<?php

$conn  = conn();
$db    = new Database($conn);

$serial_number = $_GET['serial_number'];
$code = $_GET['code'];

$device = $db->single('devices',['serial_number' => $serial_number]);
$subject = $db->single('subjects',['presence_code'=>$code]);

$time = date('H:i');
$db->query = "SELECT * FROM schedules WHERE TIME(time_start) <= TIME('$time') AND TIME(time_end) >= TIME('$time')";
$schedule = $db->exec('single');

$db->insert('presences',[
    'presence_code' => $code,
    'subject_id'    => $subject->id,
    'device_id'     => $device->id,
    'schedule_id'   => $schedule ? $schedule->id : 0
]);

echo iot_response('success');
die();