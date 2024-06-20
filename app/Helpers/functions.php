<?php


if( !function_exists('formatNormalMessage') ){
    function formatMEssage(string $message, \App\Enums\ChatTypes $type) : string|array
    {
        $value = $type->value;

        return match ($value){
            \App\Enums\ChatTypes::NORMAL->value => formatAlertMEssage($message),
            default => formatNormalMessage($message)
        };
    }
}

if( !function_exists('formatComplexeMessage') ){
    function formatMEssage(string $message, \App\Enums\ChatTypes $type) : string|array
    {
        $value = $type->value;

        return match ($value){
            \App\Enums\ChatTypes::NORMAL->value => formatAlertMEssage($message),
            default => formatNormalMessage($message)
        };
    }
}



if( !function_exists('formatMessage') ){
    function formatMessage(string $message, \App\Enums\ChatTypes $type) : string|array
    {
        $value = $type->value;

        return match ($value){
            \App\Enums\ChatTypes::NORMAL->value => formatNormalMessage($message),
            default => formatComplexeMessage($message)
        };
    }
}
