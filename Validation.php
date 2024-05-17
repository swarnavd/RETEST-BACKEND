<?php

require_once __DIR__ . '/vendor/autoload.php';

class Validation {
  /**
   * A function to check that first name or last contains only alphabet or not.
   *
   * @param string $name
   *  User's registered name.
   *
   * @return bool
   *  Returns true if it follows the exact pattern of a full name else returns
   * false.
  */
  public function validFullName(string $name) {
    $nameRegex = '/^[a-zA-Z\s]+$/';
    if (preg_match($nameRegex, $name)) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * A function to check that password contains a special character, a upper
   * case letter and a lowercase letter and length of password should be greater
   * than 5.
   *
   * @param string $psw
   *  User provided password.
   *
   * @return bool
   *  Returns true if it follows the exact pattern of password else false.
  */
  public function validPassword($psw) {
    $passRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/";
    if (preg_match($passRegex, $psw) && strlen($psw) > 5 && strlen($psw) <= 20) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * A function to check if Email id is in correct format or not.
   *
   * @param string $email
   *  Holds user's email address.
   * @return bool
   *  If it is in correct format then return true else returns false.
  */
  public function validEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return TRUE;
  }
  return FALSE;
  }

  /**
   * A function to checks that a field is contains only number or not.
   *
   * @param string $number
   *  User's provided input.
   *
   * @return bool
   *  Returns true if it contains only number.
   */
  public function validNumber(int $number) {
    $numberRegex = '/^\d+$/';
    if (preg_match($numberRegex, $number)) {
      return TRUE;
    }
    return FALSE;
  }
}

