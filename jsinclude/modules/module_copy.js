class Copy
{
	function myFunction(input)
	{
		var copyText = document.getElementById(input);
		copyText.select();
		copyText.setSelectionRange(0, 99999); /*For mobile devices*/
		document.execCommand("copy");
		return;
	}
}
