<?php

namespace App\Helpers;

class NepaliNumeralHelper
{
    public static function getNepaliNumeral($index)
    {
        $nepaliNumerals = [
            'क',
            'ख',
            'ग',
            'घ',
            'ङ',
            'च',
            'छ',
            'ज',
            'झ',
            'ञ',
            'ट',
            'ठ',
            'ड',
            'ढ',
            'ण',
            'त',
            'थ',
            'द',
            'ध',
            'न',
            'प',
            'फ',
            'ब',
            'भ',
            'म',
            'य',
            'र',
            'ल',
            'व',
            'श',
            'ष',
            'स',
            'ह',
            'क्ष',
            'त्र',
            'ज्ञ',
        ];

        if ($index > 36) {
            // Get the first part using the half() function
            $parts = half($index);
            $first_part_index = $parts[0];
            $second_part_index = $parts[1];

            // Combine the corresponding Nepali numerals
            $combined_numeral = $nepaliNumerals[$first_part_index - 1] . $nepaliNumerals[$second_part_index - 1];

            return $combined_numeral;
        }

        // For indices less than or equal to 36, return the single Nepali numeral
        $position = $index - 1;
        $indexWithinArray = $position % count($nepaliNumerals);
        return $nepaliNumerals[$indexWithinArray];
    }
}

function half($index) {
    $parts = [];
    while ($index > 0) {
        $part = min($index, 36);
        $parts[] = $part;
        $index -= $part;
    }
    if(count($parts) > 1){
        foreach($parts as $key => $data){
            if($data == 36){
                $parts[$key] = 1;
            }
        }
    }
    return $parts;
}

?>
