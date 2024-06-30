<?php


use Illuminate\Support\Facades\Config;

if( !function_exists('formatNormalMessage') ){
    function formatNormalMessage(string $message) : string|array
    {
        // استخدم تعبيراً عادياً للبحث عن النمط ***{str}***
        $pattern = '/\*\*(.*?)\*\*/';
        // استبدل النمط بالنص المطلوب مع العلامة <b>
        $replacement = '<b>$1</b>';
        // استبدل النمط في النص
        $convertedText = preg_replace($pattern, $replacement, $message);

        $pattern = '/\s\*\s/';

        $replacement = '<br/>';

        $convertedText = preg_replace($pattern, $replacement, $convertedText);


        $pattern = '/```(.*?)```/s';

        $replacement = '<div class="p-2 bg-slate-700 rounded-md text-white font-semiblod">$1</div>';

        $convertedText = preg_replace($pattern, $replacement, $convertedText);

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


if( ! function_exists('arrtotext') ){
    function arrtotext(array $arr, $inner, $outer) : string
    {
        if($arr == []){
            return "[]";
        }

        $text = "[";

        foreach ($arr as $key => $value){
            $text .= "{$key} {$inner} {$value} {$outer}\n";
        }


        return $text . "]";
    }
}

if( ! function_exists('is_anyone_auth') ){
    function is_anyone_auth() : bool
    {
        $guards = Config::get('auth.guards');

        $guards = array_keys($guards);

        foreach ($guards as $guard){
            if( auth($guard)->check() ){
                return $guard;
            }
        }
        return false;
    }
}


if( ! function_exists('formatGptPrompt') ){
    function formatGptPrompt(\App\Models\Auth\Patient $patient) : string
    {

        $patient_data  = [
            'iot' => $patient->iot_data,
            'user' => $patient->user_data()
                ->whereBetween(
                    'created_at',
                    [now()->subDay(), now()]
                )
            ->get()
        ];

        dd($patient_data['user']);

    }


}

if(  !function_exists('strip_html_tags') ){
    function strip_html_tags($text): array|string|null
    {
        // Remove HTML tags using a regular expression
        // Alternatively, to keep some tags like <b>, <i>, <u>, you can modify the pattern as follows:
        // $text = preg_replace('/<(?!\/?(b|i|u|br)\b)[^>]*>/', '', $text);

        return preg_replace('/<[^>]*>/', '', $text);
    }
}
