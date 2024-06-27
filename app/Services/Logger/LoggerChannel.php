<?php

namespace App\Services\Logger;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LoggerChannel
{
    protected string $uuid;

    protected string $suffix;

    protected string $prefix;

    protected string $path;

    protected ?string $full_path = null;

    protected ?string $content = null;
    public function __construct(string $uuid = null ){
        $this->uuid = $uuid === null ? Str::uuid()->toString() : $uuid;
    }

    public function setSuffix(string $suffix): static
    {
        $this->suffix = $suffix;
        return $this;
    }
    public function setPrefix(string $prefix): static
    {
        $this->prefix = $prefix;

        return $this;
    }


    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }
    public function store(): static
    {
        if( $this->full_path == null ){
            $this->full_path = sprintf("%s/%s_%s_%s.log",$this->path,$this->prefix, $this->uuid, $this->suffix);
        }

        if( !$this->content == null ){
            Storage::append($this->full_path, $this->content );
        }

        Storage::append($this->full_path, '' );
        return $this;
    }

    public function addToContent(string $text, $newLine = true): static
    {
        if( $this->content != null ){
            $this->content .= $newLine ? "\n{$text}" : ' '.$text;
        }else{
            $this->content = $newLine ? "\n{$text}" : ' '.$text;
        }
        return $this;
    }


    public function getFilePath(): ?string
    {
        return $this->full_path;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

}
