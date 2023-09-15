<?php

namespace Tests\Unit;


use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        /**
         * 6104338906072042
         * سیدمهدی حسینی
         */

        dd(count('sajad'));

        //user_id,created_at,name,price

        //max_price
        //min_price
        //new_product=>2
        //avg_price


        $temp1 = $this->range(1, 10);
        $temp2 = $this->range(10, 20);
        $temp3 = $this->range(20, 30);

//        $sum = $this->sumValueOfArray($temp1) + $this->sumValueOfArray($temp2) + $this->sumValueOfArray($temp3);
//
//
//        $sum_new = $this->sumValueOfArray($temp1);
//        $sum_new += $this->sumValueOfArray($temp2);
//        $sum_new += $this->sumValueOfArray($temp3);
//        $sum = $this->arraysSum([$temp1, $temp2, $temp3]);
//        dd($sum);
//        dd(\Str::random(8));
//        $strings = $this->generateArrayString(5);
//        $res = $this->maxOfLenght($strings);

//        dd([
//            $strings,
//            $res
//        ]);

        $rang = $this->range(1, 100);
        $arr = $this->ranges(22, 30, $rang);
        $reversedArray = $this->arrayReverse($arr);
        $collect = $this->oddAndEven($reversedArray);
        $minAndMaxAndAvgOfArray = $this->return_max_and_min_and_avg($arr);
        $string = 'thddd';
        $diagnosis = $this->diagnosis_len_of_str($string);
//        dd($diagnosis);


        $data = $this->generateArrayString(100);
        $result = $this->messureValueLenght($data);
        dd($result);
    }

    public function oddAndEven(array $array): array
    {
        $odd = 0;
        $even = 0;
        foreach ($array as $item) {
            if ($item % 2 == 0) {
                $even++;
            } else {
                $odd++;
            }

        }
        return ([

            'count odd is'  => $odd,
            'count even is' => $even,

        ]);
    }


    public function return_max_and_min_and_avg(array $array): array
    {

        $max = $array[0];
//       dd($max);
        $avg = 0;
        $arraySum = 0;
        $min = $array[0];
        foreach ($array as $index => $value) {
            if ($value < $min) {
                $min = $value;
            } elseif ($value > $max) {
                $max = $value;
            }
        }
        foreach ($array as $item) {
            $arraySum += $item;
        }

        $avg = $arraySum / count($array);

        return [
            'minimum value of array =  ' => $min,
            'maximum value of array =  ' => $max,
            'average value of array = '  => $avg,
        ];

    }

    public function diagnosis_len_of_str(string $string): string
    {

        if (strlen($string) == 2) {
            return 'this string has 2 char';
        } elseif (strlen($string) == 3) {
            return 'this string has 3 char';
        } else {
            return 'this is other count of string ';
        }


    }


    public function arrayReverse(array $myArray): array
    {
        $reversedArray = [];
        for ($i = count($myArray) - 1; $i >= 0; $i--) {
            $reversedArray[] = $myArray[$i];
        }
        return $reversedArray;
    }

    public function ranges(int $min, int $max, array $array): array
    {
        $temp = [];
        foreach ($array as $item) {
            if ($item >= $min && $item <= $max) {
                $temp[] = $item;
            }
        }
        return $temp;
    }


    public function range(int $from, int $to): array
    {
        $array = [];
        $start = min($from, $to);
        $end = max($to, $from);

        for ($i = $start; $i <= $end; $i++) {
            $array[] = $i;
        }
        return $array;
    }


    public function sumValueOfArray(array $array): int
    {
        $temp = 0;
        for ($i = 0; $i < count($array); $i++) {
            $temp += $array[$i];

        }
        return $temp;

    }

    public function arraysSum(array $arrays): int
    {
        $sumAll = 0;
        foreach ($arrays as $myArray) {
            foreach ($myArray as $value) {
                $sumAll += $value;
            }
        }
        return $sumAll;
    }


    public function generateArrayString(int $length): array
    {
        $arrayString = [];
        for ($i = 0; $i < $length; $i++) {
            $arrayString[] = \Str::random(rand(2, 5));
        }

        return $arrayString;


    }

    public function maxOfLenght(array $array): array
    {
        $text_index = 0;
        $text = $array[0];
        $max_length = strlen($array[0]);
        $temp = [0];

        foreach ($array as $index => $value) {

            if (strlen($value) > $max_length) {
                $max_length = strlen($value);
                $text_index = $index;
                $text = $value;
                $temp[] = $index;


            }
        }

        return [
            "value" => $text,
            "index" => $text_index,
            'temp'  => $temp
        ];
    }


    public function messureValueLenght(array $array): array
    {
        $temp = [];
        foreach ($array as $value) {
            $temp[] = [
                'value'  => $value,
                'lenght' => strlen($value)
            ];
        }
        return $temp;
    }


}
