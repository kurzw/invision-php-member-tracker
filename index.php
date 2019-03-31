<?php


// Invision PHP Member Tracker
// Heya, thanks for reading this, originally i made this for a community I was in, i left that community though, so now I'm going to make this project public for everyone to use, k thanks bye ^^ /* 
 
 
 
 
// PHP Config for DB Connection

require('php/config.php');

// if else for icons, i'm lazy)
	function iconFormatter($value){
  if($value == '6'){
    $return = 'images/.png' . ' - ' . '';
  }else  if($value == '4'){
      $return = 'images/png' . ' - ' . '';
    }else  if($value == '7'){
        $return = 'images/' . ' - ' . '';
      }else  if($value == '8'){
          $return = 'images/' . ' - ' . '';
        }else  if($value == '14'){
            $return = 'images/' . ' - ' . '';
				}else  if($value == '9'){
						$return = 'images/' . ' - ' . '';
					}else  if($value == '11'){
							$return = 'images/' . ' - ' . '';
						}else  if($value == '12'){
								$return = 'images/' . ' - ' . '';
							}else  if($value == '10'){
									$return = 'images/' . ' - ' . '';
								}else  if($value == '13'){
										$return = 'images/' . ' - ' . '';
									}
  return $return;
}

// Total member count
// 3 is excluded, as it's seen as the freshly registered group, can be changed.

$member_count_sql = "SELECT COUNT(*) as amount_of_members FROM core_members WHERE member_group_id != '3'";
$result_membercount = $conn->query($member_count_sql);
if($result_membercount->num_rows>0){
  while($row_membercount = $result_membercount->fetch_assoc()){
    $amount_of_members = $row_membercount['amount_of_members'];
  }
}

// LOL member count

$lol_member_count_sql = "SELECT COUNT(*) as lol_amount_of_members FROM core_pfields_content WHERE field_9 = 'League Of Legends'";
$lol_result_membercount = $conn->query($lol_member_count_sql);
if($lol_result_membercount->num_rows>0){
  while($lol_row_membercount = $lol_result_membercount->fetch_assoc()){
    $lol_amount_of_members = $lol_row_membercount['lol_amount_of_members'];
  }
}

// Apex member count

$apex_member_count_sql = "SELECT COUNT(*) as apex_amount_of_members FROM core_pfields_content WHERE field_9 = 'Apex Legends'";
$apex_result_membercount = $conn->query($apex_member_count_sql);
if($apex_result_membercount->num_rows>0){
  while($apex_row_membercount = $apex_result_membercount->fetch_assoc()){
    $apex_amount_of_members = $apex_row_membercount['apex_amount_of_members'];
  }
}

// EU4 member count


$eu4_member_count_sql = "SELECT COUNT(*) as eu4_amount_of_members FROM core_pfields_content WHERE field_9 = 'Europa Universalis 4'";
$eu4_result_membercount = $conn->query($eu4_member_count_sql);
if($eu4_result_membercount->num_rows>0){
  while($eu4_row_membercount = $eu4_result_membercount->fetch_assoc()){
    $eu4_amount_of_members = $eu4_row_membercount['eu4_amount_of_members'];
  }
}

// Casual member count

$casual_member_count_sql = "SELECT COUNT(*) as casual_amount_of_members FROM core_pfields_content WHERE field_9 = 'Other'";
$casual_result_membercount = $conn->query($casual_member_count_sql);
if($casual_result_membercount->num_rows>0){
  while($casual_row_membercount = $casual_result_membercount->fetch_assoc()){
    $casual_amount_of_members = $casual_row_membercount['casual_amount_of_members'];
  }
}

// Rocket League member count

$rl_member_count_sql = "SELECT COUNT(*) as rl_amount_of_members FROM core_pfields_content WHERE field_9 = 'Rocket League'";
$rl_result_membercount = $conn->query($rl_member_count_sql);
if($rl_result_membercount->num_rows>0){
  while($rl_row_membercount = $rl_result_membercount->fetch_assoc()){
    $rl_amount_of_members = $rl_row_membercount['rl_amount_of_members'];
  }
}

// Grab User Playstyle


