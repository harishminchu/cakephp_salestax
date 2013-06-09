<?php
App::uses('Order', 'Model');

/**
 * Order Test Case
 *
 */
class OrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order',
		'app.order_product',
		'app.product',
		'app.category',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Order = ClassRegistry::init('Order');
	}

	public function testOrderOne(){
		$this->Order->create();
		$this->Order->save();
		$order_id = $this->Order->id;
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 1, 'quantity' => 1)); // book
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 6, 'quantity' => 1)); // music cd
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 2, 'quantity' => 1)); // chocolate bar
	}

	public function testOrderTwo(){
		$this->Order->create();
		$this->Order->save();
		$order_id = $this->Order->id;
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 3, 'quantity' => 1)); // imported box of chocolates
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 7, 'quantity' => 1)); // imported bottle of perfume
	}

	public function testOrderThree(){
		$this->Order->create();
		$this->Order->save();
		$order_id = $this->Order->id;
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 7, 'quantity' => 1)); // imported box of chocolates
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 8, 'quantity' => 1)); // bottle of perfume
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 5, 'quantity' => 1)); // packet of headache pills
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 4, 'quantity' => 1)); // box of imported chocolates
	}
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Order);

		parent::tearDown();
	}

}
