<?php

namespace App\Console\Commands;

use App\Enums\IOTTopics;
use App\Models\IotData;
use Illuminate\Console\Command;
use PhpMqtt\Client\Exceptions\DataTransferException;
use PhpMqtt\Client\Exceptions\InvalidMessageException;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\Exceptions\ProtocolViolationException;
use PhpMqtt\Client\Exceptions\RepositoryException;
use PhpMqtt\Client\Facades\MQTT;

class StartMqttServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $mqtt = MQTT::connection('public');

        $topics = IOTTopics::values();

        foreach ($topics as $topic){
            try {
                $mqtt->subscribe($topic, function ($topic, $message) {
                    $data = json_decode($message, true);

                    $patient_id = $data['patient_id'];

                    unset($data['patient_id']);

                    $data = json_encode($data);

                    (new IotData([
                        'patient_id' => $patient_id,
                        'topic' => $topic,
                        'data' => $data
                    ]))->save();

                    printf("message on %s is %s", $topic, $message);
                }, 1);
            } catch (DataTransferException|RepositoryException $e) {
                printf("failed");
            }
        }



        try {
            $mqtt->loop(true);
        } catch (DataTransferException|ProtocolViolationException|InvalidMessageException|MqttClientException $e) {
            printf("error in loop");
        }

    }
}
