<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 * @property Product $Product
 */
class Order extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Product' => array(
			'className' => 'Product',
			'joinTable' => 'order_products',
			'foreignKey' => 'order_id',
			'associationForeignKey' => 'product_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

	public $hasMany = array(
		'OrderProduct'
	);


	public function receipt($id = null){
		$order_id = isset($id) ? $id : $this->id;
		if(empty($order_id)){
			throw new Exception('"Order.id" required');
		}
		$this->Behaviors->attach('Containable');
		$this->contain(array('Product', 'Product.OrderProduct', 'Product.Category'));
		$data = $this->findById($order_id);
		$receipt = '';
		$total_sales_taxes = 0;
		$order_total = 0;
		foreach($data['Product'] as &$product){
			$item = $product['name'];
			if(is_int($product['OrderProduct']['quantity'])){
				$quantity = (int)$product['OrderProduct']['quantity'];
			}
			else {
				$quantity = (float)$product['OrderProduct']['quantity'];
			}
			$base = $product['OrderProduct']['price'] * $quantity;
			$sales_tax = $product['OrderProduct']['sales_tax'] * $quantity;
			$import_tax = $product['OrderProduct']['import_tax'] * $quantity;
			$product_total = round($base + $sales_tax + $import_tax, 2);

			$total_sales_taxes += $sales_tax + $import_tax;
			$order_total += $product_total;

			$pretty_product_total = number_format($product_total, 2);

			$receipt .= "{$quantity} {$item}: {$pretty_product_total}\n";
		}
		$pretty_sales_tax = number_format($total_sales_taxes, 2);
		$pretty_total = number_format($order_total, 2);
		$receipt .= "Sales Taxes: {$pretty_sales_tax}\n";
		$receipt .= "Total: {$pretty_total}";
		return $receipt;
	}
}
