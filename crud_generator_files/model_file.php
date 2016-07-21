<?php

/**
 * @author: Mayck Xavier <mayckxavier@lab01.com.br>
 */

class {{class_name}} extends MY_Model
{
    protected $_table = '{{table_name}}';
    public $primary_key = 'id';
    public $protected_attributes = array('id');

    function __construct()
    {
        $this->setValidate();
    }

    public $validate = null;

    private function setValidate()
    {
        $this->validate = array(
            array(
                'field' => 'field',
                'label' => 'Field'
                )
            );
    }

    public function insert($data, $skip_validation = FALSE)
    {
        if ($last_id = parent::insert($data, $skip_validation)) {
            log_message('info', __METHOD__ . " - {{param_name}} com id {$last_id} inserido com sucesso");
            return $last_id;
        } else {
            $this->message_type = 'error';
            $this->message = validation_errors('', '<br />');
            return FALSE;
        }
    }

    public function update($primary_value, $data, $skip_validation = FALSE)
    {
        if (parent::update($primary_value, $data, $skip_validation)) {
            log_message('info', __METHOD__ . " - {{param_name}} com id {$primary_value} alterado com sucesso");
            return TRUE;
        } else {
            $this->message_type = 'error';
            $this->message = validation_errors('', '<br />');
            return FALSE;
        }
    }

    public function delete($id)
    {
        if (parent::delete($id)) {
            log_message('info', __METHOD__ . " - {{param_name}} com id {$id} excluido com sucesso");
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function search($field, $value)
    {
        $list = $this->db->select('*')->from($this->_table)->like($field, $value)->get()->result();
        return $list;
    }
}
