<?php
App::uses('OrderProduct', 'Model');

/**
 * OrderProduct Test Case
 *
 */
class OrderProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_product',
		'app.order',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderProduct = ClassRegistry::init('OrderProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderProduct);

		parent::tearDown();
	}

}