function getUserPlaystyle($member_id){
	$conn = databaseConnOpen();
	$sql = "SELECT * FROM core_pfields_content WHERE member_id = '$member_id'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
	  while($row = $result->fetch_assoc()){
	    $field_9 = $row['field_9'];
	  }
	}
	return $field_9;
}

// Grab Player Type


function getPlayerType($member_id){
	$conn = databaseConnOpen();
	$sql = "SELECT * FROM core_pfields_content WHERE member_id = '$member_id'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
	  while($row = $result->fetch_assoc()){
	    $field_12 = $row['field_12'];
	  }
	}
	return $field_12;
}

// Grab Member Position


function getMemberPosition($member_id){
	$conn = databaseConnOpen();
	$sql = "SELECT * FROM core_pfields_content WHERE member_id = '$member_id'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
	  while($row = $result->fetch_assoc()){
	    $field_13 = $row['field_13'];
	  }
	}
	return $field_13;
}

 ?>
 <!-- Initialise HTML -->

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
	<!-- Loading Bar -->

	<div id="load-overlay">
					<div id="progstat"></div>
					<div id="progress"></div>
				</div>

<title>Invision PHP Member Tracker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Stylesheets -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./styles/style.css" media="all">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<h3 class="ggr-header">Invision php member tracker</span><br/>
  <small>(<?php echo $amount_of_members; ?>)</small></h1>
<hr class="ls-head-seperator" noshade="">



<!-- Overlays for Position Explanation -->

<div id="Positions-overlay" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="ClosePositionsNav()">&times;</a>
	  <div class="overlay-content"> </div>
		<div class="leadership-overlay-header" style="text-align: center; color: #9AD14B; margin-top: 12px;"> <h1> Example-Header1 </h1>
		<h5> Example-Header2 </h5> </div>
		<hr class="ls-head-seperator" noshade="">
		 <div class="overlay-content">
		<table class="table-bordered table-sm offset-md-4" style="margin-top: -30px;">
		  <thead>
		    <tr>
		      <th class="memberpos-explaination">Position Prefix</th>
					<th class="memberpos-explaination">Position Name</th>
					<th class="memberpos-explaination">Position Responsibility</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th class="memberpos-explaination">L</th>
		    <th style="color:#772F91" class="memberpos-explaination"> Example Text <img style="width=30%; height=30%;" src="images/.png"></img>Example Text</th>
 <td class="memberpos-explaination" style="color:#D3D3D3">.</th>
		    </tr>
				<tr>
				<th class="memberpos-explaination">HDOPS</th>
			<th style="color:#E62065" class="memberpos-explaination"> Example Text	<img style="width=30%; height=30%;" src="images/.png"></img>Example Text</th>
<td class="memberpos-explaination" style="color:#D3D3D3">.</th>
</tr>
<tr>
<th class="memberpos-explaination">CA</th>
<th style="color:#E62065" class="memberpos-explaination"> Example Text	<img style="width=30%; height=30%;" src="images/.png"></img>Example Text</th>
<td class="memberpos-explaination" style="color:#D3D3D3">.</th>
</tr>
<tr>
<th class="memberpos-explaination">HFH</th>
<th style="color:#E62065" class="memberpos-explaination"> Example Text	<img style="width=30%; height=30%;" src="images/.png"></img>Example Text</th>
<td class="memberpos-explaination" style="color:#D3D3D3">.</th>
</tr>
<tr>
<th class="memberpos-explaination">SMM</th>
	<th style="color:#00b894" class="memberpos-explaination"> Example Text	<img style="width=30%; height=30%;" src="images/.png"></img>Example Text</th>
	<td class="memberpos-explaination" style="color:#D3D3D3">.</th>
</tr>
		  </tbody>
		</table>
</div>
</div>
</div>


<!-- Overlays for Icon Explanation -->

<div id="Icons-overlay" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="CloseIconsNav()">&times;</a>
	<div class="icons-overlay-header" style="text-align: center; color: #9AD14B; margin-top: 12px;"> <h1> Example Text </h1>
	<h3> Example Text. </h3> </div>
	<hr class="ls-head-seperator" noshade="">
  <div class="overlay-content">
		<table class="table-bordered table-sm icons-text icons-text offset-md-4">
			<tbody>
				<tr>
			<td> <img style="width=30%; height=30%;" src="images/.png"></img></td>
