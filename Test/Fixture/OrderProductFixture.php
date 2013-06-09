<?php
/**
 * OrderProductFixture
 *
 */
class OrderProductFixture extends CakeTestFixture {
/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => true, 'length' => 11, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => true),
		'product_id' => array('type' => 'integer', 'null' => true),
		'quantity' => array('type' => 'float', 'null' => true),
		'price' => array('type' => 'float', 'null' => true),
		'taxes' => array('type' => 'float', 'null' => true),
		'indexes' => array(
			
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'order_id' => 1,
			'product_id' => 1,
			'quantity' => 1,
			'price' => 1.00,
			'taxes' => 0.10
		),
	);

}
