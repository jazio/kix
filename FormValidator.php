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
        if (empty($field)) {
            print "Field {$field} not empty";
            return false;
        }

        elseif (strlen($field) < 3) {
            print "Field {$field} must be minimum 3 characters";
            return false;
        }

        else {
            return true;
        }
    }

} 