<style>
#modalbak{
	float:right;
  position:fixed; 
  top:0; 
  left:0; 
  width:100%;  
  height:100%;  
  background:#333333; 
  display:none; 
  opacity:0.40; 
  z-index:9;
}
#modalwin{
	float:right;
  position:fixed; 
  top:0; 
  left:0; 
  width:300px; 
  padding:20px;
  height:100px; 
  background:#FFFFFF; 
  display:none; 
  border:3px double #CCC; 
  z-index:10;
  -moz-border-radius:6px;
  -webkit-border-radius:6px; 
  -moz-box-shadow:3px 3px 6px #666;
  -webkit-box-shadow:3px 3px 6px #666; 
}
#modalmsg{ 
  text-align:center; 
}
#close
{
	font-size:22px;
	color:#900;
	width:10px;
	height:10px;
	font-weight:bold;
	margin:-30px -9px 0px 0px;	
}
#close:hover
{
	font-size:28px;
	color:#000;
	transition-duration:.5s;
	width:10px;
	height:10px;
	font-weight:bolder;
	margin:-28px -7px 0px 0px;	
}
</style>
<script>
function modalshow(){
  var width,height,padding,top,left,modalbak,modalwin;
  width   = 400;
  height  = 100;
  padding = 64;
  top     = 55;
  left    = 50;

  modalbak = document.getElementById("modalbak");
  modalbak.style.display = "block";

  modalwin = document.getElementById("modalwin");
  modalwin.style.top     = top+"px";
  modalwin.style.left    = left+"px";
  modalwin.style.display = "block";
}
function modalhide(){
  document.getElementById("modalbak").style.display = "none";
  document.getElementById("modalwin").style.display = "none";
}
</script>

    <div class="row-container">
        <div id="banner">
        	<div id="banner-logo" onclick="modalshow()">
            </div>
            <!-- model window!-->
            <div id='modalbak'></div>
            <div id='modalwin' onclick="modalhide()" style="float:right;">
              <p id='modalmsg'>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
              	<tr>
                    <td colspan="2" align="right"><div id="close">x</div></td>
                  </tr>
                  <tr>
                    <td colspan="2" class="system-heading" style="padding-bottom:50px; font-size:20px;">Hai&nbsp;(Full Name)</td>
                  </tr>
                  <tr>
                    <td align="left" style="color:#900; font-weight:bold;">Sign Out</td>
                    <td align="right" style="color:#06F; font-weight:bold;"><a href="../user/index.php">Create New Account</a></td>
                  </tr>
                    
                </table>            
              </p>
            </div>
            <!-- end here!-->
            <!--<div id="menu">
                <div class="sub-menu">
                Log Out
                </div>
                <div class="sub-menu">
                <a href="user/index.php">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right" style="margin-top:-12px;">
                      <tr>
                      	<td>Account</td>
                        <td><img src="images/user.png" /></td>
                      </tr>
                    </table>
                </a>
                </div>
            </div>!-->
        </div>
    </div>

