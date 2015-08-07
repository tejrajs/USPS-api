<?php
namespace tejrajs\uspsapi;

use tejrajs\uspsapi\USPSBase;

/**
 */
class USPSTrackConfirm extends USPSBase {
  /**
   * @var string - the api version used for this type of call
   */
  protected $apiVersion = 'TrackV2';
  /**
   * @var array - list of all packages added so far
   */
  protected $packages = array();
  
  public function getEndpoint() {
    return self::$testMode ? 'http://production.shippingapis.com/ShippingAPITest.dll': 'http://production.shippingapis.com/ShippingAPI.dll';
  }
  /**
   * Perform the API call
   * @return string
   */
  public function getTracking() {
    return $this->doRequest();
  }
  /**
   * returns array of all packages added so far
   * @return array
   */
  public function getPostFields() {
    return $this->packages;
  }

  /**
   * Add Package to the stack
   * @param string $id the address unique id
   * @return void
   */
  public function addPackage($id) {
    $this->packages['TrackID'][] = array('@attributes' => array('ID' => $id));
  }
}
