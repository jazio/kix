<?php

namespace lib;
/**
 * FormValidator
 * Date: 16.10.14
 * Time: 19:04
 */

class FormValidator {
    public $field;
    public $type;
    public $err = array();

    public function isValid($field, $type = 'text') {
        // Universal tests.
        if (empty($field)) {
            $this->err[] = "Field " . $field . " is empty";
        }
        return true;
    }

}
