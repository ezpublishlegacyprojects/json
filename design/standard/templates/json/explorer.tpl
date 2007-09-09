    <script src='/extension/json/design/standard/javascript/trimpath-template-1.0.38.js' type="text/javascript"></script>
    <script src="/extension/json/design/standard/javascript/jquery.pack.js" type="text/javascript"></script>
    <script src="/extension/json/design/standard/javascript/jquery.history_remote.js" type="text/javascript"></script>

    <script type="text/javascript">

parentnodeid={$parentnodeid};
{literal}
function formatDate (date) {
  d = new Date(date*1000);
  return d.getDay()+"/"+d.getMonth()+"/"+d.getFullYear();
}


function initTableParagraph () {
   jQuery("table.explorer").tablesorter();

}


      function initJSON () {
//        $('a.eznode').remote('#explorer tbody', {hashPrefix: 'node'},function() {alert("loaded");});
         jQuery(" .eznode").removeClass("eznode").click(function (){
             var para_node=this.href.split("/");
             var nodeid=para_node[para_node.length-1];
             $('h1#title').html(this.innerHTML);
             $('#history').append("<li><a class='eznode' href='/json/explorer/"+nodeid+"'>"+this.innerHTML+"</a>");
             $.getJSON("/json/list/"+nodeid, { owner:'1' }, displayNode);
             return false;
           });
      }

      function displayNode (nodes) {
          var html="";
//        var url= $base + node.NodeID ;
           
      for (var i = 0; i < nodes.length; i++) {
        var html = html+TrimPath.processDOMTemplate("node_jst", nodes[i]);
      }
      $('#explorer tbody').html(html);
      initJSON();
    }
 
      jQuery(function(){
if(!$.isFunction($.fn['tablesorter'])) {
  $.getScript('/design/sydesy/javascripts/jquery.tablesorter.pack.js', function() {
    initTableParagraph ();
  });
} else {
  initTableParagraph ();
}

          //jQuery.getScript('/extension/json/design/standard/javascript/trimpath-templates-r-compressed.js',function(){;});
          //jQuery.getScript('/extension/json/design/standard/javascript/trimpath-template-1.0.38.js',function(){alert('aaa');;});
//          if(!$.isFunction($.fn['rating'])) {
//            jQuery.getScript('/design/sydesy/javascripts/jquery.rating.js', function() {
        initJSON ();
        $().ajaxStart(function(){$("#loading").fadeIn();}).ajaxSuccess(function(){$("#loading").hide();});
// debug
        $('a.eznode').remote('#node', function() {alert("loaded");});
   
//        $.ajaxHistory.initialize();
//        $.ajaxHistory.initialize(function (){$.getJSON("/json/list/"+parentnodeid, {owner:1 }, displayNode)});
        //$.ajaxHistory.initialize(function (){alert("no param");});
          $('#history').append("<li><a class='eznode' href='/json/explorer/"+parentnodeid+"'>Top</a>");
          $.getJSON("/json/list/"+parentnodeid, {owner:1 }, displayNode);
      });
    </script>

<style>
#explorer_nav {float:right;background:lightgrey;width:200px;margin-left:10px;}
.Name {color:red;}
.DataMap {color:green;}
#loading {background:red;color:white;position:fixed;top:0;right:0;width:100px;padding:5px;display:none;}

</style>
  </head>
  <body>

<textarea id="node_jst" style="display:none;">
<tr>
<td><a href="/json/explorer/${NodeID}" class="eznode">${Name}</a></td>
<td>${ClassName}</td>
<td class="modified">${formatDate(ModifiedSubNode)}</td>
<td class="owner"><a href="/redirect/mainnode/${object.Owner.ID}">${object.Owner.Name}</a></td>
<td class="section$(object.SectionID">${object.SectionID}</td>
<td>
edit?
</td>
</tr>

</textarea>
<h1 id="title"></h1>
<table class="explorer" id="explorer">
<thead>
<tr>
<th>Name</th><th>type</th><th>created</th><th>Owner</th><th>Section</th><th>Tool</th>
</tr>
</th>
</tr>
</thead>
<tbody>
</tbody>
</table>


<div id="explorer_nav">
<h2>History</h2>
    <ol id='history'>
    </ol>
</div>
<div id="loading">Loading...</a>
  </body>
</html>
{/literal}
