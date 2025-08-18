<?php
/**
 * Validator class for validating input data.
 * This class provides methods to validate strings and email addresses.
 * 
 * @package Validator
 * @version 1.0
 * 
 */
    namespace Core;



class Validator
{

    /**
     *  Validates a string value against minimum and maximum length constraints.
     *  @param string $value The string value to validate.
     *  @return bool Returns true if the string length is within the specified range, false otherwise.
     */ 
    public static function string($value, $min=1, $max=INF) : bool
    {
        $value = trim($value);

       return strlen($value) >= $min && strlen($value) <= $max;

    }

    /**
     * Validates an email address.
     * @param string $value The email address to validate.
     * @return mixed Returns the filtered email if valid, false otherwise.
     */
    public static function email(string $value) : mixed
    {
      return  filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    
}