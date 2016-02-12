<p class="center">Настройки элемента</p>
<div id="elem_structure">
</div>
<br>
<div id="settings-tool">
 <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#panel1">Цвет</a></li>
      <li><a data-toggle="tab" href="#panel2">Бордюр</a></li>
      <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          Другие настройки 
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a data-toggle="tab" href="#panel3">Шрифт</a></li>
		  <li><a data-toggle="tab" href="#panel4">Тень</a></li>
		  <li><a data-toggle="tab" href="#panel5">Размеры и отступы</a></li>
        </ul>
      </li>
  </ul>     
<div class="tab-content">
	<!-- tab 1 color-->
	<div id="panel1" class="tab-pane fade in active">
		<table><tr><td>Основной цвет </td> 
		<td><input type="radio"  name="radio" class ="radiockeck" value="general" checked></td></tr>
		<br><tr><td>Цвет при наведении мыши</td><td>
		<input type="radio" name="radio" id="radioHover" class ="radiockeck" value="hover"></td></tr></table><br>
		<input type="text" placeholder="#FFFFFF" name = "background-color" class="edited">
		<input type="color" style="height:32px;" class="edited" name="background-color">
	</div>
	<!-- tab2 border-->
	<div id="panel2" class="tab-pane fade">
		<table><tr>
		<td>
		Толщина </td><td><input type="number" name="border-width" min="1" max="10" step="1" style="width:200px;"/></td>		
		</tr>
		<tr><td>
		Вид </td> <td><select name="border-style" style="width:200px;">
		<option seleced value="solid">solid</option>
		<option value="double">double</option>
		<option value="groove">groove</option>
		<option value="ridge">ridge</option>
		<option value="inset">inset</option>
		<option value="outset">outset</option>
		<option value="dashed">dashed</option>
		<option value="dotted">dotted</option>
		</select></td>
		</tr>
		<tr>
		<td>
		Цвет
		</td>
		<td>
		<input type="text" name = "border-color" placeholder="#FFFFFF" style="width:160px;">
		<input type="color" style="height:32px; width:40px;" class="edited" name="border-color">
		</td>
		</tr>
		<tr>
		<td>Радиус закругления </td>
		<td><input type="number" name="border-radius" value="1" style="width:200px;"></td>
		</tr>
		<tr>
		<td>
		Расположение 
		</td>
		<td style="padding-left:30px;">
		<div class="btn-group" >
         <label class="checkbox block" style="font-weight:normal;text-align:right;"><input type="checkbox" name="border" class ="bordersproperty">Всюду вокруг</label>
         <label class="checkbox block" style="font-weight:normal;"><input type="checkbox" name="border-left"   class ="bordersproperty">Слева</label>
         <label class="checkbox block" style="font-weight:normal;"><input type="checkbox" name="border-right"  class ="bordersproperty">Справа</label>
		 <label class="checkbox block" style="font-weight:normal;"><input type="checkbox" name="border-bottom" class ="bordersproperty">Снизу</label>
		 <label class="checkbox block" style="font-weight:normal;"><input type="checkbox" name="border-top"    class ="bordersproperty">Сверху</label>
        </div>
		</td>
		</tr>
		</table>
	</div>
	<!-- tab3 font-->
	<div id="panel3" class="tab-pane fade">
		<table>
		<tr><td>
		Вид:
		</td>
		<td>
		<select name="font-family" class="edited" style="width: 200px;">
		<option selected>Arial</option>
		<option value="Arial Black"> Arial Black </option>
		<option value="Georgia">Georgia </option>
		<option value="Helvetica">Helvetica </option>
		<option value="Sans-serif">Sans-serif</option>
		<option value="Serif">Serif</option>
		<option value="Comic Sans MS">Comic Sans MS</option>
		<option value="Courier New">Courier New</option>
		<option value="Monospace">Monospace</option>
		<option value="Impact">Impact</option>
		<option value="Monaco">Monaco</option>
		<option value="Lucida Console">Lucida Console</option>
		<option value="Lucida Sans Unicode">Lucida Sans Unicode</option>
		<option value="Tahoma">Tahoma</option>
		<option value="Geneva">Geneva</option>
		<option value="Times New Roman">Times New Roman</option>
		<option value="Verdana">Verdana</option>
		</select>
		</td>
		</tr>
		<tr><td>Начертание: </td>
		<td>
		<select name ="font-style" class="edited" style="width:200px;">
		<option selected>normal</option>
		<option>italic</option>
		<option>oblique</option>
		<option>inherit </option>
		</select>
		</td></tr>
		
		<tr><td>Наcыщенность: </td>
		<td>
		<select name = "font-weight" class="edited" style="width:200px;">
		<option selected>normal</option>
		<option>bolder</option>
		<option>lighter</option>
		<option>bold</option>
		</select>
		</td></tr>
		<tr>
		<td>
		Цвет:
		</td>
		<td>
		<input type="text" placeholder="#FFFFFF" name="color" class="edited" style="width:200px;">
		</td>
		</tr>
		</table>	
	</div>
	<!-- tab4 box-shadow-->
	<div id="panel4" class="tab-pane fade">
	<table><tr><td>
	<a href="#" style="color:#212121;" data-toggle="tooltip" title="[inset] <сдвиг по x><br><сдвиг по y> <радиус размытия> <растяжение> <цвет>" data-placement="left">Тень</a></td>
	<td><input type="text" class="edited" name="box-shadow"></input></td>
	</tr></table>
	</div>
	<!-- tab5 -->
	<div id="panel5" class="tab-pane fade">
	  <table>
		<tr><td>высота:</td><td><input type="text" class="edited" name="height"></input></td></tr>
		<tr><td>ширина:</td><td><input type="text" class="edited" name="width"></input></td></tr>
		<tr><td>
		<a href="#" style="color:#212121;" data-toggle="tooltip" title="<отступ сверху><отступ справа><отступ снизу><отступ слева>" data-placement="left">отступы:</a>
		</td><td><input type="text" class="edited" name="margin"></input></td></tr>
		<tr><td>
		<a href="#" style="color:#212121;" data-toggle="tooltip" title="<поле сверху><поле справа><поле снизу><поле слева>" data-placement="left">поля:</a>
		</td>
		<td><input type="text" class="edited" name="padding"></input></td></tr>
	 </table>
	</div>
</div>
</div>
