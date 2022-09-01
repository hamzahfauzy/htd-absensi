<?php

return [
    'dashboard' => 'default/index',
    'jadwal'    => 'crud/index?table=schedules',
    'subjek'    => 'crud/index?table=subjects',
    'perangkat' => 'crud/index?table=devices',
    'kehadiran' => 'crud/index?table=presences',
    'pengguna'  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];