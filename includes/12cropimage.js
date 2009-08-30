/****************************************************************************

SVN file version:
$Id: 12cropimage.js 78 2006-12-24 02:23:47Z piotr.galas $

DHTML library from DHTMLCentral.com
*   Copyright (C) 2001 Thomas Brattli 2001
*   This script was released at DHTMLCentral.com
*   Visit for more great scripts!
*   This may be used and changed freely as long as this msg is intact!
*   We will also appreciate any links you could give us.
*
*   Made by Thomas Brattli 2001
***************************************************************************
* Modified by:   Ramin Mehran @ March 2005
* Modifications: Modified to make it compatible with Pixelpost v1.4 (Pixelpost.org)
***************************************************************************/

// Detect browser
var ua = navigator.userAgent.toLowerCase();

function detectbw(text)
{
   stringposition = ua.indexOf(text) + 1;
   data = text;
   return stringposition;
}

//Browsercheck (needed) ***************
function lib_bwcheck(){
  this.ver=navigator.appVersion
  this.agent=navigator.userAgent
  this.dom=document.getElementById?1:0
  this.opera5=this.agent.indexOf("Opera 5")>-1
  this.ie5=(this.ver.indexOf("MSIE 5")>-1 && this.dom && !this.opera5)?1:0;
  this.ie6=(this.ver.indexOf("MSIE 6")>-1 && this.dom && !this.opera5)?1:0;
  this.ie4=(document.all && !this.dom && !this.opera5)?1:0;
  this.ie=this.ie4||this.ie5||this.ie6
  this.mac=this.agent.indexOf("Mac")>-1
  this.ns6=(this.dom && parseInt(this.ver) >= 5) ?1:0;
  this.ns4=(document.layers && !this.dom)?1:0;
  this.bw=(this.ie6||this.ie5||this.ie4||this.ns4||this.ns6||this.opera5)
  return this
}
bw=new lib_bwcheck() //Browsercheck object

//Debug function ******************
function lib_message(txt)
{//alert(txt);
	return false
}

//Lib objects  ********************
function lib_obj(obj,nest)
{
  if(!bw.bw) return lib_message('Old browser')
  nest=(!nest) ? "":'document.'+nest+'.'
  this.evnt=bw.dom? document.getElementById(obj):
    bw.ie4?document.all[obj]:bw.ns4?eval(nest+"document.layers." +obj):0;
  if(!this.evnt) return lib_message('The layer does not exist ('+obj+')'
    +'- \nIf your using Netscape please check the nesting of your tags!')
  this.css=bw.dom||bw.ie4?this.evnt.style:this.evnt;
  this.ref=bw.dom||bw.ie4?document:this.css.document;
  this.x=parseInt(this.css.left)||this.css.pixelLeft||this.evnt.offsetLeft||0;
  this.y=parseInt(this.css.top)||this.css.pixelTop||this.evnt.offsetTop||0
  this.w=this.evnt.offsetWidth||this.css.clip.width||
    this.ref.width||this.css.pixelWidth||0;
  this.h=this.evnt.offsetHeight||this.css.clip.height||
    this.ref.height||this.css.pixelHeight||0
  this.c=0 //Clip values
  if((bw.dom || bw.ie4) && this.css.clip)
	{
	  this.c=this.css.clip; this.c=this.c.slice(5,this.c.length-1);
	  this.c=this.c.split(' ');
	  for(var i=0;i<4;i++){this.c[i]=parseInt(this.c[i])}
  }
  this.ct=this.css.clip.top||this.c[0]||0;
  this.cr=this.css.clip.right||this.c[1]||this.w||0
  this.cb=this.css.clip.bottom||this.c[2]||this.h||0;
  this.cl=this.css.clip.left||this.c[3]||0
  this.obj = obj + "Object"; eval(this.obj + "=this")
  return this
}

//Moving object to **************
lib_obj.prototype.moveIt = function(x,y)
{
  this.x=x;this.y=y; this.css.left=x+'px';this.css.top=y+'px';
}

//Clipping object to ******
lib_obj.prototype.clipTo = function(t,r,b,l,setwidth)
{
  this.ct=t; this.cr=r; this.cb=b; this.cl=l
  if(bw.ns4)
  {
    this.css.clip.top=t;this.css.clip.right=r
    this.css.clip.bottom=b;this.css.clip.left=l
  }
  else
  {
    if(t<0)t=0;if(r<0)r=0;if(b<0)b=0;if(b<0)b=0;
    // make it compatilbe with firefox/omniweb/safari browsers
    if (detectbw('firefox')|| detectbw('omniweb')|| detectbw('safari'))
    {
	    this.css.clip="rect("+t+"px,"+r+"px,"+b+"px,"+l+"px)";
	    if(setwidth){this.css.pixelWidth=this.css.width=r+'px';
	    this.css.pixelHeight=this.css.height=b+'px';}
  	}
  	else
  	{// Opera7/IE6/...
    	this.css.clip="rect("+t+","+r+","+b+","+l+")";
	    if(setwidth){this.css.pixelWidth=this.css.width=r;
	    this.css.pixelHeight=this.css.height=b;}
  	}
  }
}

//Drag drop functions start *******************
dd_is_active=0; dd_obj=0; dd_mobj=0
function lib_dd(){
  dd_is_active=1
  if(bw.ns4){
    document.captureEvents(Event.MOUSEMOVE|Event.MOUSEDOWN|Event.MOUSEUP)
  }
  document.onmousemove=lib_dd_move;
  document.onmousedown=lib_dd_down
  document.onmouseup=lib_dd_up
}
lib_obj.prototype.dragdrop = function(obj){
  if(!dd_is_active) lib_dd()
  this.evnt.onmouseover=new Function("lib_dd_over("+this.obj+")")
  this.evnt.onmouseout=new Function("dd_mobj=0")
  if(obj) this.ddobj=obj
}
lib_obj.prototype.nodragdrop = function(){
  this.evnt.onmouseover=""; this.evnt.onmouseout=""
  dd_obj=0; dd_mobj=0
}
//Drag drop event functions
function lib_dd_over(obj){dd_mobj=obj}
function lib_dd_up(e){dd_obj=0}
function lib_dd_down(e){ //Mousedown
  if(dd_mobj){
    x=(bw.ns4 || bw.ns6)?e.pageX:event.x||event.clientX
    y=(bw.ns4 || bw.ns6)?e.pageY:event.y||event.clientY
    dd_obj=dd_mobj
    dd_obj.clX=x-dd_obj.x;
    dd_obj.clY=y-dd_obj.y
  }
}
function lib_dd_move(e,y,rresize){ //Mousemove
  x=(bw.ns4 || bw.ns6)?e.pageX:event.x||event.clientX
  y=(bw.ns4 || bw.ns6)?e.pageY:event.y||event.clientY
  if(dd_obj){
    nx=x-dd_obj.clX; ny=y-dd_obj.clY
    if(dd_obj.ddobj) dd_obj.ddobj.moveIt(nx,ny)
    else dd_obj.moveIt(nx,ny)
  }
  if(!bw.ns4) return false
}
//Drag drop functions end *************









