<?php
namespace Drupal\nguyen\NguyenServices;
/**
 * Injector services class
 */
class Injector {
  /**
   * simple function return string with number passed
   * @param type $number
   * @return string 
   */
  public function injectNumber($number) {
    return 'Inject: ' . $number;
  }
}
