const draw_HERE_suggestions = (JSONelement, destination, final_input) =>
{
  document.getElementById(destination).innerHTML = "";
  for(i = 0; i < 5; i++)
  {
    if(ifnull(JSONelement.suggestions[i]))
		break;
    draw_HERE_suggestion_box(process_HERE_location(JSONelement.suggestions[i]), destination);
  }
  return;
}

const draw_HERE_suggestion_box = (JSONelement, destination, final_input) =>
{
  if(!ifnull(JSONelement))
  {
    document.getElementById(destination).innerHTML = '<div id="here_results_box" onclick="set_item_value(\''+final_input+'\', \''+JSONelement+'\'); clear_innerHTML(\'here_results\');"><label>'+ JSONelement + '</label></div>';
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
    if(this.readyState === 4 && this.status === 200)
		draw_HERE_suggestions(getJSON(this.responseText), destination, final_input);
    else
		document.getElementById(destination).innerHTML = '<div id="here_results" onclick="document.getElementById(\''+final_input+'\').value=\'Address not found\';"><label>Address not found</label></div>';
  }
  var params = '?' + 'q=' +  encodeURIComponent(value) + '&apiKey={' + api_key + '}';
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
    here_location += " - " + JSONelement.address.postalCode + ", " +JSONelement.address.city + " " + JSONelement.address.country;
  }
  return here_location;
}
