//Change ASAP to const
class Ajax
{
    send_ajax(request, token, concat, custom_data)
    {
		if(concat == null)
			concat = "./";
		
        var data = this.get_request(request, token, custom_data);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState === 4 && this.status === 200)
            {
				///DEBUG!
				//Localhost mixes up localhost storage variable "service" due to all websites being on the same domain
                ///<--
                var JSON_= JSON.parse(this.responseText);
                if(JSON_.TYPE == 'KY')
                    c_ajax.send_ajax(request, JSON_.DATA);
                else if(JSON_.TYPE == 'EVENT')
					c_ajax.final_ajax_event(JSON_.FORM, JSON_.DATA);
				else if(JSON_.TYPE == 'APP_RESULT')
					c_ajax.final_ajax_app_result(JSON_.FORM, JSON_.DATA);
                else
					c_ajax.final_ajax(JSON_.FORM, JSON_.DATA);
				return;
            }
        };

        try
        {
			///DEBUG!
			//console.log("AJAX request in execution | " + data + "££" + concat+"sh.php" + "££");
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

    get_request(request, token, custom_data)
    {
		//console.log(custom_data);
        //Data encoded but not encrypted. Reason is there is no point in encrypting even with AES in JS. If you can see the salt value, you can easily decrypt it. Data is however HASHED in PHP.
        if(custom_data == null || custom_data == "")
			return "currentDate="+c_datetime.get_timestamp()+"&project=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("project")))) + "&service=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("service")))) + "&data=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("request")))) + "&ky=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("pwd")))) + "&user=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("user"))));
		else
			return "currentDate="+c_datetime.get_timestamp()+"&project=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("project")))) + "&service=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("service")))) + "&data=" + window.btoa(unescape(encodeURIComponent(custom_data))) + "&ky=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("pwd")))) + "&user=" + window.btoa(unescape(encodeURIComponent(c_local.get_local("user"))));
    }
    
    final_ajax_event(form, event)
    {
		if(event != 'NULL')
			document.location = './' + event;
		return;
	}
    
    final_ajax(f__, __d)
    {
		///DEBUG!
		//console.log("final_ajax");
		//<--
		if(f__ == '0')
			return;
		try
		{
			c_gui.set_item_value(f__, __d);
		}
		catch{}
		return;
	}
	
    final_ajax_app_result(f__, __d)
    {
		///DEBUG!
		//console.log("final_ajax");
		//<--
		if(f__ == '0')
			return;
		try
		{
			c_gui.set_innerhtml(f__, __d);
		}
		catch{}
		return;
	}
}

const send_ajax_files = (file) =>
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState === 4 && this.status === 200)
            {
				///DEBUG!
				//Localhost mixes up localhost storage variable "service" due to all websites being on the same domain
                ///<--
                var JSON_= JSON.parse(this.responseText);
                if(JSON_.TYPE == 'RESULT')
                {
					
				}
				return;
            }
        };

        try
        {
			///DEBUG!
			console.log("AJAX request in execution | " + file + "££" + "upload.php" + "££");
			///<--
            xmlhttp.open("POST", "./upload.php", true);
            xmlhttp.setRequestHeader('Content-type', 'multipart/form-data');
            xmlhttp.send(encodeURIComponent(file));
        }
        catch(e)
        {
            console.log("An error occured [" + e + "]");
        }
        return;
}
