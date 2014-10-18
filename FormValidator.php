<?php
/**
 * Created by PhpStorm.
 * User: jazio
 * Date: 16.10.14
 * Time: 19:04
 */

//http://stackoverflow.com/questions/737385/easiest-form-validation-library-for-php
class FormValidator {
    public $field;

    public function isValid($field) {
        echo $field." field";
        if (!empty($field)) {
            return true;
        }
        return false;
    }

} 