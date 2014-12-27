<?php

namespace lib;
/**
 * FormValidator
 * Date: 16.10.14
 * Time: 19:04
 */
    // watch this https://www.youtube.com/watch?v=netHLn9TScY&list=PLfdtiltiRHWGQrNSFxCE9mxspdpX_JleP
// Refactor based on rules -- see video
//http://stackoverflow.com/questions/737385/easiest-form-validation-library-for-php
// http://cipriancociorba.com/php-form-validation-part-2-building-the-validator-class/
class FormValidator {
    public $field;
    public $type;
    public $err = array();

    public function isValid($field, $type = 'text') {
        // Universal tests
        if (empty($field)) {
            $this->err[] = "Field ". $field . " is empty";
            echo $field;
            //var_dump($this->err);
            return false;
        }

        // Field specific tests
        switch ($type) {
            case 'text':
                if (strlen($field) < 3) {
                    //@todo replace $field with field name
                    $this->err[] = "Field {$field} must be minimum 3 characters";
                    return false;
                }
                break;
            case 'password':

                break;
            default:

                break;
        }
    return true;
    }

    public function setError($errors) {
        $this->errors[] = $errors;
    }

}