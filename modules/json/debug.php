<html>
  <head>
    <title>Demo JSON+JQuery by sydesy</title>
    <script src="/extension/json/design/standard/javascript/jquery.pack.js" type="text/javascript"></script>
    <!--script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script-->

    <script type="text/javascript">

	function dump(arr,level) {
        if (arr=="") return "";
	var dumped_text = "";
	if(!level) { level = 0;
	  var dumped_text = "<ul>";
        }
	//The padding given at the beginning of the line.
	var level_padding = "";
	for(var j=0;j<level+1;j++) level_padding += "    ";
	if(typeof(arr) == 'object') { //Array/Hashes/Objects
	 for(var item in arr) {
	  var value = arr[item];
	 
	  if(typeof(value) == 'object') { //If it is an array,
	   dumped_text += level_padding + "<li><i class='"+item +"'>" +item + "</i> ...</li>\n";
	   dumped_text += "<ul>"+dump(value,level+1)+"</ul>";
	  } else {
	   dumped_text += level_padding + "<li><i class='"+item +"'>" + item + "</i> => " + value + "</li>\n";
	  }
	 }
	} else { //Stings/Chars/Numbers etc.
	 dumped_text = "<br/>===>"+arr+"<===("+typeof(arr)+")";
	}
	return dumped_text+"</li>";
	} 

      $base = "/json/node/";

      function displayNode (node) {
        var url= $base + node.NodeID ;
        $('#history').append("<li><a class='eznode' href='"+url+"'>"+node.Name+"</a>");
        $("#node").html("<h1>"+node.Name +"</h1><h2>Navigation: <a class='ezchildren' id='down' href='/json/list/"+ node.NodeID  +"'>[down]</a>&nbsp;<a class='eznode' href='/json/node/"+ node.ParentNodeID +"'>[up]</a></h2>"
    
          +dump(node));
        initJSON ();
        return false;
      }

      function displayList (list) {

        var html="<h1>List</li>";
        var url="";
        if (list.length == 0 ) {
          $('#down').parent().html("<span class='Name'>Don't you think you've sunk deep enough ? (no sub-items)</span>");
          return;
        }

        for (var i = 0; i < list.length; i++) {
             url= $base + list[i].NodeID ;
            html += "<h2><a class='eznode' href='" + url+ "'>"+list[i].Name+"</a></h2> <h3><a id='down' class='ezchildren' href='/json/list/"+ list[i].NodeID  +"'>[down]</a></h3>"+dump(list[i]);
           
        }
        $("#node").html(html);
        
        initJSON ();
        return false;
      }

      function initJSON () {
         jQuery(" .eznode").removeClass("eznode").click(function (){
             $.getJSON(this.href, { datamap: "1" }, displayNode);
             return false;
           });
         jQuery(" .ezchildren").removeClass("ezchildren").click(function (){
             $('#history').append("<li><a class='ezchildren' href='"+this.href+"'>"+this.innerHTML+"</a>");
             $.getJSON(this.href, {}, displayList);
             $(this).css("cursor",'wait');
             return false;
           });
      }
 
      jQuery(function(){
        initJSON ();
        $().ajaxStart(function(){$("#loading").fadeIn();}).ajaxSuccess(function(){$("#loading").hide();});
// debug             $.getJSON("/json/node/2", {owner:1 }, displayNode);
      });
    </script>

<style>
#nav {float:right;background:lightgrey;width:200px;margin-left:10px;}
.Name {color:red;}
.DataMap {color:green;}
#loading {background:red;color:white;position:fixed;top:0;right:0;width:100px;padding:5px;display:none;}

</style>
  </head>
  <body>
<div id="nav">
<h2>History</h2>
    <ol id='history'>
    </ol>
</div>
<h1>Jquery+json demo</h1>
    <div>Everything is pure html on this page but you can browse all the content of the website without leaving this page, and it works like magic. <br/>
	<div id="node">
Well, assuming you find XMLHttpRequest+json magic, of course. <br/>
<h2>How does it work ?</h2>
Jquery (a 20k javascript library) replaces all the links on this page by a XMLHttpRequest. When you clic on the links, it queries a new json module on the server, get the data in a json format, adds the link in the history and display crudely the JSON received</div>
So far, I've two methods on the server available:
<ul>
<li><a href="/json/node/2" class="eznode">View a node (and the datamap)</a></li>
<li><a class="ezchildren" href="/json/list/2">List the sub-items</a></li>
</ul>
Each of them has two parameters allowing to get the datamap or the owner
<br/>
Of course, they are plenty of things to improve on the server side and having some extra js methods tailored to ez on the client part won't hurt either. Feel free to contact me ... and thanks for offering your help!
<h2>Benefits ?</h2>
On my local network, I'm around 100ms to retrieve a list of nodes and their datamaps. With jQuery, That's quite easy to manipulate the Json to alter a real page. Beside that, mention that now ez is ajax ready (tm) and you're buzzword compliant.
    </div>

	</div>
<div id="loading">Loading...</a>
  </body>
</html>
<?php
eZExecution::cleanExit();
?>

