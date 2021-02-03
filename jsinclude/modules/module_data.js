class Data
{
    constructor(){}
    to_JSON(entry_string)
    {
        return JSON.stringify(entry_string);
    }
}

const check_email = (email, control) =>
{
	var test = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
	if(ifnull(control))
		return test;
	if(test == false)
	{
		document.getElementById(control).value="";
		document.getElementById(control).placeholder="Wrong email address, please enter a correct email address";
	}
	return;
}
