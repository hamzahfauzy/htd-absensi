<?php

$user = auth()->user;
if(get_role($user->id)->name == 'user')
{
    $subject = $db->single('subjects',['user_id'=>$user->id]);
    if($where)
    {
        $where .= ' AND ';
    }
    $where .= " subject_id=$subject->id";
}

$data  = $db->all($table,$where,[
    $columns[$order[0]['column']] => $order[0]['dir']
]);
$total = $db->exists($table,$where,[
    $columns[$order[0]['column']] => $order[0]['dir']
]);

return compact('data','total');