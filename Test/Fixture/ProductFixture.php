<?php
/**
 * ProductFixture
 *
 */
class ProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'name' => array('type' => 'text', 'null' => true),
		'price' => array('type' => 'float', 'null' => true),
		'imported' => array('type' => 'integer', 'null' => true),
		'category_id' => array('type' => 'integer', 'null' => true),
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
			'id' => 1,
			'name' => 'book',
			'price' => 12.49,
			'imported' => 0,
			'category_id' => 1
		),
		array(
			'id' => 2,
			'name' => 'chocolate bar',
			'price' => 0.85,
			'imported' => 0,
			'category_id' => 2
		),
		array(
			'id' => 3,
			'name' => 'imported box of chocolates',
			'price' => 10.00,
			'imported' => 1,
			'category_id' => 2
		),
		array(
			'id' => 4,
			'name' => 'box of imported chocolates',
			'price' => 11.25,
			'imported' => 1,
			'category_id' => 2
		),
		array(
			'id' => 5,
			'name' => 'packet of headache pills',
			'price' => 9.75,
			'imported' => 0,
			'category_id' => 3
		),
		array(
			'id' => 6,
			'name' => 'music cd',
			'price' => 14.99,
			'imported' => 0,
			'category_id' => 4
		),
		array(
			'id' => 7,
			'name' => 'imported bottle of perfume',
			'price' => 47.50,
			 'imported' => 1,
			'category_id' => 5
		),
		array(
			'id' => 8,
			'name' => 'bottle of perfume',
			'price' => 18.99,
			'imported' => 0,
			'category_id' => 5
		 ),
	);

}
