<?php
class DonateAPI {
	private $_VERSION = "ALPHA_0.01a";
	private $_email;
	private $_item;
	private $_debug;

	public function __construct($email, $item, $debug = true) {
		$this->output("Thanks for using the Donation API developed by <a href=\"http://lynxaa.info/\">Lynxaa</a>.");
		
		if ($debug === true) {
			$this->output("Running API with debug option enabled.");
			$this->_debug = $debug;
		}

		$this->output("Version: {$this->_VERSION} <br>");

		$this->_email = $email;
		$this->_item = $item;
	}

	/**
	* Generate a basic donation form.
	* 
	* @param $return
	* 				Define your own return url.
	* @param $username
	* 				Minecraft IGN (In Game Name)
	* @param $paypal_id
	* 				Your paypal email. (or business id.)
	* @param $paypal_url (https://www.paypal.com/cgi-bin/webscr)
	* 				Usually http://paypal.com/cgi-bin/webscr or similar.
	*/
	public function generate_form($return = "./", $username, $paypal_id, $paypal_url = "https://www.paypal.com/cgi-bin/webscr") {
		$this->debug("Generating form with specified arguments...");
		$this->debug($return);
		$this->debug($username);
		$this->debug($paypal_id);
		$this->debug("<a href=\"{$paypal_url}\">" . $paypal_url . "</a>");

		$form_structure = "
			<form action=\"{$paypal_url}\" method=\"post\" id=\"donate-api_|form\">
				<input type=\"hidden\" name=\"business\" value=\"{$paypal_id}\">

				<input type=\"text\" name=\"ign\" value=\"{$username}\" />
				<input type=\"submit\" value=\"Donate\" />
			</form>
		";

		$form_structure = trim($form_structure);

		echo $form_structure;
	}

	/**
	* Automatically submit a form.
	* 
	* @param $id (use "DONATION" to submit the auto_generated form.)
	* 			The id of the form you wish to submit
	*/
	public function automatically_submit($id) {
		$this->debug("AutoForm ID: " . $id);

		if ($id === "DONATION") {
			$this->debug("Submitting generated donation form...");
			$auto_form_id = "donate-api_|form";
			$javascript = "<script type=\"text/javascript\">document.getElementById(\"{$auto_form_id}}\").submit();</script>";

			$javascript = trim($javascript);

			echo $javascript;
			return;
		}

		$javascript = "
			<script type=\"text/javascript\">
				document.getElementById(\"{$id}}\").submit();
			</script>
		";

		echo $javascript;
	}


	#Utils

	/**
	* Use echo to output an object and automatically append a new line.
	*/
	private function output($obj) {
		echo $obj . "<br>";
	}

	/**
	* Used to announce a debug string, renders on screen.
	*/
	private function debug($obj) {
		if ($this->_debug === true) {
			echo "<font color=\"RED\">[DEBUG]: </font>" . $obj . "<br>";
		}
	}
}
?>