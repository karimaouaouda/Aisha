<?php

namespace App\Services\Builders;



class MessageBuilder
{
    private string $message = '';

    protected string $format;



    public static function use($format) : static
    {
        return (new static)->useFormat($format);
    }

    public function with(string $patientMessage): static
    {
        $this->message = $patientMessage;
        return $this;
    }

    public function useFormat(string $format) : static
    {
        $this->format = $format;

        return $this;
    }

    public static function make(): static
    {
        return ( new static );
    }

    public function appendText(string $key, string $value): static
    {
        $pattern = "/\[{$key}]/";

        $this->format = preg_replace($pattern, $value, $this->format);

        return $this;
    }

    public function appendArray(string $key, array $arr, string $in = '=>', string $out = ','): static
    {
        $pattern = "/\[{$key}]/";

        $this->format = preg_replace($pattern, arrtotext($arr, $in, $out), $this->format);

        return $this;
    }


    public function build() : string
    {
        $pattern = "/\[message]/";
        return preg_replace($pattern, $this->message, $this->format);
    }
}
/**
*/
