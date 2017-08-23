<?php

// API id
$api_id = $modx->getOption('sms_ru_api_id', null, null);
if(empty($api_id)) {
    $modx->log(xPDO::LOG_LEVEL_ERROR,'SMS.RU hook: empty API ID!.');
    // так как это hook, то даже в случае неудачи возвращаем true
    return true;
}

// Support phone number
$phone = $modx->getOption('manager_phone', null, null);
if(empty($phone)) {
    // так как это hook, то даже в случае неудачи возвращаем true
    return true;
}

$ch = curl_init("https://sms.ru/sms/send");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(

    "api_id"        =>  $api_id,
    "to"            =>  $phone,
    "text"      =>  "site.ru: сообщение с сайта, проверьте почту.",

));
$body = curl_exec($ch);
curl_close($ch);

return true;