<td> 	<img style="width=30%; height=30%;" src="images/.png"></img> </td>
<td>	<img style="width=30%; height=30%;" src="images/.png"></img>  </td>
<td> 	<img style="width=30%; height=30%;" src="images/.png"></img> </td>
<td> 	<img style="width=30%; height=30%;" src="images/.png"></img>  </td>
<td> 	<img style="width=30%; height=30%;" src="images/.png"></img>  </td>
<td> 	<img style="width=30%; height=30%;" src="images/.png"></img> </td>
<td> 	<img style="width=30%; height=30%;" src="images/.png"></img></td>
<td>  <img style="width=30%; height=30%;" src="images/.png"></img>  </td>
<td> 	<img style="width=30%; height=30%;" src="images/.png"> </img>  </td>
<tr>
<td> Example Text </td>
<td> Example Text</td>
<td> Example Text  </td>
<td> Example Text </td>
<td> Example Text </td>
<td> Example Text </td>
<td> Example Text </td>
<td> Example Text </td>
<td> Example Text </td>
<td> Example Text </td>
</tr>
</tbody>
</table>
  </div>
</div>

<!-- able -->

<h3 class="leadership-header" style="font-size: 18px;">
 <div class="row offset-md-4">
    <div class="col-md-2 offset-md-1">
      <table class="table leadership-table offset-md-7">
        <head>
          <br>
            <th colspan="2" class="leadership-ls-head" style="text-align:center;">
              Leadership
            </br>
        </head>
        <body>

          <?php

          $sql = "SELECT * FROM core_members WHERE member_id != '4' AND member_group_id != '6' AND member_group_id != '3' AND member_group_id != '14' AND member_group_id != '8' AND member_group_id != '9' AND member_group_id != '11' AND member_group_id != '12' AND member_group_id != '10' AND member_group_id != '13' ORDER BY (core_members.member_group_id=7) DESC, (core_members.member_group_id=4) DESC, (core_members.member_group_id=6) DESC, (core_members.member_group_id=14) DESC, (core_members.member_group_id=4) DESC";
          $result = $conn->query($sql);
          if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
              $icon = iconFormatter($row['member_group_id']);
              $icon = explode(' - ', $icon);
              $name = $row['name'];
              $id = $row['member_id'];
                echo '<tr class="rows">';
								echo '<th class="memberpos">';
				       	echo $user_position = getMemberPosition($id);
              //  	echo '<th class="memberpos" data-toggle="tooltip" data-placement="top" title="'.$user_position .'">';
           	echo '</th>';
                    echo '<th class="name">';
                     echo '<img style="width3%; height="3%;"" src="'.$icon[0].'" /> <a href="https://example-community.com/index.php?/profile/'.$id.'-'.$name.'" target="_blank">' . $name . '</a>';
                  echo '</th>';
                echo '</tr>';
            }
          }
          ?>
		<tr class="rows"><td class=""></td><td class=""></td></tr>
        </body>
      </table>
    </div>

</h3>

<!-- Seperator between LS and Members -->

<hr class="ls-head-seperator bottom" noshade="">

<!-- Middle, filled with Filter Buttons Officers and members -->


<div class="container-fluid plebs">
  <div class="row">
    <div class="col-md-4 offset-md-4">
    </div>
  </div>

	<!-- Game Filters -->

  <div class="row">
    <div class="col-md-12 col-sm-9" style="text-align:center;" >
 <div class="selectors">
      <button type="button" onclick="filterLol()" class="btn btn-outline-secondary" id="game_select_button_lol" data-toggle="tooltip" data-placement="top" title="League of Legends"><img src="images/league.png" class="button-game-icon lol" /></button>
      <button type="button" onclick="filterApex()" class="btn btn-outline-secondary" id="game_select_button_apex" data-toggle="tooltip" data-placement="top" title="Apex Legends"><img src="images/apex.png" class="button-game-icon apex" /></button>
      <button type="button" onclick="filterEu4()" class="btn btn-outline-secondary" id="game_select_button_eu4" data-toggle="tooltip" data-placement="top" title="Europe Universalis 4"><img src="images/Eu4.png" class="button-game-icon eu4" /></button>
      <button type="button" onclick="filterCasualGames()" class="btn btn-outline-secondary" id="game_select_button_casual" data-toggle="tooltip" data-placement="top" title="Casual Gaming"><img src="images/Community.png" class="button-game-icon casual" /></button>
      <button type="button" onclick="filterRL()" class="btn btn-outline-secondary" id="game_select_button_rl" data-toggle="tooltip" data-placement="top" title="Rocket League"><img src="images/RL.png" class="button-game-icon RL" /></button>
    </div>
