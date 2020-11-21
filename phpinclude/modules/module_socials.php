<?php
class Facebook
{
	function share_button($url)
	{
		return '<div id="fb-root"></div><script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="TORKfQGD"></script><div class="fb-share-button" data-href="'.$url.'" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Condividi</a></div>';
	}
}

class Twitter
{
	function share_button()
	{
		return '<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';
	}
}

class Pinterest
{
	function share_button()
	{
		echo '<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>';
		return '<a href="https://www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-tall="true"></a>';
	}
}
?>
