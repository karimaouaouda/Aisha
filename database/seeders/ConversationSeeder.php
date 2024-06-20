<?php

namespace Database\Seeders;

use App\Enums\ChatTypes;
use App\Filament\Patient\Resources\ConversationResource\Pages\Conversations;
use App\Models\Auth\Doctor;
use App\Models\Auth\Patient;
use App\Models\Base\Conversation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $targets = [Doctor::class, Patient::class];
        $srcs = [Doctor::class, Patient::class];
        for($i = 0; $i < 100; $i ++){
            $index = rand(0, 1);
            (new Conversation([
                'source_conversationable_type' => $srcs[$index],
                'source_conversationable_id' => $index === 1 ? 11 : 1,
                'target_conversationable_type' => $srcs[1 - $index],
                'target_conversationable_id' => $index === 1 ? 1 : 11,
                'content' => Str::random(20),
                'image' => null,
                'type' => ChatTypes::NORMAL->value
            ]))->save();
        }
    }
}