</div>
<div class="col-sm-9 col-sm-pull-3">
<br>
</div>
  </div>
	<!-- Playstyle Filters -->

	    <div class="row">
	    <div class="col-md-2 offset-md-5" style="text-align:center;">
	    <button type="button" class="btn btn-default selec" onclick="filterComp();">Competetive</button>
	    <button type="button" class="btn btn-default selec" onclick="filterCasualPlayers();">Casual</button>
		<div> <br>
		<button type="button" class="btn btn-default selec offset-sm-1" onclick="resetFilt();">Reset Filters</button>
		        </div>
		    </div>

		   </div>
			<br>

	<!-- Regiment Member Count -->

<br>
<h4 class="lol_member_count offset-md-5" style="display:none"> Number of Members playing Game:: <?php echo $lol_amount_of_members; ?> </h4>
<h4 class="apex_member_count offset-md-5" style="display:none"> Number of Members playing Game: <?php echo $apex_amount_of_members; ?> </h4>
<h4 class="casual_member_count offset-md-5" style="display:none"> Number of Members playing Game: <?php echo $casual_amount_of_members; ?> </h4>
<h4 class="eu4_member_count offset-md-5" style="display:none"> Number of Members playing Game: <?php echo $eu4_amount_of_members; ?> </h4>
<h4 class="rl_member_count offset-md-5" style="display:none"> Number of Members playing Game: <?php echo $rl_amount_of_members; ?> </h4>


<!-- Officer Table -->


  <div class="row offset-md-4" id="memberlist">
    <div class="col-md-3">
      <table class="table table-striped table-bordered table-dark table-sm" id="officerTable">
      	<thead>
          <tr>
            <th colspan="2" style="text-align:center;">
              Officers
            </th>
          </tr>
      		<tr>

      			<th>
      				Username
      			</th>
						<th style="display:none;">
              Game
            </th>
						<th style="display:none;">
							Playstyle
						</th>
      		</tr>
      	</thead>
      	<tbody>
      <?php

      		$sql = "SELECT * FROM core_members WHERE member_id != '4' AND member_group_id != '4' AND member_group_id != '3' AND member_group_id != '8' AND member_group_id != '7' AND member_group_id != '9' AND member_group_id != '11' AND member_group_id != '12' AND member_group_id != '10' AND member_group_id != '13' ORDER BY (core_members.member_group_id=7) DESC, (core_members.member_group_id=4) DESC, (core_members.member_group_id=6) DESC, (core_members.member_group_id=14) DESC, (core_members.member_group_id=4) DESC";
      		$result = $conn->query($sql);
      		if($result->num_rows>0){
      			while($row = $result->fetch_assoc()){
              $icon = iconFormatter($row['member_group_id']);
              $icon = explode(' - ', $icon);
              $name = $row['name'];
              $id = $row['member_id'];
      					echo '<tr id="lolPlayer">';
      						echo '<td>';
									$user_main_game = getUserPlaystyle($id);
									$user_play_style = getPlayerType($id);
                    echo '<img style="width3%; height="3%;"" src="'.$icon[0].'" /> <a href="https://example-community.com/index.php?/profile/'.$id.'-'.$name.'" target="_blank">' . $name . '</a>';
									echo '<td style="display:none;">';
										echo $user_main_game;
									echo '</td>';
									echo '<td style="display:none;">';
										echo $user_play_style;
									echo '</td>';
      					echo '</tr>';
								echo '</td>';
      			}
      		}
      		?>
      	</tbody>
      </table>
    </div>

		<!-- Member - Veteran Table -->

    <div class="col-md-3">
      <table class="table table-striped table-bordered table-dark table-sm" id="memberTable">
        <thead>
          <tr>
            <th colspan="2" style="text-align:center;">
              Members
            </th>
          </tr>
          <tr>
            <th>
              Username
            </th>

						<th style="display:none;">
							Game
						</th>
						<th style="display:none;">
							Playstyle
						</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $sql = "SELECT * FROM core_members WHERE member_group_id != '14' AND member_group_id != '6' AND member_group_id != '4' AND member_group_id != '3' AND member_group_id != '7'  ORDER BY name ASC";
          $result = $conn->query($sql);
          if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
              $icon = iconFormatter($row['member_group_id']);
              $icon = explode(' - ', $icon);
              $name = $row['name'];
              $id = $row['member_id'];
								$user_main_game = getUserPlaystyle($id);
								$user_play_style = getPlayerType($id);
                      					echo '<tr>';
      						echo '<td>';
									$user_main_game = getUserPlaystyle($id);

									$user_play_style = getPlayerType($id);
                    echo '<img style="width3%; height="3%;"" src="'.$icon[0].'" /> <a href="https://example-community.com/index.php?/profile/'.$id.'-'.$name.'" target="_blank">' . $name . '</a>';
									echo '<td style="display:none;">';
										echo $user_main_game;
									echo '</td>';
									echo '<td style="display:none;">';
										echo $user_play_style;
									echo '</td>';
      					echo '</tr>';
      			}
      		}
      		?>

        </tbody>
      </table>
    </div>

  </div>
