<table>
	<tr>
		<th>Fichier</th>
	</tr>
			<?php
				foreach ($fichiers as $key=>$fichier) {
					foreach ($fichier as $key1=>$value){
						echo "<tr><td>".$value."</td></tr>";
					}
				}
			?>
</table>