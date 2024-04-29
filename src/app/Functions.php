<?php
function logger($message, $echo = true)
{
    if ($echo) echo $message . PHP_EOL;
}

function ask($topic)
{
    echo $topic . "\r\n";
    $handle = fopen("php://stdin", "r");
    $input = fgets($handle);
    fclose($handle);
    return trim($input);
}

function isCliServer(): bool
{
    return php_sapi_name() == 'cli-server';
}

function failure($msg)
{
    logger($msg);
    if(!isCliServer()){
        $i = 0;
        while (true){
            sleep(10);
            $i++;
            if($i >= 60) exit;
        }
    }else{
        exit;
    }
}
