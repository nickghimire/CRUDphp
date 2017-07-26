<?php
session_start();
if(isset($_SESSION['name'])){
	echo "<h1>".$_SESSION['name']."</h1>";
}
?>