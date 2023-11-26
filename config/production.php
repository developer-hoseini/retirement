<?php
return [
    "local" => [
        "domain" => env("LOCAL_DOMAIN"),
        "pass" => env("LOCAL_PASS"),
        "service_id" => env("LOCAL_SERVICE_ID"),
        "info_url" => env("LOCAL_USERINFO_URL"),
        "register_payment_url" => env("LOCAL_REGISTER_PAYMENT"),
        "send_sms_url" => "http://193.151.128.72:8000/api/customer/sms/",
        "verify_url" => "http://193.151.128.72:8000/api/customer/verify",
        "register_customer_url" => "http://193.151.128.72:8000/api/customer",
        "get_services_url" => "http://193.151.128.72:8000/api/service/list",
    ],
    "production" => [
        "domain" => env("PRO_DOMAIN"),
        "pass" => env("PRO_PASS"),
        "service_id" => env("PRO_SERVICE_ID"),
        "info_url" => env("PRO_USERINFO_URL"),
        "register_payment_url" => env("PRO_REGISTER_PAYMENT"),
        "send_sms_url" => "http://193.151.128.72:8000/api/customer/sms/",
        "verify_url" => "http://193.151.128.72:8000/api/customer/verify",
        "register_customer_url" => "http://193.151.128.72:8000/api/customer",
        "get_services_url" => "http://193.151.128.72:8000/api/service/list",
    ]
];

