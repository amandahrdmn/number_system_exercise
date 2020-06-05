<?php


namespace App\Utilities;


class ConvertNumberSystem
{
    static public function convertToBase63(array $input_dec_array): array
    {
        $conversion_array = array_merge(range(0,9), range('a', 'z'), range('A', 'Z'));

        foreach($input_dec_array as $item) {
            $number_base = count($conversion_array);
            $converted_number_places = [];
            $id_number = $item['id'];
            do {
                $remainder = $id_number % $number_base;
                $id_number = $id_number/$number_base;
                array_unshift($converted_number_places, $conversion_array[$remainder]);
            } while ($id_number > 1);

            $converted_number_array[] =
                [
                    'new_id' => implode('', $converted_number_places),
                    'id' => $item['id']
                ];
        }

        return $converted_number_array;
    }
}