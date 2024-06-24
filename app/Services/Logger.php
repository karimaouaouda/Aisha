<?php
 namespace App\Services;

 use Illuminate\Support\Str;
class Logger{

    protected string $root;

    protected string $suffix = '_log';

    protected string $prefix;

    protected string $filename;

    public function __construct($root = null, $suffix = null, $prefix = null){
        $this->root = is_null($root) ? base_path('/data_cycle_logs/') : $root;

        $this->prefix = is_null($prefix) ? env('APP_NAME') : $prefix;

        $this->suffix = is_null($suffix) ? '_log' : $suffix;
    }

    private function generateFileName(string $middle = null): static
    {
        $uuid = Str::uuid()->toString();

        $this->filename = sprintf("%s_%s_%s.log", $this->prefix, is_null($middle) ? $uuid : $middle, $this->suffix);

        return  $this;
    }

    public static function make($root = null, $suffix = null, $prefix = null, $middle = null): static
    {
        $static = new static;

        $static->generateFileName($middle);

        return $static;
    }

    public static function iot($root = null, $suffix = null, $prefix = null, $middle = null): static
    {
        return self::make($root, $suffix, $prefix, $middle);
    }

    public function log(string $format, ...$args): static
    {
        $day = now()->toString();

        $log = $day . ' : ';

        $text = sprintf($format, ...$args);

        $this->logToFile($text);

        return $this;
    }

    public function logToFile($text): static
    {
        $file_path = $root . '/' . $this->filename;
        $file = file_put_contents($file_path, $text, FILE_APPEND);

        return $this;
    }
}
