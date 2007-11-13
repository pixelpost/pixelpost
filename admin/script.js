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