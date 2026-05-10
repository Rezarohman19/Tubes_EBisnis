<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Payment Methods
    |--------------------------------------------------------------------------
    | Konfigurasi metode pembayaran manual.
    | Sesuaikan nomor rekening/ewallet/QRIS sesuai milik toko.
    */

    'methods' => [
        'bca' => [
            'label'       => 'Transfer Bank BCA',
            'type'        => 'bank',
            'icon'        => 'bank',
            'number'      => '1234567890',
            'account_name'=> 'Frozymart',
            'description' => 'Bank Central Asia',
            'color'       => 'blue',
        ],
        'mandiri' => [
            'label'       => 'Transfer Bank Mandiri',
            'type'        => 'bank',
            'icon'        => 'bank',
            'number'      => '1400123456789',
            'account_name'=> 'Frozymart',
            'description' => 'Bank Mandiri',
            'color'       => 'yellow',
        ],
        'bni' => [
            'label'       => 'Transfer Bank BNI',
            'type'        => 'bank',
            'icon'        => 'bank',
            'number'      => '0123456789',
            'account_name'=> 'Frozymart',
            'description' => 'Bank Negara Indonesia',
            'color'       => 'orange',
        ],
        'bri' => [
            'label'       => 'Transfer Bank BRI',
            'type'        => 'bank',
            'icon'        => 'bank',
            'number'      => '123401234567890',
            'account_name'=> 'Frozymart',
            'description' => 'Bank Rakyat Indonesia',
            'color'       => 'blue',
        ],
        'dana' => [
            'label'       => 'DANA',
            'type'        => 'ewallet',
            'icon'        => 'dana',
            'number'      => '08576851XXXX',
            'account_name'=> 'Frozymart',
            'description' => 'DANA E-Wallet',
            'color'       => 'blue',
        ],
        'gopay' => [
            'label'       => 'GoPay',
            'type'        => 'ewallet',
            'icon'        => 'gopay',
            'number'      => '08576851XXXX',
            'account_name'=> 'Frozymart',
            'description' => 'GoPay by Gojek',
            'color'       => 'green',
        ],
        'ovo' => [
            'label'       => 'OVO',
            'type'        => 'ewallet',
            'icon'        => 'ovo',
            'number'      => '08576851XXXX',
            'account_name'=> 'Frozymart',
            'description' => 'OVO E-Wallet',
            'color'       => 'purple',
        ],
        'shopee_pay' => [
            'label'       => 'ShopeePay',
            'type'        => 'ewallet',
            'icon'        => 'shopee',
            'number'      => '08576851XXXX',
            'account_name'=> 'Frozymart',
            'description' => 'ShopeePay by Shopee',
            'color'       => 'orange',
        ],
        'qris' => [
            'label'       => 'QRIS',
            'type'        => 'qris',
            'icon'        => 'qris',
            'number'      => null,
            'account_name'=> 'Frozymart',
            'description' => 'Scan QRIS — semua e-wallet diterima',
            'qris_image'  => null, // isi path ke gambar QRIS jika ada: 'images/qris.png'
            'color'       => 'purple',
        ],
        'cod' => [
            'label'       => 'Bayar di Tempat (COD)',
            'type'        => 'cod',
            'icon'        => 'cod',
            'number'      => null,
            'account_name'=> null,
            'description' => 'Bayar saat barang tiba',
            'color'       => 'green',
        ],
    ],
];