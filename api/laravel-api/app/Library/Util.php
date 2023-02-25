<?php

namespace App\Library;

class Util
{
    /**
     * 応用が効く関数を用意
     */

    /**
     * $form_inputを$fill_dataの値で埋める
     */
    protected function fillFormInput(array $form_input = [], array $fill_data = [])
    {
        foreach ($form_input as $key => $value) {
            if (is_array($fill_data) && array_key_exists($key, $fill_data)) {
                $form_input[$key] = $fill_data[$key];
            }
        }

        return $form_input;
    }
}
