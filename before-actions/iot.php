<?php

if(!isset($_GET['serial_number']))
{
    echo iot_response('Unauthorized');
    return false;
}

if(!isset($_GET['code']))
{
    echo iot_response('Unauthorized');
    return false;
}

$conn  = conn();
$db    = new Database($conn);

$serial_number = $_GET['serial_number'];
$device = $db->single('devices',['serial_number' => $serial_number]);

if(!$device)
{
    echo iot_response('Unauthorized');
    return false;
}

$code = $_GET['code'];
$subject = $db->single('subjects',['presence_code'=>$code]);

if(!$subject)
{
    echo iot_response('Unauthorized');
    return false;
}

return true;
