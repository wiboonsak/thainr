<?php session_start();?>
<?php
			if($_POST['action']=='AddRegister'){
					require_once 'securimage.php';
					  $image = new Securimage();
					   if ($image->check($_POST['code']) == true) { 
					   
					   require_once("../control/config.inc.php");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
				$link = mysql_connect($cfgServers['host'],$cfgServers['stduser'],$cfgServers['stdpass'])or die("Can't connect Server");
				mysql_select_db($cfgServers['selectdb']) or die("Can't connect databases");
				//---------------------------------------------------------------------------------------------------------------------------------------------------
					   
					   $_POST['date_regis']=date("Y-m-d H:i:s");
					   $_POST['member_type']=$_GET['MF'];
					    $query="INSERT INTO `tbl_thainr_member` (`id` ,`name` ,`organize` ,`email` ,`password` ,`occupation` ,`country` ,`date_regis` ,`member_type` ,`reciveNewsletter` ) "
						." VALUES "
						." (  '' , '".$_POST['name']."', '".$_POST['organize']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['occupation']."', '".$_POST['country']."', '".$_POST['date_regis']."', '".$_POST['member_type']."', '1'
)";
						if(mysql_query($query)){ ?>
							 <script language="javascript">
                                        alert('สมัครสมาชิกเรียบร้อยค่ะ');
										window.close();
                        </script>
					<?php		}
						
					   
					   }else{ ?>
						 <script language="javascript">
                                        alert('กรุณาใส่รหัสภาพให้ตรงด้วยค่ะ');
                        </script>
		 
				<?php 
						   
						   }
				}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>สมัครรับข่าวสาร</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    $(window).load(function() {
            $('#slider').nivoSlider({
                controlNav:true,
                effect:'fade',
				animSpeed:500,
				pauseTime:4000
            });
			
		
            
    });
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script> 
<script> 
$(document).ready(function(){
$('#email').keyup(username_check);
});
	
function username_check(){	
var username = $('#email').val();
if(username == "" || username.length < 4){
	$('#email').css('border', '1px #CCC solid');
	$('#tick').hide();
	$('#cross').fadeIn();
	document.regisForm.userpass.value=0;
}else{
 
jQuery.ajax({
   type: "POST",
   url: "check.php",
   data: 'username='+ username,
   cache: false,
   success: function(response){
			if((response == 1) || (response > 1)){
				$('#email').css('border', '1px #C33 solid');	
				$('#tick').hide();
				$('#cross').fadeIn();
				document.regisForm.userpass.value=0;
			}else{
				$('#email').css('border', '1px #090 solid');
				$('#cross').hide();
				$('#tick').fadeIn();
				document.regisForm.userpass.value=1;
			}
		}
	});
   }
}
</script>
<script>



function loadurl(url){
////window.creator.location=url
window.close()
}
</script><style>
#email{
	border:1px #CCC solid;
}

#tick{display:none}
#cross{display:none}
</style>

<script language="javascript">
		 function FormValid(){
			 
			   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				var address = document.regisForm.email.value;
				 

			  if(document.regisForm.name.value==""){
				alert('กรุณาใส่ชื่อ');
				document.regisForm.name.focus();
				return false;
			}else   if(document.regisForm.organize.value==""){
				alert('กรุณาใส่หน่วยงาน');
				document.regisForm.organize.focus();
				return false;
			}else   if(document.regisForm.occupation.value==""){
				alert('กรุณาใส่อาชีพ');
				document.regisForm.occupation.focus();
				return false;
			}else   if(document.regisForm.email.value==""){
				alert('กรุณาใส่อีเมล์');
				document.regisForm.email.focus();
				return false;			
			}else   if(document.regisForm.password.value==""){
				alert('กรุณาใส่รหัสผ่าน');
				document.regisForm.password.focus();
				return false;				
			}else if(document.regisForm.password.value.length < 6){
					alert('รหัสผ่านอย่างน้อย 6 ตัวอักษร');
					document.regisForm.password.focus();
					return false;
		 
			}else if(reg.test(address) == false) {
				  alert('อีเมล์ไม่ถูกต้อง');
				  document.regisForm.email.focus();
				  return false;
			}else 	if(document.regisForm.userpass.value==0){
				alert('กรุณาตรวจเช็คอีเมล์');
				document.regisForm.email.focus();
				return false;
			}else 	if(document.regisForm.code.value==""){
				alert('กรุณาใส่รหัสภาพ');
				document.regisForm.code.focus();
				return false;				
				
		 	}else{
						document.regisForm.action.value='AddRegister';
						//document.regisForm.submit();
				}
		}

