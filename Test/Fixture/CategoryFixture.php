<?php
/**
 * CategoryFixture
 *
 */
class CategoryFixture extends CakeTestFixture {
	public $import = 'Category';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'name' => array('type' => 'text', 'null' => true),
		'taxable' => array('type' => 'integer', 'null' => true),
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
			'name' => 'books',
			'taxable' => 0
		),
		array(
			'id' => 2,
			'name' => 'food',
			'taxable' => 0
		),
		array(
			'id' => 3,
			'name' => 'medical products',
			'taxable' => 0
		),
		array(
			'id' => 4,
			'name' => 'music',
			'taxable' => 1
		),
		array(
			'id' => 5,
			'name' => 'beauty products',
			'taxable' => 1
		),

	);

}