</div>
</div>
</br>
</br>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="./js/tippy.all.min.js"> </script>
<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>

<script>

/* Page Loading Bar */

;(function(){
  function id(v){return document.getElementById(v); }
  function loadbar() {
    var ovrl = id("load-overlay"),
        prog = id("progress"),
        stat = id("progstat"),
        img = document.images,
        c = 0;
        tot = img.length;

    function imgLoaded(){
      c += 1;
      var perc = ((100/tot*c) << 0) +"%";
      prog.style.width = perc;
      stat.innerHTML = "Loading "+ perc;
      if(c===tot) return doneLoading();
    }
    function doneLoading(){
      ovrl.style.opacity = 0;
      setTimeout(function(){
        ovrl.style.display = "none";
      }, 1200);
    }
    for(var i=0; i<tot; i++) {
      var tImg     = new Image();
      tImg.onload  = imgLoaded;
      tImg.onerror = imgLoaded;
      tImg.src     = img[i].src;
    }
  }
  document.addEventListener('DOMContentLoaded', loadbar, false);
}());

/*  Filter LoL Button*/


function filterLol(){

$('#officerTable tr:not(:contains("League Of Legends"))').hide();
$('#memberTable tr:not(:contains("League Of Legends"))').hide();
$('.lol_member_count').css("display", "block");
$('.apex_member_count').css("display", "none");
$('.eu4_member_count').css("display", "none");
$('.casual_member_count').css("display", "none");
$('.rl_member_count').css("display", "none");
}

/*  Filter Apex Button*/


function filterApex(){
	// alert('Filtering for Apex');
	$('#officerTable tr:not(:contains("Apex Legends"))').hide();
	$('#memberTable tr:not(:contains("Apex Legends"))').hide();
	$('.apex_member_count').css("display", "block");

	$('.lol_member_count').css("display", "none");
	$('.eu4_member_count').css("display", "none");
	$('.casual_member_count').css("display", "none");
	$('.rl_member_count').css("display", "none");
}

/*  Filter EU4 Button*/


function filterEu4(){

	// alert('Filtering for EU4');
	$('#officerTable tr:not(:contains("Europa Universalis 4"))').hide();
	$('#memberTable tr:not(:contains("Europa Universalis 4"))').hide();
  $('.eu4_member_count').css("display", "block");

	$('.apex_member_count').css("display", "none");
	$('.lol_member_count').css("display", "none");
	$('.casual_member_count').css("display", "none");
	$('.rl_member_count').css("display", "none");
}

