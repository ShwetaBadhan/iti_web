<?php

namespace App\Helpers;

class NumberToWords
{
    public function convert($number)
    {
        $number = (float) $number;
        $words = '';
        
        $decimal = round($number - (int) $number, 2) * 100;
        $number = (int) $number;

        if ($number > 10000000) {
            $words .= ($number > 10000000) ? ($this->convertToWords($number / 10000000) . ' Crore ') : '';
            $number %= 10000000;
        }
        if ($number > 100000) {
            $words .= ($number > 100000) ? ($this->convertToWords($number / 100000) . ' Lakh ') : '';
            $number %= 100000;
        }
        if ($number > 1000) {
            $words .= ($number > 1000) ? ($this->convertToWords($number / 1000) . ' Thousand ') : '';
            $number %= 1000;
        }
        if ($number > 0) {
            $words .= $this->convertToWords($number);
        }

        $words = 'Rupees ' . ucfirst(trim($words));

        if ($decimal > 0) {
            $words .= ' and ' . $this->convertToWords($decimal) . ' Paise';
        }

        return $words;
    }

    private function convertToWords($number)
    {
        $words = '';
        $number = (int) $number;
        
        $ones = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
        $tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

        if ($number < 20) {
            $words = $ones[$number];
        } else {
            $words = $tens[(int) ($number / 10)] . ' ' . $ones[$number % 10];
        }
        
        return trim($words);
    }
}