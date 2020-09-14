class Localvariables
{
	set_local(name, value)
	{
		localStorage.setItem(name, value);
		return;
	}

	get_local(name)
	{
		return localStorage.getItem(name);
	}
}