</script>
</head>

<body>

 <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="regisForm" onSubmit="return FormValid()">
   		 <table width="80%" border="0" align="center" cellpadding="6" cellspacing="0" class="radius10">
      <tr>
        <td height="67" colspan="2" align="left" class="txt-blue"><span class="h-catalog"><img src="images/header-newsletter.jpg" width="269" height="104" /><br />
        กรุณากรอกแบบฟอร์มด้านล่าง เพื่อรับวารสารจากเรา ข้อมูลทั้งหมดจะถูกเก็บไว้เป็นความลับและไม่ถูกเปิดเผยให้แก่บุคคลอื่น</span>
          <input type="hidden" name="action" id="action" />
          <input name="userpass" type="hidden"  id="userpass">
          </td>
        </tr>
      <tr>
        <td align="right" class="news">&nbsp;</td>
        <td width="74%" align="left">&nbsp;</td>
      </tr>
      <tr>
        <td width="26%" height="41" align="right" class="news"><strong>ชื่อ-นามสกุล<br />
        Name-Surname</strong></td>
        <td align="left"><input name="name" type="text" id="name" size="50" class="radius_green" /> <span class="txt-red">*</span></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#FFFFFF" class="news"><strong>หน่วยงาน<br />
          Company
        </strong></td>
        <td align="left" bgcolor="#FFFFFF"><input name="organize" type="text" id="organize" size="50"  class="radius_green"/> <span class="txt-red">*</span></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#FFFFFF" class="news"><strong>อาชีพ <br />
          Occupation</strong></td>
        <td align="left" bgcolor="#FFFFFF"><input name="occupation" type="text" id="occupation" size="50" class="radius_green"/> <span class="txt-red">*</span></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#FFFFFF" class="news"><strong>ประเทศ<br />Country
        <br />
        </strong></td>
        <td align="left" bgcolor="#FFFFFF">
          <select id="country" name="country"  class="radius_green">
            <option  value="Afghanistan"> Afghanistan (افغانستان) </option>
            <option  value="Aland Islands"> Aland Islands </option>
            <option  value="Albania"> Albania (Shqipëria) </option>
            <option  value="Algeria"> Algeria (الجزائر) </option>
            <option  value="American Samoa"> American Samoa </option>
            <option  value="Andorra"> Andorra </option>
            <option  value="Angola"> Angola </option>
            <option  value="Anguilla"> Anguilla </option>
            <option  value="Antarctica"> Antarctica </option>
            <option  value="Antigua and Barbuda"> Antigua and Barbuda </option>
            <option  value="Argentina"> Argentina </option>
            <option  value="Armenia"> Armenia (Հայաստան) </option>
            <option  value="Aruba"> Aruba </option>
            <option  value="Australia"> Australia </option>
            <option  value="Austria"> Austria (Österreich) </option>
            <option  value="Azerbaijan"> Azerbaijan (Azərbaycan) </option>
            <option  value="Bahamas"> Bahamas </option>
            <option  value="Bahrain"> Bahrain (البحرين) </option>
            <option  value="Bangladesh"> Bangladesh (বাংলাদেশ) </option>
            <option  value="Barbados"> Barbados </option>
            <option  value="Belarus"> Belarus (Белару́сь) </option>
            <option  value="Belgium"> Belgium (België) </option>
            <option  value="Belize"> Belize </option>
            <option  value="Benin"> Benin (Bénin) </option>
            <option  value="Bermuda"> Bermuda </option>
            <option  value="Bhutan" > Bhutan (འབྲུག་ཡུལ) </option>
            <option  value="Bolivia"> Bolivia </option>
            <option  value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
            <option  value="Botswana"> Botswana </option>
            <option  value="Bouvet Island"> Bouvet Island </option>
            <option  value="Brazil"> Brazil (Brasil) </option>
            <option  value="British Indian Ocean Territory"> British Indian Ocean Territory </option>
            <option  value="Brunei"> Brunei (Brunei Darussalam) </option>
            <option  value="Bulgaria"> Bulgaria (България) </option>
            <option  value="Burkina Faso"> Burkina Faso </option>
            <option  value="Burundi"> Burundi (Uburundi) </option>
            <option  value="Cambodia"> Cambodia (Kampuchea) </option>
            <option  value="Cameroon" > Cameroon (Cameroun) </option>
            <option  value="Canada"> Canada </option>
            <option  value="Cape Verde"> Cape Verde (Cabo Verde) </option>
            <option  value="Cayman Islands"> Cayman Islands </option>
            <option  value="Central African Republic"> Central African Republic </option>
            <option  value="Chad"> Chad (Tchad) </option>
            <option  value="Chile"> Chile </option>
            <option  value="China"> China (中国) </option>
            <option  value="Christmas Island"> Christmas Island </option>
            <option  value="Cocos Islands"> Cocos Islands </option>
            <option  value="Colombia"> Colombia </option>
            <option  value="Comoros"> Comoros (Comores) </option>
            <option  value="Congo"> Congo </option>
            <option  value="CD"> Congo, Democratic Republic </option>
            <option  value="Cook Islands"> Cook Islands </option>
            <option  value="Costa Rica"> Costa Rica </option>
            <option  value="Côte d'Ivoire"> Côte d&#39;Ivoire </option>
            <option  value="Croatia"> Croatia (Hrvatska) </option>
            <option  value="Cuba"> Cuba </option>
            <option  value="Cyprus"> Cyprus (Κυπρος) </option>
            <option  value="Czech Republic"> Czech Republic (Česko) </option>
            <option  value="Denmark"> Denmark (Danmark) </option>
            <option  value="Djibouti"> Djibouti </option>
            <option  value="Dominica"> Dominica </option>
            <option  value="Dominican Republic"> Dominican Republic </option>
            <option  value="Ecuador"> Ecuador </option>
            <option  value="Egypt"> Egypt (مصر) </option>
            <option  value="El Salvador"> El Salvador </option>
            <option  value="Equatorial Guinea" > Equatorial Guinea </option>
            <option  value="Eritrea"> Eritrea (Ertra) </option>
            <option  value="Estonia"> Estonia (Eesti) </option>
            <option  value="Ethiopia"> Ethiopia (Ityop&#39;iya) </option>
            <option  value="Falkland Islands"> Falkland Islands </option>
            <option  value="Faroe Islands"> Faroe Islands </option>
            <option  value="Fiji"> Fiji </option>
            <option  value="Finland"> Finland (Suomi) </option>
            <option  value="France"> France </option>
            <option  value="French Guiana"> French Guiana </option>
            <option  value="French Polynesia"> French Polynesia </option>
            <option  value="French Southern Territories"> French Southern Territories </option>
            <option  value="Gabon"> Gabon </option>
            <option  value="Gambia"> Gambia </option>
            <option  value="Georgia"> Georgia (საქართველო) </option>
            <option  value="Germany"> Germany (Deutschland) </option>
            <option  value="Ghana"> Ghana </option>
            <option  value="Gibraltar"> Gibraltar </option>
            <option  value="Greece"> Greece (Ελλάς) </option>
            <option  value="Grenada"> Grenada </option>
            <option  value="Guadeloupe"> Guadeloupe </option>
            <option  value="Guam"> Guam </option>
            <option  value="Guatemala"> Guatemala </option>
            <option  value="Guernsey"> Guernsey </option>
            <option  value="Guinea"> Guinea (Guinée) </option>
            <option  value="Guinea-Bissau"> Guinea-Bissau (Guiné-Bissau) </option>
            <option  value="Guyana"> Guyana </option>
            <option  value="Haiti"> Haiti (Haïti) </option>
            <option  value="Heard Island and McDonald Islands"> Heard Island and McDonald Islands </option>
            <option  value="Honduras"> Honduras </option>
            <option  value="Hong Kong"> Hong Kong </option>
            <option  value="Hungary"> Hungary (Magyarország) </option>
            <option  value="Iceland"> Iceland (Ísland) </option>
            <option  value="India"> India </option>
            <option  value="Indonesia"> Indonesia </option>
            <option  value="Iran"> Iran (ایران) </option>
            <option  value="Iraq"> Iraq (العراق) </option>
            <option  value="Ireland"> Ireland </option>
            <option  value="Isle of Man"> Isle of Man </option>
            <option  value="Israel"> Israel (ישראל) </option>
            <option  value="Italy"> Italy (Italia) </option>
            <option  value="Jamaica"> Jamaica </option>
            <option  value="Japan"> Japan (日本) </option>
            <option  value="Jersey"> Jersey </option>
            <option  value="Kazakhstan"> Kazakhstan (Қазақстан) </option>
            <option  value="Kenya"> Kenya </option>
            <option  value="Kiribati"> Kiribati </option>
            <option  value="KW"> Kuwait (الكويت) </option>
            <option  value="Kyrgyzstan"> Kyrgyzstan (Кыргызстан) </option>
            <option  value="Laos"> Laos (ນລາວ) </option>
            <option  value="Latvia"> Latvia (Latvija) </option>
            <option  value="Lebanon"> Lebanon (لبنان) </option>
            <option  value="Lesotho"> Lesotho </option>
            <option  value="Liberia"> Liberia </option>
            <option  value="Libya"> Libya (ليبيا) </option>
            <option  value="Liechtenstein" > Liechtenstein </option>
            <option  value="Lithuania"> Lithuania (Lietuva) </option>
            <option  value="Luxembourg"> Luxembourg (Lëtzebuerg) </option>
            <option  value="Macao"> Macao </option>
            <option  value="Macedonia"> Macedonia (Македонија) </option>
            <option  value="Madagascar"> Madagascar (Madagasikara) </option>
            <option  value="Malawi"> Malawi </option>
            <option  value="Malaysia"> Malaysia </option>
            <option  value="Maldives"> Maldives (ގުޖޭއްރާ ޔާއްރިހޫމްޖ) </option>
            <option  value="Mali"> Mali </option>
            <option  value="Malta"> Malta </option>
            <option  value="Marshall Islands"> Marshall Islands </option>
            <option  value="Martinique"> Martinique </option>
            <option  value="Mauritania" > Mauritania (موريتانيا) </option>
            <option  value="Mauritius"> Mauritius </option>
            <option  value="Mayotte"> Mayotte </option>
            <option  value="Mexico"> Mexico (México) </option>
            <option  value="Micronesia"> Micronesia </option>
            <option  value="Moldova"> Moldova </option>
            <option  value="Monaco"> Monaco </option>
            <option  value="Mongolia"> Mongolia (Монгол Улс) </option>
            <option  value="Montenegro"> Montenegro (Црна Гора) </option>
            <option  value="Montserrat"> Montserrat </option>
            <option  value="Morocco"> Morocco (المغرب) </option>
            <option  value="Mozambique"> Mozambique (Moçambique) </option>
            <option  value="Myanmar"> Myanmar (Burma) </option>
            <option  value="Namibia"> Namibia </option>
            <option  value="Nauru"> Nauru (Naoero) </option>
            <option  value="Nepal"> Nepal (नेपाल) </option>
            <option  value="Netherlands"> Netherlands (Nederland) </option>
            <option  value="Netherlands Antilles"> Netherlands Antilles </option>
            <option  value="New Caledonia"> New Caledonia </option>
            <option  value="New Zealand"> New Zealand </option>
            <option  value="Nicaragua"> Nicaragua </option>
            <option  value="Niger"> Niger </option>
            <option  value="Nigeria"> Nigeria </option>
            <option  value="Niue"> Niue </option>
            <option  value="Norfolk Island"> Norfolk Island </option>
            <option  value="Northern Mariana Islands"> Northern Mariana Islands </option>
            <option  value="North Korea "> North Korea (조선) </option>
            <option  value="Norway"> Norway (Norge) </option>
            <option  value="Oman"> Oman (عمان) </option>
            <option  value="Pakistan"> Pakistan (پاکستان) </option>
            <option  value="Palau"> Palau (Belau) </option>
            <option  value="Palestinian Territories"> Palestinian Territories </option>
            <option  value="Panama"> Panama (Panamá) </option>
            <option  value="PG"> Papua New Guinea </option>
            <option  value="Paraguay"> Paraguay </option>
            <option  value="Peru"> Peru (Perú) </option>
            <option  value="Philippines"> Philippines (Pilipinas) </option>
            <option  value="PN"> Pitcairn </option>
            <option  value="Poland"> Poland (Polska) </option>
            <option  value="Portugal"> Portugal </option>
            <option  value="Puerto Rico"> Puerto Rico </option>
            <option  value="Qatar"> Qatar (قطر) </option>
            <option  value="Reunion"> Reunion </option>
            <option  value="Romania"> Romania (România) </option>
            <option  value="Russia"> Russia (Россия) </option>
            <option  value="Rwanda"> Rwanda </option>
            <option  value="Saint Helena"> Saint Helena </option>
            <option  value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
            <option  value="Saint Lucia"> Saint Lucia </option>
            <option  value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
            <option  value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
            <option  value="Samoa"> Samoa </option>
            <option  value="San Marino"> San Marino </option>
            <option  value="Sao Tome and Principe"> Sao Tome and Principe (São Tomé and Príncipe) </option>
            <option  value="Saudi Arabia"> Saudi Arabia (المملكة العربية السعودية) </option>
            <option  value="Senegal"> Senegal (Sénégal) </option>
            <option  value="Serbia"> Serbia (Србија) </option>
            <option  value="Serbia and Montenegro"> Serbia and Montenegro (Србија и Црна Гора) </option>
            <option  value="Seychelles"> Seychelles </option>
            <option  value="Sierra Leone"> Sierra Leone </option>
            <option  value="Singapore"> Singapore (Singapura) </option>
            <option  value="Slovakia"> Slovakia (Slovensko) </option>
            <option  value="Slovenia"> Slovenia (Slovenija) </option>
            <option  value="Solomon Islands"> Solomon Islands </option>
            <option  value="Somalia"> Somalia (Soomaaliya) </option>
            <option  value="South Africa" > South Africa </option>
            <option  value="South Georgia and the South Sandwich Islands"> South Georgia and the South Sandwich Islands </option>
            <option  value="South Korea"> South Korea (한국) </option>
            <option  value="Spain"> Spain (España) </option>
            <option  value="Sri Lanka"> Sri Lanka </option>
            <option  value="Sudan"> Sudan (السودان) </option>
            <option  value="Suriname"> Suriname </option>
            <option  value="SJ"> Svalbard and Jan Mayen </option>
            <option  value="Swaziland"> Swaziland </option>
            <option  value="Sweden"> Sweden (Sverige) </option>
            <option  value="Switzerland"> Switzerland (Schweiz) </option>
            <option  value="Syria"> Syria (سوريا) </option>
            <option  value="Taiwan"> Taiwan (台灣) </option>
            <option  value="Tajikistan"> Tajikistan (Тоҷикистон) </option>
            <option  value="Tanzania"> Tanzania </option>
            <option  value="Thailand"selected="selected" > Thailand (ไทย) </option>
            <option  value="Timor-Leste"> Timor-Leste </option>
            <option  value="Togo"> Togo </option>
            <option  value="Tokelau"> Tokelau </option>
            <option  value="Tonga"> Tonga </option>
            <option  value="Trinidad and Tobago"> Trinidad and Tobago </option>
            <option  value="Tunisia"> Tunisia (تونس) </option>
            <option  value="Turkey"> Turkey (Türkiye) </option>
            <option  value="Turkmenistan"> Turkmenistan (Türkmenistan) </option>
            <option  value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
            <option  value="Tuvalu"> Tuvalu </option>
            <option  value="Uganda"> Uganda </option>
            <option  value="UA"> Ukraine (Україна) </option>
            <option  value="United Arab Emirates" > United Arab Emirates </option>
            <option  value="United Kingdom"> United Kingdom </option>
            <option  value="United States"> United States </option>
            <option  value="United States minor outlying islands"> United States minor outlying islands </option>
            <option  value="Uruguay"> Uruguay </option>
            <option  value="Uzbekistan"> Uzbekistan (O&#39;zbekiston) </option>
            <option  value="Vanuatu"> Vanuatu </option>
            <option  value="Vatican City"> Vatican City (Città del Vaticano) </option>
            <option  value="Venezuela"> Venezuela </option>
            <option  value="Vietnam"> Vietnam (Việt Nam) </option>
            <option  value="Virgin Islands, British"> Virgin Islands, British </option>
            <option  value="Virgin Islands, U.S."> Virgin Islands, U.S. </option>
            <option  value="Wallis and Futuna"> Wallis and Futuna </option>
            <option  value="Western Sahara"> Western Sahara (الصحراء الغربية) </option>
            <option  value="Yemen "> Yemen (اليمن) </option>
            <option  value="Zambia"> Zambia </option>
            <option  value="Zimbabwe"> Zimbabwe </option>
          </select>
       <span class="txt-red">*</span></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#FFFFFF" class="news"><strong>อีเมล์<br />Email</strong></td>
        <td align="left" bgcolor="#FFFFFF"><input name="email" type="text" id="email" size="50" onBlur="username_check()" class="radius_green"/>
         <img id="tick" src="tick.png" width="16" height="16"/> 
		<img id="cross" src="cross.png" width="16" height="16"/><span class="txt-red">*</span></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#FFFFFF" class="news"><strong>รหัสผ่าน<br />Password</strong></td>
        <td align="left" bgcolor="#FFFFFF"><input name="password" type="password" id="password" size="50" maxlength="30"  autocomplete="off" class="radius_green" />
          <span class="txt-red">*</span> (อย่างน้อย 6 ตัวอักษร / 6 Character mininum)</td>
      </tr>
      <tr>
        <td height="90" align="right" class="news"><strong>กรุณาใส่รหัสภาพ<br />
          Type image code</strong></td>
        <td align="left"><img src="securimage_show.php?sid=<?php echo $_SESSION['Xcheck']?>" id="image" align="absmiddle" /> <a href="#" onClick="document.getElementById('image').src = 'securimage_show.php?sid=' + Math.random(); return false">reload image <br />
        </a> <font color="#990000" size="1" face="MS Sans Serif"><strong>กรุณาใส่รหัสหมายเลข &nbsp;&nbsp;</strong></font>
        <input name="code" type="text" id="code" size="10" maxlength="10"  class="radius_green"/></td>
      </tr>
      <tr>
        <td align="left" class="news">&nbsp;</td>
        <td align="left"><input type="submit" name="button" id="button" value=" สมัครสมาชิก/Subcribe" class="LOGIN" />
        <input type="reset" name="button2" id="button2" value="ยกเลิก/Cancel" class="LOGIN"/></td>
      </tr>
      <tr>
        <td height="35" align="left">&nbsp;</td>
        <td align="left" class="txt-red">* กรุณาใส่ข้อมูลทุกช่องค่ะ (*Please fill in the necessary data.)</td>
      </tr>
    </table>
   		 <p>&nbsp;</p>
</form>

</body>
</html>