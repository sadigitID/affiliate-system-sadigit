<?php

namespace Config;

use Login;

class Validation
{

    public $registration = [
        [
            'field' => 'nama_lengkap',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Nama harus diisi'
            ]

        ],
        [
            'field' => 'password',
            'rules' => 'required|trim|min_length[8]',
            'errors' => [
                'required' => 'Password harus diisi',
                'min_length' => 'Password minimal 8 karakter'
            ]
        ],
        [
            'field' => 'provinsi',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Provinsi harus diisi'
            ]
        ],
        [
            'field' => 'kabupaten',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Kabupaten/Kota harus diisi'
            ]
        ],
        [
            'field' => 'kecamatan',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Kecamatan harus diisi'
            ]
        ],
        [
            'field' => 'alamat_lengkap',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Alamat harus diisi'
            ]
        ],
        [
            'field' => 'email',
            'rules' => 'required|valid_email|trim',
            'errors' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email tidak valid'
            ]

        ],
        [
            'field' => 'no_hp',
            'rules' => 'required|trim|min_length[12]|max_length[13]',
            'errors' => [
                'required' => 'No HP harus diisi',
                'min_length' => 'No HP minimal 12 karakter',
                'max_length' => 'No HP maksimal 13 karakter'
            ]
        ],
        [
            'field' => 'link_tiktok',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Link TikTok harus diisi',
            ]
        ],
        [
            'field' => 'link_fb',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Link Facebook harus diisi'
            ]
        ],
        [
            'field' => 'link_ig',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Link Instagram harus diisi'
            ]
        ],
        [
            'field' => 'link_yutub',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Link Youtube harus diisi'
            ]
        ]
    ];

    public $login = [

        [
            'field' => 'email',
            'rules' => 'required|valid_email|trim',
            'errors' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email tidak valid'
            ]

        ],
        [
            'field' => 'password',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Password harus diisi'
            ]
        ]
    ];
}
