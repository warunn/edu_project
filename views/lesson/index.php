<form name="frmFile" id="frmFile" method="post" action="<?php echo URL;?>lesson/run" method="post"  onSubmit="return validateForm();" enctype="multipart/form-data">

	
<table class="qcell">
<tr>
		<td>Lesson number </td><td><input type="text" name="lno" size="10" maxlength="10" tabindex="1"></td></tr>
	
	<tr>
		<td>Competency (Lesson topic) </td><td><input type="text" name="competency" size="60" tabindex="1"></td></tr>
		<tr>
		<td>Difficulty </td><td><select name="difficult"><option value="1">Very Difficult</option>
												<option value="2">Difficult </option>
												<option value="3">Normal</option><option value="4">Easy</option><option value="5">Very Easy</option>
		</select></td></tr>
		
	
	<tr>
		<td>1) Competency Level(sub topic)</td><td><input type="text" name="comlevel1" size="60"     tabindex="2"></td></tr>
		<tr>
		<td>Difficulty </td><td><select name="difficulty1"><option value="1">Very Difficult</option>
												<option value="2">Difficult </option>
												<option value="3">Normal</option><option value="4">Easy</option><option value="5">Very Easy</option>
		</select></td></tr>
		<tr>
		<td>Number of Periods </td><td><select name="nop1"><option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option><option value="4">4</option><option value="5">5</option>
												<option value="6">6</option><option value="7">7</option><option value="8">8</option>
												<option value="9">9</option><option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option><option value="14">14</option>
												<option value="15">15</option><option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option><option value="20">20</option>
		</select></td></tr>
		
	<tr>
		<td>2) Competency Level(sub topic)  </td><td><input type="text" name="comlevel2" size="60"     tabindex="2"></td></tr>
		<tr>
		<td>Difficulty </td><td><select name="difficulty2"><option value="1">Very Difficult</option>
												<option value="2">Difficult </option>
												<option value="3">Normal</option><option value="4">Easy</option><option value="5">Very Easy</option>
		</select></td></tr>
		<tr>
		<td>Number of Periods </td><td><select name="nop2"><option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option><option value="4">4</option><option value="5">5</option>
												<option value="6">6</option><option value="7">7</option><option value="8">8</option>
												<option value="9">9</option><option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option><option value="14">14</option>
												<option value="15">15</option><option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option><option value="20">20</option>
		</select></td></tr>
		
	<tr>
		<td>3) Competency Level(sub topic) </td><td><input type="text" name="comlevel3" size="60"     tabindex="2"></td></tr>
		<tr>
		<td>Difficulty </td><td><select name="difficulty3"><option value="1">Very Difficult</option>
												<option value="2">Difficult </option>
												<option value="3">Normal</option><option value="4">Easy</option><option value="5">Very Easy</option>
		</select></td></tr>
		<tr>
		<td>Number of Periods </td><td><select name="nop3"><option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option><option value="4">4</option><option value="5">5</option>
												<option value="6">6</option><option value="7">7</option><option value="8">8</option>
												<option value="9">9</option><option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option><option value="14">14</option>
												<option value="15">15</option><option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option><option value="20">20</option>
		</select></td></tr>
		
	<tr>
		<td>4)Competency Level(sub topic) </td><td><input type="text" name="comlevel4" size="60"     tabindex="2"></td></tr>
		<tr>
		<td>Difficulty </td><td><select name="difficulty4"><option value="1">Very Difficult</option>
												<option value="2">Difficult </option>
												<option value="3">Normal</option><option value="4">Easy</option><option value="5">Very Easy</option>
		</select></td></tr>
		<tr>
		<td>Number of Periods </td><td><select name="nop4"><option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option><option value="4">4</option><option value="5">5</option>
												<option value="6">6</option><option value="7">7</option><option value="8">8</option>
												<option value="9">9</option><option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option><option value="14">14</option>
												<option value="15">15</option><option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option><option value="20">20</option>
		</select></td></tr>
	<tr>
		<td>5)Competency Level(sub topic) </td><td><input type="text" name="comlevel5" size="60"     tabindex="2"></td></tr>
		<tr>
		<td>Difficulty </td><td><select name="difficulty5"><option value="1">Very Difficult</option>
												<option value="2">Difficult </option>
												<option value="3">Normal</option><option value="4">Easy</option><option value="5">Very Easy</option>
		</select></td></tr>
		<tr>
		<td>Number of Periods </td><td><select name="nop5"><option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option><option value="4">4</option><option value="5">5</option>
												<option value="6">6</option><option value="7">7</option><option value="8">8</option>
												<option value="9">9</option><option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option><option value="14">14</option>
												<option value="15">15</option><option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option><option value="20">20</option>
		</select></td></tr>
	<tr>
		<td>6)Competency Level(sub topic) </td><td><input type="text" name="comlevel6" size="60"     tabindex="2"></td></tr>
		<tr>
		<td>Difficulty </td><td><select name="difficulty6"><option value="1">Very Difficult</option>
												<option value="2">Difficult </option>
												<option value="3">Normal</option><option value="4">Easy</option><option value="5">Very Easy</option>
		</select></td></tr>
		<tr>
		<td>Number of Periods </td><td><select name="nop6"><option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option><option value="4">4</option><option value="5">5</option>
												<option value="6">6</option><option value="7">7</option><option value="8">8</option>
												<option value="9">9</option><option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option><option value="14">14</option>
												<option value="15">15</option><option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option><option value="20">20</option>
		</select></td></tr>
	<tr>
		<td>7)Competency Level(sub topic) </td><td><input type="text" name="comlevel7" size="60"     tabindex="2"></td></tr>
		<tr>
		<td>Difficulty </td><td><select name="difficulty7"><option value="1">Very Difficult</option>
												<option value="2">Difficult </option>
												<option value="3">Normal</option><option value="4">Easy</option><option value="5">Very Easy</option>
		</select></td></tr>
		
		<tr>
		<td>Number of Periods </td><td><select name="nop7"><option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option><option value="4">4</option><option value="5">5</option>
												<option value="6">6</option><option value="7">7</option><option value="8">8</option>
												<option value="9">9</option><option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option><option value="14">14</option>
												<option value="15">15</option><option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option><option value="20">20</option>
		</select></td></tr>
	<tr>
		<td>8)Competency Level(sub topic) </td><td><input type="text" name="comlevel8" size="60"     tabindex="2"></td></tr>
		<tr>
		<td>Difficulty </td><td><select name="difficulty8"><option value="1">Very Difficult</option>
												<option value="2">Difficult </option>
												<option value="3">Normal</option><option value="4">Easy</option><option value="5">Very Easy</option>
		</select></td></tr>
		<tr>
		<td>Number of Periods </td><td><select name="nop8"><option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option><option value="4">4</option><option value="5">5</option>
												<option value="6">6</option><option value="7">7</option><option value="8">8</option>
												<option value="9">9</option><option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option><option value="14">14</option>
												<option value="15">15</option><option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option><option value="20">20</option>
		</select></td></tr>
	<tr>
		<td>9)Competency Level(sub topic) </td><td><input type="text" name="comlevel9" size="60"     tabindex="2"></td></tr>
		<tr>
		<td>Difficulty </td><td><select name="difficulty9"><option value="1">Very Difficult</option>
												<option value="2">Difficult </option>
												<option value="3">Normal</option><option value="4">Easy</option><option value="5">Very Easy</option>
		</select></td></tr>
		<tr>
		<td>Number of Periods </td><td><select name="nop9"><option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option><option value="4">4</option><option value="5">5</option>
												<option value="6">6</option><option value="7">7</option><option value="8">8</option>
												<option value="9">9</option><option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option><option value="14">14</option>
												<option value="15">15</option><option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option><option value="20">20</option>
		</select></td></tr>
	<tr>
		<td>10)Competency Level(sub topic) </td><td><input type="text" name="comlevel10" size="60"     tabindex="2"></td></tr>
		<tr>
		<td>Difficulty </td><td><select name="difficulty10"><option value="1">Very Difficult</option>
												<option value="2">Difficult </option>
												<option value="3">Normal</option><option value="4">Easy</option><option value="5">Very Easy</option>
		</select></td></tr>
		<tr>
		<td>Number of Periods </td><td><select name="nop10"><option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option><option value="4">4</option><option value="5">5</option>
												<option value="6">6</option><option value="7">7</option><option value="8">8</option>
												<option value="9">9</option><option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option><option value="14">14</option>
												<option value="15">15</option><option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option><option value="20">20</option>
		</select></td></tr>
	
		<tr><td><input type="submit" value="Create Subject"> </td><td><input type="reset" value="Cancel"></td></tr> 
	
</table>
    <?php

	?>

</form>
