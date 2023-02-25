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

    /**
     * データ登録
     *
     * @param array $insData
     * @return integer
     */
    public function insert($insData, $sequence = 'id')
    {
        if (!is_array($insData) || empty($insData)) {
            throw new \Exception('insert() パラメータが不正です。');
        }
        // SQLログ
        // $insData = $this->setInsUser($insData);
        // return DB::table($this->table)->insertGetId($insData, $sequence);
        // $this->db->insert($this->table, $insData);
        // return $this->db->insert_id();
    }
}
