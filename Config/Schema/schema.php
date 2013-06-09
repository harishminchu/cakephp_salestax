<?php 
class CakephpSalestaxSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $categories = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'name' => array('type' => 'text', 'null' => true),
		'taxable' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			
		),
		'tableParameters' => array()
	);

	public $order_products = array(
		'order_id' => array('type' => 'integer', 'null' => true),
		'product_id' => array('type' => 'integer', 'null' => true),
		'quantity' => array('type' => 'text', 'null' => true),
		'price' => array('type' => 'text', 'null' => true),
		'taxes' => array('type' => 'text', 'null' => true),
		'indexes' => array(
			
		),
		'tableParameters' => array()
	);

	public $orders = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'indexes' => array(
			
		),
		'tableParameters' => array()
	);

	public $products = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'name' => array('type' => 'text', 'null' => true),
		'price' => array('type' => 'text', 'null' => true),
		'imported' => array('type' => 'integer', 'null' => true),
		'category_id' => array('type' => 'integer', 'null' => true),
		'indexes' => array(
			
		),
		'tableParameters' => array()
	);

}
