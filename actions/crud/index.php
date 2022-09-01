<?php

$table = $_GET['table'];
Page::set_title(_ucwords(__($table)));
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
$fields = config('fields')[$table];

if(file_exists('../actions/'.$table.'/override-index-fields.php'))
    $fields = require '../actions/'.$table.'/override-index-fields.php';

if(isset($_GET['draw']))
{
    $draw    = $_GET['draw'];
    $start   = $_GET['start'];
    $length  = $_GET['length'];
    $search  = $_GET['search']['value'];
    $order   = $_GET['order'];
    
    $columns = [];
    foreach($fields as $key => $field)
    {
        $columns[] = is_array($field) ? $key : $field;
    }

    // $order_by = " ORDER BY ".$columns[$order[0]['column']]." ".$order[0]['dir'];

    $where = "";

    if(!empty($search))
    {
        // $where = "WHERE (NIK LIKE '%$search%' OR no_kk LIKE '%$search%' OR nama LIKE '%$search%' OR alamat LIKE '%$search%')";
        $_where = [];
        foreach($columns as $col)
        {
            $_where[] = "$col LIKE '%$search%'";
        }

        $where = "(".implode(' OR ',$_where).")";
    }

    if(file_exists('../actions/'.$table.'/override-index.php'))
    {
        $override = require '../actions/'.$table.'/override-index.php';
        extract($override);
    }
    else
    {
        $data  = $db->all($table,$where,[
            $columns[$order[0]['column']] => $order[0]['dir']
        ]);
        $total = $db->exists($table,$where,[
            $columns[$order[0]['column']] => $order[0]['dir']
        ]);
    }

    $results = [];

    foreach($data as $key => $d)
    {
        $results[$key][] = $key+1;
        foreach($columns as $col)
        {
            $field = $fields[$col];
            $data_value = "";
            if(is_array($field))
            {
                $data_value = Form::getData($field['type'],$d->{$col},true);
                if($field['type'] == 'number')
                {
                    $data_value = number_format($data_value);
                }
            }
            else
            {
                $data_value = $d->{$field};
            }

            $results[$key][] = $data_value;
        }

        $action = '';
        if(is_allowed(get_route_path('crud/edit',['table'=>$table]),auth()->user->id)):
            $action .= '<a href="'.routeTo('crud/edit',['table'=>$table,'id'=>$d->id]).'" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>';
        endif;
        if(is_allowed(get_route_path('crud/delete',['table'=>$table]),auth()->user->id)):
            $action .= '<a href="'.routeTo('crud/delete',['table'=>$table,'id'=>$d->id]).'" onclick="if(confirm(\'apakah anda yakin akan menghapus data ini ?\')){return true}else{return false}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>';
        endif;
        $results[$key][] = $action;
    }

    echo json_encode([
        "draw" => $draw,
        "recordsTotal" => (int)$total,
        "recordsFiltered" => (int)$total,
        "data" => $results
    ]);

    die();
}

return [
    'table' => $table,
    'success_msg' => $success_msg,
    'fields' => $fields
];