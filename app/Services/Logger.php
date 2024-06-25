<?php
 namespace App\Services;

 use App\Services\Logger\LoggerChannel;
 use Illuminate\Support\Facades\Config;
 use Illuminate\Support\Str;
class Logger{

    protected string $root;

    protected string $suffix = '_log';

    protected string $prefix;

    protected array $channels = [];

    public function __construct($root = null, $suffix = null, $prefix = null){
        $this->root = is_null($root) ? '/data_cycle_logs/' : $root;

        $this->prefix = is_null($prefix) ? Config::get('app.name') : $prefix;

        $this->suffix = is_null($suffix) ? '_log' : $suffix;
    }

    public function newChannel(): LoggerChannel
    {
        $uuid = Str::uuid()->toString();

        $channel = new LoggerChannel($uuid);

        $channel->setPrefix($this->prefix)
                    ->setSuffix($this->suffix)
                    ->setPath($this->root);

        $this->channels[] = $channel;

        return  $channel;
    }

    public function getChannel(string $uuid = null){
        if( !$uuid ){
            foreach ($this->channels as $channel){
                if( $channel->getUuid() == $uuid ){
                    return $channel;
                }
            }
        }

        return null;
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
        $file_path = $this->root . '/' . $this->filename;
        $file = file_put_contents($file_path, $text, FILE_APPEND);

        return $this;
    }
}
