<html>
<head>
<script>nereidFadeObjects=new Object();nereidFadeTimers=new Object();function nereidFade(object,destOp,rate,delta){if(!document.all)
return
if(object!="[object]"){
setTimeout("nereidFade("+object+","+destOp+","+rate+","+delta+")",0);return;}clearTimeout(nereidFadeTimers[object.sourceIndex]);diff=destOp-object.filters.alpha.opacity;direction=1;if(object.filters.alpha.opacity>destOp){direction=-1;}delta=Math.min(direction*diff,delta);object.filters.alpha.opacity+=direction*delta;if(object.filters.alpha.opacity!=destOp){nereidFadeObjects[object.sourceIndex]=object;nereidFadeTimers[object.sourceIndex]=setTimeout("nereidFade(nereidFadeObjects["+object.sourceIndex+"],"+destOp+","+rate+","+delta+")",rate);}}
</script>
<title></title>
<style type="text/css">
<!--

#home {
     width: 150px;
     height: 37px;
     float: left;
     padding: 0 5px;
     cursor: pointer;
     border: 1px solid #ccc;
     }

.out {
     background: transparent url(../images/home.gif) no-repeat;
     }

.over {
     background: transparent url(../images/homeover.gif) no-repeat;
	 background-color:#663300;
	 font-family:"Microsoft Sans Serif"; font-size:10pt; color:#FFFFFF;
     }


//-->
</style>
</head>
<body>

<div id="home" class="out" onMouseOver="this.className='over'" onMouseOut="this.className='out'" style="filter:alpha(opacity=10)" onmouseover="nereidFade(this,100,30,5)" onmouseout="nereidFade(this,10,50,5)">test
</div>

</body>
</html>