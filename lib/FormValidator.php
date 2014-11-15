<?php

namespace lib;
/**
 * FormValidator
 * Date: 16.10.14
 * Time: 19:04
 */
// Refactor based on rules -- see video
//http://stackoverflow.com/questions/737385/easiest-form-validation-library-for-php
class FormValidator {
    public $field;
    public $type;

    public function isValid($field, $type = 'text') {

        // Universal tests
        if (empty($field)) {
            print "Field {$field} is empty";
            return false;
        }

        // Field specific tests
        switch ($type) {
            case 'text':
                if (strlen($field) < 3) {
                    //@todo replace $field with field name
                    print "Field {$field} must be minimum 4 characters";
                    return false;
                }
                else {
                    return true;
                }
                break;
            case 'password':
                return true;
                break;
            default:
                return true;
                break;
        }
    }

}