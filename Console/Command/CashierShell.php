<?php
App::uses('Shell', 'Console');

/**
 * Cashier Shell
 *
 * @package       app.Console.Command
 */
class CashierShell extends AppShell {
	public $run = true;
	public function main(){
		$this->out(__d('cake_console', 'Cash Register App'));
		$this->hr();
		$this->Product = ClassRegistry::init('Product');
		$this->Order = ClassRegistry::init('Order');
		$products = $this->Product->find('all');
		$product_ids = array();
		$listing = '';
		foreach($products as &$product){
			$product_ids[] = $product['Product']['id'];
			$pretty_price = number_format($product['Product']['price'], 2);
			$listing .= sprintf("[%d]. %s (%s)", $product['Product']['id'], $product['Product']['name'], $pretty_price) . "\n";
		}
		$order_products = array();
		while($this->run){
			$quantity = $this->in('Qty (0 to complete order; empty order = quit):', null, 0);
			if($quantity == 0){
				if(count($order_products) == 0){
					$this->run = false;
					continue;
				}
				$this->Order->create();
				$this->Order->save();
				$order_id = $this->Order->id;
				foreach($order_products as &$order_product){
					list($quantity, $product_id, $price) = $order_product;
					$this->Order->OrderProduct->create();
					$data = $this->Order->OrderProduct->save(array('OrderProduct' => array('product_id' => $product_id, 'order_id' => $order_id, 'quantity' => $quantity, 'price' => $price)));
				}
				$this->hr();
				$this->out("* * * Order #{$order_id}'s receipt * * *");
				$this->out($this->Order->receipt());
				$this->hr();
				$order_products = array();
				continue;
			}
			$this->out('-- Available products --');
			$this->out($listing);
			$product_id = $this->in('Product:', $product_ids);
			$product = $this->Product->findById($product_id);
			$default_price = $product['Product']['price'];
			$price = $this->in("Price ({$product['Product']['name']}):", null, $default_price);
			$this->hr();
			$this->out("{$quantity} {$product['Product']['name']} at {$price}");
			$this->hr();
			$order_products[] = array($quantity, $product_id, $price);
		}
		$this->out(__d('cake_console', 'Thank you! Come again!'));
	}
}
