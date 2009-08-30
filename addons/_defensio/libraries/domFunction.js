// DF1.1 :: domFunction 
// *****************************************************
// DOM scripting by brothercake -- http://www.brothercake.com/
// GNU Lesser General Public License -- http://www.gnu.org/licenses/lgpl.html
//******************************************************




//DOM-ready watcher
function domFunction(f, a)
{
	//initialise the counter
	var n = 0;
	
	//start the timer
	var t = setInterval(function()
	{
		//continue flag indicates whether to continue to the next iteration
		//assume that we are going unless specified otherwise
		var c = true;

		//increase the counter
		n++;
	
		//if DOM methods are supported, and the body element exists
		//(using a double-check including document.body, for the benefit of older moz builds [eg ns7.1] 
		//in which getElementsByTagName('body')[0] is undefined, unless this script is in the body section)
		if(typeof document.getElementsByTagName != 'undefined' && (document.getElementsByTagName('body')[0] != null || document.body != null))
		{
			//set the continue flag to false
			//because other things being equal, we're not going to continue
			c = false;

			//but ... if the arguments object is there
			if(typeof a == 'object')
			{
				//iterate through the object
				for(var i in a)
				{
					//if its value is "id" and the element with the given ID doesn't exist 
					//or its value is "tag" and the specified collection has no members
					if
					(
						(a[i] == 'id' && document.getElementById(i) == null)
						||
						(a[i] == 'tag' && document.getElementsByTagName(i).length < 1)
					) 
					{ 
						//set the continue flag back to true
						//because a specific element or collection doesn't exist
						c = true; 

						//no need to finish this loop
						break; 
					}
				}
			}

			//if we're not continuing
			//we can call the argument function and clear the timer
			if(!c) { f(); clearInterval(t); }
		}
		
		//if the timer has reached 60 (so timeout after 15 seconds)
		//in practise, I've never seen this take longer than 7 iterations [in kde 3 
		//in second place was IE6, which takes 2 or 3 iterations roughly 5% of the time]
		if(n >= 60)
		{
			//clear the timer
			clearInterval(t);
		}
		
	}, 250);
};



