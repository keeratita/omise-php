<?php

require_once dirname(__FILE__).'/TestConfig.php';
if(version_compare(phpversion(), '5.3.2') >= 0 && file_exists(dirname(__FILE__).'/../../vendor/autoload.php')) {
  require_once dirname(__FILE__).'/../../vendor/autoload.php';
} else {
  require_once dirname(__FILE__).'/../../lib/Omise.php';
}

class TokenTest extends PHPUnit_Framework_TestCase {
  public static function setUpBeforeClass() {
    /** Do Nothing **/
  }

  public function setUp() {
    /** Do Nothing **/
  }

  /**
   * ----- Test OmiseToken's method exists -----
   * OmiseToken should contain some method like below.
   */
  public function testOmiseTokenMethodExists() {
    $this->assertTrue(method_exists('OmiseToken', 'retrieve'));
    $this->assertTrue(method_exists('OmiseToken', 'create'));
    $this->assertTrue(method_exists('OmiseToken', 'reload'));
    $this->assertTrue(method_exists('OmiseToken', 'getUrl'));
  }

  /**
   * ----- Test create -----
   * Assert that a token is successfully created with the given parameters set.
   */
  public function testCreate() {
    $token = OmiseToken::create(array(
      'card' => array('name'              => 'Somchai Prasert',
                      'number'            => '4242424242424242',
                      'expiration_month'  => 10,
                      'expiration_year'   => 2018,
                      'city'              => 'Bangkok',
                      'postal_code'       => '10320',
                      'security_code'     => 123)));

    $this->assertArrayHasKey('object', $token);
    $this->assertEquals('token', $token['object']);
  }

  /**
   * ----- Test retrieve -----
   * Assert that a customer object is returned after a successful retrieve.
   */
  public function testRetrieve() {
    // I assume the OmiseToken::create was fine already from above test
    // and It don't need to create new token anymore because it has id 'tokn_test_4zmrjhuk2rndz24a6x0' fixture already.
    $token = OmiseToken::retrieve('tokn_test_4zmrjhuk2rndz24a6x0');

    $this->assertArrayHasKey('object', $token);
    $this->assertEquals('token', $token['object']);
  }

  public function tearDown() {
    /** Do Nothing **/
  }

  public static function tearDownAfterClass() {
    /** Do Nothing **/
  }
}
