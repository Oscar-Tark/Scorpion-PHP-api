<?php
//LEGACY_OLD
//Class loads the stripe module to your page. Include the stripe module in the correct path ./phpinclude/modules/stripe-checkout.php
class Stripe
{
	function __construct($project)
	{
		$path = "./phpinclude/modules/stripe-checkout-session.php";
		include_once($path);
		return;
	}
}
