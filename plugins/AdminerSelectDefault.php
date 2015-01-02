<?php

/**
 * Customize select table defaults.
 *
 * @author Beorn Facchini
 */
class AdminerSelectDefault {
	/**
	 * @param string Max limit of results.
	 * @param string Max length of text.
	 * @param string Default sort order.
	 */
	function AdminerSelectDefault($limit, $length, $order) {
		$this->limit = $limit;
		$this->length = $length;
		$this->order = $order;
	}

	function selectLimitProcess() {
		return (isset($_GET["limit"]) ? $_GET["limit"] : $this->limit);
	}

	function selectLengthProcess() {
		return (isset($_GET["text_length"]) ? $_GET["text_length"] : $this->length);
	}

	function selectOrderProcess($fields, $indexes) {
		return (isset($_GET["order"]) ? Adminer::selectOrderProcess($fields, $indexes) : array($this->order));
	}

	function selectOrderPrint($order, $columns, $indexes) {
		$order = (isset($_GET["order"]) ? $order : false);
		Adminer::selectOrderPrint($order, $columns, $indexes);
		return false;
	}
}
