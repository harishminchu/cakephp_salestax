<?php
App::uses('AppModel', 'Model');
/**
 * OrderProduct Model
 *
 * @property Order $Order
 * @property Product $Product
 */
class OrderProduct extends AppModel {
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	const SALES_TAX = 0.1;
	const IMPORT_TAX = 0.05;

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeSave(){
		parent::beforeSave();
		file_put_contents('/tmp/beforeSave', 'foo');
		$product = $this->Product->findById($this->data['OrderProduct']['product_id']);
		if(!isset($this->data['OrderProduct']['price'])){
			$base = $product['Product']['price'];
			$this->data['OrderProduct']['price'] = $base;
		}
		else {
			$base = $this->data['OrderProduct']['price'];
		}
		$sales_tax = 0;
		$import_tax = 0;
		if($product['Category']['taxable'] == 1){
			$sales_tax = $base * self::SALES_TAX;
		}
		if($product['Product']['imported'] == 1){
			$import_tax = $base * self::IMPORT_TAX;
		}
		$this->data['OrderProduct']['sales_tax'] = round($sales_tax, 4);
		$this->data['OrderProduct']['import_tax'] = round($import_tax, 4);
		return true;
	}
}
