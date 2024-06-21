<?php

if( !function_exists('calculateHRV') ){
    function calculateHRV($heartbeats): float
    {
        // Ensure there are enough data points
        if (count($heartbeats) < 2) {
            return 0.0;
        }

        // Compute R-R intervals in seconds
        $rrIntervals = [];
        for ($i = 1; $i < count($heartbeats); $i++) {
            $previous = strtotime($heartbeats[$i - 1]['created_at']);
            $current = strtotime($heartbeats[$i]['created_at']);
            $rrIntervals[] = ($current - $previous);
        }

        // Compute successive differences of R-R intervals
        $rrDiffs = [];
        for ($i = 1; $i < count($rrIntervals); $i++) {
            $rrDiffs[] = $rrIntervals[$i] - $rrIntervals[$i - 1];
        }

        // Compute the squared differences
        $squaredDiffs = array_map(function($diff) {
            return $diff * $diff;
        }, $rrDiffs);

        // Compute the mean of the squared differences
        $meanSquaredDiffs = array_sum($squaredDiffs) / count($squaredDiffs);

        // Compute the root mean square of successive differences (RMSSD)
        $rmssd = sqrt($meanSquaredDiffs);

        return $rmssd;
    }
}


if( !function_exists('splitHeartbeatsIntoZones') ){
    function splitHeartbeatsIntoZones($heartbeats, $age): array
    {
        // Define maximum heart rate
        $maxHeartRate = 220 - $age;

        // Define heart rate zone thresholds
        $zones = [
            "Normal" => 0.6 * $maxHeartRate,
            "Moderate" => 0.8 * $maxHeartRate
        ];

        // Initialize arrays for each zone
        $normal = [];
        $moderate = [];
        $vigorous = [];

        // Split heartbeats into zones
        foreach ($heartbeats as $heartbeat) {
            if ($heartbeat['heart_beats'] < $zones["Normal"]) {
                $normal[] = $heartbeat['heart_beats'];
            } elseif ($heartbeat['heart_beats'] < $zones["Moderate"]) {
                $moderate[] = $heartbeat['heart_beats'];
            } else {
                $vigorous[] = $heartbeat['heart_beats'];
            }
        }

        // Return the heartbeats split into zones
        return [
            "Normal" => $normal,
            "Moderate" => $moderate,
            "Vigorous" => $vigorous
        ];
    }
}


if( ! function_exists('analyseHeartBeats') ){
    function analyseHeartBeats($heartbeats, $age) {
        // تقسيم النبضات إلى مناطق
        $zones = splitHeartbeatsIntoZones($heartbeats, $age);

        // حساب متوسط معدل ضربات القلب
        $totalHeartbeats = array_map(function($record) {
            return $record['heart_beats'];
        }, $heartbeats);
        $averageHeartRate = array_sum($totalHeartbeats) / count($totalHeartbeats);

        // حساب الانحراف المعياري لمعدل ضربات القلب
        $mean = $averageHeartRate;
        $squaredDiffs = array_map(function($value) use ($mean) {
            return pow($value - $mean, 2);
        }, $totalHeartbeats);
        $stdDeviation = sqrt(array_sum($squaredDiffs) / count($squaredDiffs));

        // حساب النسبة المئوية للوقت في كل منطقة
        $totalRecords = count($heartbeats);
        $normalPercentage = (count($zones['Normal']) / $totalRecords) * 100;
        $moderatePercentage = (count($zones['Moderate']) / $totalRecords) * 100;
        $vigorousPercentage = (count($zones['Vigorous']) / $totalRecords) * 100;

        // إرجاع الإحصائيات
        return [
            "averageHeartRate" => $averageHeartRate,
            "stdDeviation" => $stdDeviation,
            "heart_rate_zones" => [
                "Normal" => $normalPercentage,
                "Moderate" => $moderatePercentage,
                "Vigorous" => $vigorousPercentage
            ]
        ];
    }
}
