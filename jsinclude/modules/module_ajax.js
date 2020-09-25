class Ajax
{
    send_ajax(request, token, concat)
    {
		if(concat == null)
			concat = "./";
		
        var data = this.get_request(request, token);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState === 4 && this.status === 200)
            {
                console.log("Response ["+c_datetime.get_timestamp()+"]: " + this.responseText);
                var JSON_= JSON.parse(this.responseText);
                if(JSON_.TYPE == 'KY')
                    c_ajax.send_ajax(request, JSON_.DATA);
                else
					c_ajax.final_ajax(JSON_.FORM, JSON_.DATA);
            }
        };

        try
        {
			///DEBUG!
			console.log("AJAX request in execution | " + data + "££" + concat+"sh.php" + "££");
			///<--
            xmlhttp.open("POST", concat + "sh.php", true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send(data);
        }
        catch(e)
        {
            console.log("An error occured [" + e + "]");
        }
        return;
    }

    get_request(request, token)
    {
        //Data encoded but not encrypted. Reason is there is no point in encrypting even with AES in JS. If you can see the salt value, you can easily decrypt it. Data is however HASHED in PHP.
        return "currentDate="+c_datetime.get_timestamp()+"&project=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("project")))) + "&service=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("service")))) + "&data=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("request")))) + "&ky=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("pwd")))) + 
        "&user=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("user"))));
    }
    
    final_ajax(form, data)
    {
		if(form == '0')
			return;
		c_gui.set_item_value(form, data);
		return;
	}
}
