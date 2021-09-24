<?php 
    use Illuminate\Support\Facades\DB;
    $cities = DB::table('cities')->pluck('name'); 
    /*

"axios": "^0.18",
        "bootstrap": "^4.0.0",
        "cross-env": "^5.1",
        "jquery": "^3.6",
        "laravel-mix": "^2.0",
        "lodash": "^4.17.5",
        "popper.js": "^1.12",
        "vue": "^2.5.7"*/
?>

