//Setup function
function mouseMoved()
{
    //alert('moved JS: '+document.referrer);
    
    //Get Referer
    referer=document.referrer;
    
    //Setup ajax request
    xmlhttp=new XMLHttpRequest();
    
    //Setup ready function
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState===4 && xmlhttp.status===200)
        {
            output=xmlhttp.responseText;
            document.getElementById("simpleCounterJS").innerHTML=output;
        }
      };    
  
    //Send Data
    xmlhttp.open("GET","counter/counter.php?r="+referer,true);
    xmlhttp.send();
        
    //Disable events
    document.onmousemove=null;  
    document.ontouchmove=null;  
    
}

//Call function when something moves
document.onmousemove=mouseMoved;
document.ontouchmove=mouseMoved;

