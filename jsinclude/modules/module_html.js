class GUI
{
    ncount()
    {
        this.set_innerhtml("ncount", this.get_input_length("name"));
    }

    get_input_length(input)
    {
        return this.get_item(input).value.length;
    }

    get_item(name)
    {
        return document.getElementById(name);
    }
    
    get_item_value(name)
    {
		return document.getElementById(name).value;
	}
	set_item_value(name, value)
	{
		c_gui.get_item(name).value = value;
		return;
	}

    set_innerhtml(destination, html)
    {
        document.getElementById(destination).innerHTML = html;
        return;
    }

    set_addition_innerhtml(destination, html)
    {
        document.getElementById(destination).innerHTML += html;
        return;
    }
}