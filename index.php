<?php
include 'vendor/autoload.php';
use Hybridauth\Hybridauth;
use Hybridauth\HttpClient;

$config = [
    'callback' => HttpClient\Util::getCurrentUrl(),
    'providers' => [
        'Line' => [ 
            'enabled' => true,
            'keys'    => [ 'id' => '1558133054', 'secret' => '076bc797a981b543f3eee193e5e709d4' ], 
        ],
    ],
];
try {    
    $hybridauth = new Hybridauth( $config );
    $adapter = $hybridauth->authenticate( 'Line' );
    $tokens = $adapter->getAccessToken();
    $userProfile = $adapter->getUserProfile();
    // print_r( $tokens );
    echo '<pre>';
    var_dump( $userProfile );
    $adapter->disconnect();
}
catch (\Exception $e) {
    echo $e->getMessage();
}
