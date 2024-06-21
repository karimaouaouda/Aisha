<?php


if( !function_exists('formatNormalMessage') ){
    function formatNormalMessage(string $message) : string|array
    {
        // استخدم تعبيراً عادياً للبحث عن النمط ***{str}***
        $pattern = '/\*\*\*\{(.*?)}\*\*\*/';
        // استبدل النمط بالنص المطلوب مع العلامة <b>
        $replacement = '<b>$1</b>';
        // استبدل النمط في النص
        $convertedText = preg_replace($pattern, $replacement, $message);
        return $convertedText;
    }
}

if( !function_exists('formatComplexMessage') ){
    function formatComplexMessage(string $message) : string|array
    {
        $parts = explode("|", $message);

        $topic = $parts[0];

        $title = $parts[1];

        $content = $parts[2];

        return [
            'topic' => $topic,
            'title' => $title,
            'content' => $content
        ];
    }
}



if( !function_exists('formatMessage') ){
    function formatMessage(string $message,string $type) : string|array
    {

        return match ($type){
            \App\Enums\ChatTypes::NORMAL->value => formatNormalMessage($message),
            default => formatComplexMessage($message)
        };
    }
}
