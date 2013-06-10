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
		$this->Order->OrderProduct = ClassRegistry::init('OrderProduct');
	}

	public function testOrderOne(){
		$this->Order->create();
		$this->Order->save();
		$order_id = $this->Order->id;
		$this->Order->OrderProduct->create();
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 1, 'quantity' => 1)); // book
		$this->Order->OrderProduct->create();
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 6, 'quantity' => 1)); // music cd
		$this->Order->OrderProduct->create();
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 2, 'quantity' => 1)); // chocolate bar
		$receipt = $this->Order->receipt();
		$expected = <<<EOT
1 book: 12.49
1 music CD: 16.49
1 chocolate bar: 0.85
Sales Taxes: 1.50
Total: 29.83
EOT;
		$this->assertEquals($expected, $receipt, 'Receipt not a match.');
	}

	public function testOrderTwo(){
		$this->Order->create();
		$this->Order->save();
		$order_id = $this->Order->id;
		$this->Order->OrderProduct->create();
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 3, 'quantity' => 1)); // imported box of chocolates
		$this->Order->OrderProduct->create();
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 7, 'quantity' => 1)); // imported bottle of perfume
		$receipt = $this->Order->receipt();
		$expected = <<<EOT
1 imported box of chocolates: 10.50
1 imported bottle of perfume: 54.65
Sales Taxes: 7.65
Total: 65.15
EOT;
		$this->assertEquals($expected, $receipt, 'Receipt not a match.');
	}

	public function testOrderThree(){
		$this->Order->create();
		$this->Order->save();
		$order_id = $this->Order->id;
		$this->Order->OrderProduct->create();
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 7, 'quantity' => 1, 'price' => 27.99)); // imported bottle of perfume
		$this->Order->OrderProduct->create();
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 8, 'quantity' => 1)); // bottle of perfume
		$this->Order->OrderProduct->create();
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 5, 'quantity' => 1)); // packet of headache pills
		$this->Order->OrderProduct->create();
		$this->Order->OrderProduct->save(array('order_id'=>$order_id, 'product_id' => 3, 'quantity' => 1, 'price' => 11.25)); // box of imported chocolates
		$receipt = $this->Order->receipt();
		$expected = <<<EOT
1 imported bottle of perfume: 32.19
1 bottle of perfume: 20.89
1 packet of headache pills: 9.75
1 imported box of chocolates: 11.85
Sales Taxes: 6.70
Total: 74.68
EOT;
		$this->assertEquals($expected, $receipt, 'Receipt not a match.');
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
