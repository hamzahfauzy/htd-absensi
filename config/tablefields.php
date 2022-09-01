<?php

return [
    'schedules' => [
        'name' => [
            'label' => 'Nama Jadwal',
            'type'  => 'text'
        ],
        'time_start' => [
            'label' => 'Waktu Mulai',
            'type'  => 'time'
        ],
        'time_end' => [
            'label' => 'Waktu Selesai',
            'type'  => 'time'
        ],
    ],
    'devices' => [
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
        'description' => [
            'label' => 'Deskripsi',
            'type'  => 'textarea'
        ],
        'serial_number' => [
            'label' => 'No. Serial',
            'type'  => 'text'
        ]
    ],
    'subjects' => [
        'presence_code' => [
            'label' => 'Kode Absen',
            'type'  => 'text'
        ],
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
        'address' => [
            'label' => 'Alamat',
            'type'  => 'textarea'
        ],
        'gender' => [
            'label' => 'Jenis Kelamin',
            'type'  => 'options:Laki-laki|Perempuan'
        ],
        'phone' => [
            'label' => 'No. HP',
            'type'  => 'tel'
        ],
    ],
    'presences' => [
        'presence_code' => [
            'label' => 'Kode Absen',
            'type'  => 'text'
        ],
        'subject_id' => [
            'label' => 'Subjek',
            'type'  => 'options-obj:subjects,id,name'
        ],
        'device_id' => [
            'label' => 'Perangkat',
            'type'  => 'options-obj:devices,id,name'
        ],
        'schedule_id' => [
            'label' => 'Jadwal',
            'type'  => 'options-obj:schedules,id,name'
        ],
        'created_at' => [
            'label' => 'Tanggal',
            'type'  => 'datetime-local'
        ],
    ]
];