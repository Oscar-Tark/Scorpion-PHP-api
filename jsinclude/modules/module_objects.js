var c_ajax = new Ajax();
var c_data = new Data();
var c_datetime = new Datetime();
var c_gui = new GUI();
var c_local = new Localvariables();
var c_copy = new Copy();

var c_contain = {
    //Not putting: new Ajax() as everytime I'd access i'd be creating a new instance
    c_ajax : null,
    c_data : null,
    c_datetime : null,
    c_gui : null,
    c_local : null
};

var ky = [];

function instantiator()
{
    //create new
}

function object_handler()
{
    //work on
}

function ifnull(value)
{
    if(value == "" || value == undefined || value == null)
        return true;
    return false;
}
