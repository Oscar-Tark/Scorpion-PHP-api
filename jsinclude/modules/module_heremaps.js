const draw_HERE_suggestions = (json, destination, final_input) =>
{
	document.getElementById(destination).innerHTML = "";
	var JSONelement = JSON.parse(json);
	for(i = 0; i < 5; i++)
	{
		console.log(JSONelement.items[i]);
		if(ifnull(JSONelement.items[i]))
			break;
		draw_HERE_suggestion_box(process_HERE_location(JSONelement.items[i]), destination);
		console.log(JSONelement.items[i]);
	}
	return;
}

const draw_HERE_suggestion_box = (JSONelement, destination, final_input) =>
{
  if(!ifnull(JSONelement))
  {
	  console.log(final_input);
		document.getElementById(destination).innerHTML = '<div id="here_results_box" onclick="getElementById(\'here_maps_input\').value = \''+JSONelement+'\'; document.getElementById(\'here_results\').innerHTML=\'\';"><div class="here_suggestion"><label>'+ JSONelement + '</label></div></div>';
  }
  else
	document.getElementById(destination).innerHTML = '<div id="here_results_box"><label>Address not found</label></div>';
  return;
}

const Here = (value, destination, api_key, final_input) =>
{
  var ajaxRequest = new XMLHttpRequest();
  ajaxRequest.onreadystatechange = function()
  {
		if(this.readyState == 4 && this.status == 200)
		{
			response = this.responseText;//"'" + this.responseText + "'";
			draw_HERE_suggestions(response, destination, final_input);
		}
		//else
		//	document.getElementById(destination).innerHTML = '<div id="here_results" onclick="document.getElementById(\''+final_input+'\').value=\'Address not found\';"><label>Address not found</label></div>';
  }
  var params = '?' + 'q=' +  encodeURIComponent(value) + '&apiKey=' + api_key + "&limit=5";
  ajaxRequest.open('GET', "https://geocode.search.hereapi.com/v1/geocode" + params);
  ajaxRequest.send();
  return;
}

const process_HERE_location = (JSONelement) =>
{
  var here_location
  if(ifnull(JSONelement.address.street) || ifnull(JSONelement.address.postalCode))
	"No address found";
  else
  {
    here_location = JSONelement.address.street;
    if(!ifnull(JSONelement.address.houseNumber))
		here_location += " " + JSONelement.address.houseNumber;
    here_location += " - " + JSONelement.address.postalCode + ", " +JSONelement.address.city + " " + JSONelement.address.countryName;
  }
  return here_location;
}
