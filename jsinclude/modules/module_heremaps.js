const draw_HERE_suggestions = (JSONelement, destination) =>
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

const draw_HERE_suggestion_box = (JSONelement, destination) =>
{
  if(!ifnull(JSONelement))
  {
    JSONelement = JSONelement.replace(/<mark>/g, "");
    JSONelement = JSONelement.replace(/<\/mark>/g, "");
    document.getElementById(destination).innerHTML = '<div id="here_results_box" onclick="set_item_value(\''+destination+'\', \''+JSONelement+'\'); clear_innerHTML(\'here_results\');"><label>'+ JSONelement + '</label></div>';
  }
  return;
}

const Here = (value, destination) =>
{
  var ajaxRequest = new XMLHttpRequest();
  ajaxRequest.onreadystatechange = function()
  {
    if(this.readyState === 4 && this.status === 200)
    {
      draw_HERE_suggestions(getJSON(this.responseText), destination);
      console.log(this.responseText);
    }
    else
		console.log(this.responseText);
  }
  var params = '?' +
        'query=' +  encodeURIComponent(value) +
        '&beginHighlight=' + encodeURIComponent('<mark>') + 
        '&endHighlight=' + encodeURIComponent('</mark>') + 
        '&maxresults=5' + 
        '&app_id=' + "VyiSWaS7dLmqLRiVamE5" +
        '&app_code=' + "CAw_U-6oF5J-e6bk_ElQDg";
  ajaxRequest.open('GET', "https://autocomplete.geocoder.api.here.com/6.2/suggest.json" + params);
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
