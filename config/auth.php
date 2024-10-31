<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Konfigurasi Default Autentikasi
    |--------------------------------------------------------------------------
    |
    | Opsi ini mengontrol "guard" autentikasi default dan opsi reset password
    | untuk aplikasi Anda. Anda dapat mengubah nilai default ini sesuai
    | kebutuhan, namun ini adalah konfigurasi awal yang baik.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Guard Autentikasi
    |--------------------------------------------------------------------------
    |
    | Berikutnya, Anda dapat mendefinisikan setiap guard autentikasi untuk aplikasi.
    | Konfigurasi default yang bagus telah didefinisikan untuk Anda di sini
    | yang menggunakan penyimpanan sesi dan provider pengguna Eloquent.
    |
    | Semua driver autentikasi memiliki provider pengguna. Ini mendefinisikan
    | bagaimana pengguna diambil dari database atau mekanisme penyimpanan lain
    | yang digunakan aplikasi ini untuk menyimpan data pengguna.
    |
    | Didukung: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Provider Pengguna
    |--------------------------------------------------------------------------
    |
    | Semua driver autentikasi memiliki provider pengguna. Ini mendefinisikan
    | bagaimana pengguna diambil dari database atau mekanisme penyimpanan lain
    | yang digunakan aplikasi ini untuk menyimpan data pengguna.
    |
    | Jika Anda memiliki beberapa tabel atau model pengguna, Anda dapat
    | mengkonfigurasi beberapa sumber yang mewakili setiap model/tabel.
    | Sumber-sumber ini kemudian dapat ditetapkan ke guard tambahan.
    |
    | Didukung: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Reset Password
    |--------------------------------------------------------------------------
    |
    | Anda dapat menentukan beberapa konfigurasi reset password jika memiliki
    | lebih dari satu tabel atau model pengguna dalam aplikasi dan ingin
    | memiliki pengaturan reset password terpisah berdasarkan tipe pengguna.
    |
    | Waktu kedaluwarsa adalah jumlah menit setiap token reset akan dianggap
    | valid. Fitur keamanan ini membuat token berumur pendek sehingga
    | lebih sulit ditebak. Anda dapat mengubahnya sesuai kebutuhan.
    |
    | Pengaturan throttle adalah jumlah detik pengguna harus menunggu sebelum
    | menghasilkan lebih banyak token reset password. Ini mencegah pengguna
    | dengan cepat menghasilkan token reset password dalam jumlah besar.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60, // 60 menit
            'throttle' => 60, // 60 detik
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Batas Waktu Konfirmasi Password
    |--------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan jumlah detik sebelum konfirmasi password
    | kedaluwarsa dan pengguna diminta memasukkan kembali password mereka
    | melalui layar konfirmasi. Secara default timeout berlangsung 3 jam.
    |
    */

    'password_timeout' => 10800, // 3 jam

];
