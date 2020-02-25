<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
		switch($_SESSION['language']) {
						case '1' :
						define("_Language","เวอร์ชั่นภาษาไทย");
						define("_PresidentTitle","นายกสมาคม/สารจากนายก");	
						define("_PresidentAdd","เพิ่มข้อมูลนายกสมาคม");												
						define("_PresidentNote","เพิ่มสารจากนายกสมาคม");							
						define("_PresidentNoteEdit","แก้ไขสารจากนายกสมาคม");	
						
						define("_ActivityTitle","ระบบกิจกรรม");						
						define("_dataAdd","เพิ่มข้อมูล");													
						define("_dataEdit","แก้ไขข้อมูล");							

						define("_calendarTitle","ปฏิทินกิจกรรมสมาคม");							
						define("_MembershipTitle","ทำเนียบสมาชิก");								
						define("_NewsTitle","ข่าวสาร");								
						define("_PriceTitle","ราคายางพารา");	
						define("_SituationTitle","สถานการณ์ยางพารา");	
						define("_StatisticsTitle","สถิติยางพารา");						
						define("_ArticleTitle","ระบบเก็บมาฝาก");							
						
						
						
						define("_txtLocalprice","ราคายางในตลาดท้องถิ่น");
						define("_txtBiddingprice","ราคารับซื้อยาง");						
						define("_txtOfferprice","ราคาเสนอขายยางพารา");	
						define("_txtCESSprice","ราคา CESS");	
						define("_txtCenterprice","ราคายาง ตลาดกลางยางพารา สงขลา");		
						
						define("_txtStatThai","สถิติยางพาราไทย");							
						define("_txtStatWorld","สถิติยางพาราโลก");																								
						define("_txtStatOther","สถิติอื่นๆ");	
						define("_txtStatEdit","แก้ไขข้อมูลสถิติ");	
						define("_txtWebboardList","ดูข้อมูลเว็บบอร์ด");
						define("_txtWebboardList2","ถามตอบยางพารา");							
						define("_txtWebboardList1","ซื้อขายยางพารา");		
								
						define("_txtSelectCagegory","เลือกหมวด");							
						define("_txtTraMeeting","กิจกรรมการประชุม");	
						define("_txtTraOther","กิจกรรมพิเศษ");	
						define("_txtTopicinput","หัวข้อ");	
						define("_txtDetaulinput","รายละเอียด");			
						define("_txtDateSelect","วันที่");	
						define("_txtFileAndIMG","รูปภาพ/ไฟล์");							
						define("_txtBtnAddEdit","เพิ่ม/แก้ไข");	
						define("_txtFileDesc","คำบรรยายรูป/ไฟล์");
				        define("_txtFileIMG","รูปภาพ");	
				
						define("_txtReff","ที่มา");
						define("_txtRubberNews","ข่าวสารยางพารา");	
						define("_txtAutomobileNews","ข่าวอุตสาหกรรมยานยนต์");							
						define("_txtEconomicNews","ข่าวเศรษฐกิจโลก");							
						define("_txtSendLetter","ส่งจดหมาย");								
						define("_MemberList","รายชื่อสมาชิก");		
						define("_TopNews","ข่าวสารความเคลื่อนไหว");										
						define("_ChPass","เปลียนรหัสผ่าน");	
						define("_LogOut","ออกจากระบบ");	
																			
						break;  //
						
						case '3' :
						define("_Language","Chinese Version");
						define("_PresidentTitle","President View");							
						define("_PresidentAdd","President Add");		
						define("_PresidentNote","Add Data");						
						define("_PresidentNoteEdit","Edit/Delete");
						
						define("_ActivityTitle","Activities");	
						define("_dataAdd","Add Data");		
						define("_dataEdit","Edit Data");	
						
						define("_calendarTitle","TRA Calendar");																			
						define("_MembershipTitle","TRA Membership");		
						define("_NewsTitle","News");		
						define("_PriceTitle","NR Price");							
						define("_SituationTitle","Rubber Situation");	
						define("_StatisticsTitle","Rubber Statistics");	
						define("_ArticleTitle","Article");		

						define("_txtLocalprice","Local Price");
						define("_txtBiddingprice","Bidding Price");						
						define("_txtOfferprice","Offer Price");	
						define("_txtCESSprice","CESS");			
																			
						define("_txtStatThai","Thai Statistics");							
						define("_txtStatWorld","World Statistics");																								
						define("_txtStatOther","Other Statistics");	
						define("_txtStatEdit","Edit Statistics");																				
						define("_txtWebboardList","View Topic");
						define("_txtWebboardList1","Rubber FAQ");							
						define("_txtWebboardList2","Rubber Trading");	
						
						
						define("_txtSelectCagegory","Select Category");						
						define("_txtTraMeeting","TRA Meeting");	
						define("_txtTraOther","Other Meeting");	
						define("_txtTopicinput","Topic");		
						define("_txtDetaulinput","Description");		
						define("_txtDateSelect","Date");	
						define("_txtFileAndIMG","Images/File");					
						define("_txtBtnAddEdit","Add/Edit");	
						define("_txtFileDesc","Image/File Description");	
					    define("_txtFileIMG","Image");		
				
						define("_txtReff","Reference");	
						define("_txtRubberNews","Rubber News");	
						define("_txtAutomobileNews","Automobile News");	
						define("_txtEconomicNews","World Economic News");		
						define("_txtSendLetter","Send Newsletter");		
						define("_MemberList","Member List");																																														
						define("_TopNews","Information from us");			
						
						define("_ChPass","Change Passwoord");		
						define("_LogOut","Log out");	
			
						break;
												case '2' :
						define("_Language","English Version");
						define("_PresidentTitle","President View");							
						define("_PresidentAdd","President Add");		
						define("_PresidentNote","Add Data");						
						define("_PresidentNoteEdit","Edit/Delete");
						
						define("_ActivityTitle","Activities");	
						define("_dataAdd","Add Data");		
						define("_dataEdit","Edit Data");	
						
						define("_calendarTitle","TRA Calendar");																			
						define("_MembershipTitle","TRA Membership");		
						define("_NewsTitle","News");		
						define("_PriceTitle","NR Price");							
						define("_SituationTitle","Rubber Situation");	
						define("_StatisticsTitle","Rubber Statistics");	
						define("_ArticleTitle","Article");		

						define("_txtLocalprice","Local Price");
						define("_txtBiddingprice","Bidding Price");						
						define("_txtOfferprice","Offer Price");	
						define("_txtCESSprice","CESS");			
																			
						define("_txtStatThai","Thai Statistics");							
						define("_txtStatWorld","World Statistics");																								
						define("_txtStatOther","Other Statistics");	
						define("_txtStatEdit","Edit Statistics");																				
						define("_txtWebboardList","View Topic");
						define("_txtWebboardList1","Rubber FAQ");							
						define("_txtWebboardList2","Rubber Trading");	
						
						
						define("_txtSelectCagegory","Select Category");						
						define("_txtTraMeeting","TRA Meeting");	
						define("_txtTraOther","Other Meeting");	
						define("_txtTopicinput","Topic");		
						define("_txtDetaulinput","Description");		
						define("_txtDateSelect","Date");	
						define("_txtFileAndIMG","Images/File");					
						define("_txtBtnAddEdit","Add/Edit");	
						define("_txtFileDesc","Image/File Description");	
					    define("_txtFileIMG","Image");		
				
						define("_txtReff","Reference");	
						define("_txtRubberNews","Rubber News");	
						define("_txtAutomobileNews","Automobile News");	
						define("_txtEconomicNews","World Economic News");		
						define("_txtSendLetter","Send Newsletter");		
						define("_MemberList","Member List");																																														
						define("_TopNews","Information from us");			
						
						define("_ChPass","Change Passwoord");		
						define("_LogOut","Log out");	
													
	
										
						break;
		}
				

?>