/*  Filter Casual Button*/


function filterCasualGames(){
	// alert('Filtering for Casual');
	$('#officerTable tr:not(:contains("Other"))').hide();
	$('#memberTable tr:not(:contains("Other"))').hide();
	$('.casual_member_count').css("display", "block");

	$('.apex_member_count').css("display", "none");
	$('.lol_member_count').css("display", "none");
	$('.eu4_member_count').css("display", "none");
	$('.rl_member_count').css("display", "none");
}

/*  Filter RL Button*/

function filterRL(){

	// alert('Filtering for RL');
	$('#officerTable tr:not(:contains("Rocket League"))').hide();
	$('#memberTable tr:not(:contains("Rocket League"))').hide();
	$('.rl_member_count').css("display", "block");

	$('.casual_member_count').css("display", "none");
	$('.apex_member_count').css("display", "none");
	$('.lol_member_count').css("display", "none");
	$('.eu4_member_count').css("display", "none");
}

/*  Filter Competetive Button*/
function filterComp(){
	// alert('Filtering for COMP');
	$('#officerTable tr:not(:contains("Competitive"))').hide();
	$('#memberTable tr:not(:contains("Competitive"))').hide();
}

/*  Filter Casual Button*/
function filterCasualPlayers(){
	// alert('Filtering for Casual players');
	$('#officerTable tr:not(:contains("Casual"))').hide();
	$('#memberTable tr:not(:contains("Casual"))').hide();
}

/* Reset Filters Button*/


function resetFilt() {
	$('#officerTable tr:not(:contains("Casual"))').show();
	$('#memberTable tr:not(:contains("Casual"))').show();

	$('#officerTable tr:not(:contains("Apex Legends"))').show();
	$('#memberTable tr:not(:contains("Apex Legends"))').show();

	$('#officerTable tr:not(:contains("League Of Legends"))').show();
    $('#memberTable tr:not(:contains("League Of Legends"))').show();

	$('#officerTable tr:not(:contains("Europa Universalis 4"))').show();
	$('#memberTable tr:not(:contains("Europa Universalis 4"))').show();

    $('#officerTable tr:not(:contains("Other"))').show();
    $('#memberTable tr:not(:contains("Other"))').show();

	$('#officerTable tr:not(:contains("Rocket League"))').show();
	$('#memberTable tr:not(:contains("Rocket League"))').show();

	$('#officerTable tr:not(:contains("Competitive"))').show();
	$('#memberTable tr:not(:contains("Competitive"))').show();


	$('.lol_member_count').css("display", "none");
	$('.apex_member_count').css("display", "none");
	$('.eu4_member_count').css("display", "none");
	$('.casual_member_count').css("display", "none");
	$('.rl_member_count').css("display", "none");
}
/* Open Positions Overlay*/
function OpenPositionsNav() {
  document.getElementById("Positions-overlay").style.height = "100%";
}

/* Close Positions Overlay*/
function ClosePositionsNav() {
  document.getElementById("Positions-overlay").style.height = "0%";
}

/* Open Icons Overlay */
function OpenIconsNav() {
  document.getElementById("Icons-overlay").style.height = "100%";
}

/* Close Icons Overlay */
function CloseIconsNav() {
  document.getElementById("Icons-overlay").style.height = "0%";
}
</script>



<!-- Explanation bar. -->


<div class="ToolTipBarWrapper" style="">
	<div class="explainationtoggle topdisplay closed" data-tippy="" data-original-title="Explanations"><i class="fas fa-sort-down fa-sort-up"></i></div>
			<div class="ToolTipBar">
					<div class="catListWrapper">
							<ul class="catList main-menu">
									<!-- MAIN MENU -->
									<li class="main" data-value="Positions">
											<div class="main-container" onclick="OpenPositionsNav()"><i class="fas fa-map-marker"></i><span>Positions</span></div>
									</li>
									<li class="main" data-value="Icons">
											<div class="main-container" onclick="OpenIconsNav()"><i class="fas fa-square"></i><span>Icons</span></div>
									</li>
							</ul>
					</div>
			</div>
	</div>

	</body>
</html>
