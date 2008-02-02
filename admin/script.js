// SVN file version:
// $Id$

flag = false;

function flip(rid)
{
    current=(document.getElementById(rid).style.display == 'none') ? 'block' : 'none';
    document.getElementById(rid).style.display = current;
}

function hide(rid)
{
    document.getElementById(rid).style.display = 'none';
}

function ondatechange()
{
	var a=document.getElementById("specificdate");
	a.checked = true;
}

function invertselection(form)
{
	for (i = 0, n = form.elements.length; i < n; i++)
	{
		if(form.elements[i].type == "checkbox")
		{
			form.elements[i].checked = !form.elements[i].checked;
		}
	}
}

function checkAll(form)
{
	flag = ((flag == false) ? true : false);
	for (i = 0, n = form.elements.length; i < n; i++)
	{
		if(form.elements[i].type == "checkbox")
		{	
				form.elements[i].checked = flag;
		}
	}
}

function checkUncheckAll(theElement)
{
	var theForm = theElement.form, z = 0;
	for(z=0; z<theForm.length;z++)
	{
		if(theForm[z].type == 'checkbox' && theForm[z].name != 'checkall')
		{
			theForm[z].checked = theElement.checked;
		}
	}
}

/**
 * Datetime preview AJAX request
 *
 */
function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}

var http = createRequestObject();

function previewDT() {
	var dt = document.templateopt.new_dateformat.value;

    http.open('get', '../includes/ajax_request.php?format='+dt+'&request=dateformat');
    http.onreadystatechange = handleResponse;
    http.send(null);
}

function handleResponse() {
    if(http.readyState == 4){
        var response = http.responseText;
        var update = new Array();

        if(response.indexOf('|' != -1)) {
            update = response.split('|');
            document.getElementById(update[0]).innerHTML = update[1];
        }
    }
}