
<!DOCTYPE html>
<html lang="en">
<head>
<title>จองโต๊ะอาหาร</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link href="http://fonts.googleapis.com/css?family=PT+Serif+Caption:400,400italic" rel="stylesheet" type="text/css">
<script src="js/jquery-1.7.1.min.js" ></script>
<script src="js/superfish.js"></script>
<link href="css2/style-menu.css" rel="stylesheet" type="text/css">
<link href="css2/style-default.css" rel="stylesheet" type="text/css">

<link href="css2/web_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="calender/calendar-mos.css">
<script language="JavaScript" src="calender/calendar.js">
</script>
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<style type="text/css" >
body{
                
                background-size:1300px;
                
            }
            h1{
                color: white;
                text-transform: uppercase;
                
                 margin: 1rem;

              text-decoration: underline;
            }
<!--
.g {margin:0px; padding:0px; overflow:hidden; line-height:1; zoom:1; }
.g1 {margin:0px; padding:0px; overflow:hidden; line-height:1; zoom:1; }

</style>


</head>
<body>
<header>
  <div class="line-top"></div>
  <div class="main">
    <div class="row-top">
      
      <div class="clear"></div>
    </div>
  </div>
</header>
<body background = "99.png">
<section id="content">
<li><a href="index.php">Home</a></li>
 
  <h1>ยินดีต้อนรับสู่ระบบจองโต๊ะออนไลน์</h1>

            <div class="hp_latest_projects_box"> 
         <center><form action="add_user_db.php" method="post" name="form1" enctype="multipart/form-data" class="style3" id="form1" onSubmit="return checkvalue()">
            <table width="50%" height="400" border="0" align="center" cellpadding="1" cellspacing="0">
                
                <tr>
                  <td bgcolor="#ECE9D8">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#ECE9D8"></td>
                </tr>
         <tr>
                  <td bgcolor="#ECE9D8"><table width="100%" border="0" cellspacing="10" cellpadding="5" id="rev_table">
                      <tbody>
                        <tr>
                          <td width="27%">เลือกวันที่จอง</td>
                          <td width="39%"> <input id="today" type="date" name="today" value="" class="form-control border-input" required style=" text-align: center; "/>
                          
                          <span class="textfieldRequiredMsg">
                        </tr>
                        <td width="27%">เลือกเวลา</td>
                          <td width="39%"><select name="time" id="time" validate="required:true">
                            <option value="" selected="selected">เลือกช่วงเวลา</option>
                            <option value="ช่วงสาย 10:00 - 12:00 น.">ช่วงสาย 10:00 - 12:00 น.</option>
                            <option value="ช่วงบ่าย 13:00 - 16:00 น.">ช่วงบ่าย 13:00 - 16:00 น.</option>  
                            <option value="ช่วงเย็น 17:00 - 19:00 น.">ช่วงเย็น 17:00 - 19:00 น.</option> >
                           
                          </select></td>
            <tr>
            
                          <td width="27%">ชื่อ</td>
                          <td width="39%"><input type="text" name="Firstname" id="Firstname"/></td>
                          <td width="34%">&nbsp;</td>
            </tr>
            <tr>
            
            <td width="27%">สกุล</td>
            <td width="39%"><input type="text" name="Lastname" id="Lastname"/></td>
            <td width="34%">&nbsp;</td>
</tr>
                        <tr>
                          <td width="27%">เบอร์มือถือ</td>
                          <td width="39%"><input type="text" name="tel" id="tel" title="เบอร์มือถือ" /></td>
                          <td width="34%">&nbsp;</td>
                        </tr>
                        
                        <tr>
                        <tr>
            
            <td width="27%">จำนวนคน</td>
            <td width="39%"><input type="text" name="numpeople" id="numpeople"/></td>
            <td width="34%">&nbsp;</td>
</tr>
<tr>
            
            <td width="27%">หมายเลขโต๊ะ</td>
            <td width="39%"><input type="text" name="numtbl" id="numtbl"/></td>
            <td width="34%">&nbsp;</td>
</tr>
<li><a href="table.php">Select Table</a></li>
                          <td width="34%">&nbsp;</td>
                        
                        <tr>
                          <td width="27%" class="goright">&nbsp;</td>
                          <td width="39%" class="goright"><input name="act" type="hidden" value="save" />
                          <input type="submit" name="button0" id="button0" value="ยืนยันบันทึกข้อมูลการจอง&gt;&gt;" class="btn" />
                            <span class="style59">
                            <script language="JavaScript" type="text/javascript">
                            

            
    //============  ตรวจสอบค่าว่าง
                       
              function checkvalue()
              {
              
                  if(document.form1.date_rep.value=="")
                  {
                  alert('กรุณาเลือกวันที่');
                  document.form1.date_rep.focus();
                  return false;
                  }
                  if(document.form1.rev_name.value=="")
                  {
                  alert('กรุณากรอกชื่อ');
                  document.form1.rev_name.focus();
                  return false;
                  }
                  if(document.form1.rev_tel.value=="")
                  {
                  alert('กรุณากรอกเบอร์โทร');
                  document.form1.rev_tel.focus();
                  return false;
                  }
                 
              }
                </script>
                            </span>
                            <input name="add" type="hidden" id="add" value="True" /></td>
                          <td width="34%" class="goright">&nbsp;</td>
                        </tr>
                      </tbody>
                   </table></td>
                </tr>
         <tr>
                  <td bgcolor="#ECE9D8">&nbsp;</td>
                </tr>
              </table>
            </form></center> 
</section>

</body>
</html>
</body>