<?php
$jmlAP = intval($_POST["ap"]);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Coloring Graph</title>
</head>
<body>
	<form id="formGraph" action="index.php" method="POST">
		<h1 align="center">Tugas Akhir Strategi Algoritma</h1>
		<h2 align="center">Tentukan Adjensi Matrix</h2>
		<table style="text-align: center;" border="1px" align="center">
			<?php
			$row  = "";
			$row .= "<tr>";
			$row .= "<td>#</td>";
			for($i=0; $i< $jmlAP; $i++){
				$row .= "<td align='right' valign='middle'>";
				$row .= "Node ".$i;
				$row .= "</td>";
			}
			$row .= "</tr>";
			$row .= "<tr>";
			for($i=0; $i< $jmlAP; $i++){
				$row .= "<td align='right' valign='middle'>";
				$row .= "Node ".$i;
				$row .= "</td>";
				for ($j=0; $j < $jmlAP; $j++) { 
					if($j>$i){
						$row .= "<td align='right'>";
						$row .= "<select name='node[".$j."][".$i."]'><option value='0'>0</option><option value='1'>1</option></select>";
						$row .= "</td>";
					}else{
						$row .= "<td align='right'>";
						$row .= "<input type='hidden' name='node[".$j."][".$i."]' value='0'>&nbsp;";
						$row .= "</td>";
					}
				}
				$row .= "</tr>";
			}
			echo $row;
			?>
			<tr>
				<td align="right" colspan="<?php echo $i+1;?>"><input type="submit" value="Lihat Hasil"></td>
			</tr>
		</table>
	</form>
</body>
</html>