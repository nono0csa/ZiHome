<?
if(isset($_SESSION['auth']) && $_SESSION['niveau'] == 'admin')
{
  if(isset($_POST['Supprimer']))
  {
    $query = "DELETE FROM `insertion` WHERE `id`='".$_POST['id']."'";
    mysql_query($query, $link) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
  }
  else if(isset($_POST['Valider']))
  {
    $query = null;
    if (!(empty($_POST['url'])))
    { 
      $query .= "`url`= '".$_POST['url']."', "; 
    }
    $query = "UPDATE `insertion` SET ".$query."`icone`= '".$_POST['icone']."', `libelle` = '".$_POST['libelle']."', `public` = '".$_POST['public']."' WHERE `id`='".$_POST['id']."'";
    mysql_query($query, $link) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
  }
  else if(isset($_POST['Ajouter']))
  {
    $query = "INSERT INTO insertion (url, icone, libelle, public) VALUES ('".$_POST['url']."', '".$_POST['icone']."', '".$_POST['libelle']."', '".$_POST['public']."')";
    mysql_query($query, $link) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
  }
?>
<div id="action-tableau">
<CENTER>
<br>
<TABLE border=0><TR class="title" bgcolor="#6a6a6a"><TH>Nom</TH><TH>Fichier</TH><TH>Icone</TH><TH>Public</TH><TH>&nbsp;</TH><TH>&nbsp;</TH></TR>
<?
  $query = "SELECT * FROM `insertion`";
  $req = mysql_query($query, $link) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
  while($data = mysql_fetch_assoc($req))
  {
    echo "<TR class='contenu'>";
      echo '<FORM method="post" action="./index.php?page=administration&detail=insertion">';
        echo '<INPUT TYPE="HIDDEN" NAME="id" VALUE="'.$data['id'].'"/>';
        echo '<TD><INPUT TYPE="text" NAME="libelle" VALUE="'.$data['libelle'].'"/></TD>';
        echo '<TD><INPUT TYPE="text" NAME="url" VALUE="'.$data['url'].'"/></TD>';
        echo '<TD><INPUT TYPE="text" NAME="icone" VALUE="'.$data['icone'].'"/></TD>';
        echo '<td><center><INPUT type="checkbox" name="public" value="1"';
        if ($data['public'] == "1")
        { 
          echo " checked"; 
        }
        echo '/></center></td>';        
        echo '<td class="input"><center><INPUT TYPE="SUBMIT" NAME="Valider" VALUE="Valider"/></center></td>';
        echo '<td class="input"><center><INPUT TYPE="SUBMIT" NAME="Supprimer" VALUE="Supprimer"/></center></td>';
      echo '</FORM>';
    echo '</TR>';
  }
?>      
</TABLE></CENTER></div>

<P align=center>
<TABLE class=panneau_table >
  <TR class=panneau_titre>
    <TH>Nouvelle page</TH>
  </TR>
  <TR>
    <TD class=panneau_centre>
      <CENTER>
      <TABLE>
        <FORM method="post" action="./index.php?page=administration&detail=insertion">
          <TR><TD class=panneau_libelle>Nom</TD><TD><INPUT type=text name='libelle'/></TD></TR>
          <TR><TD class=panneau_libelle>Fichier</TD><TD><INPUT type=text name='url'/></TD></TR>
          <TR><TD class=panneau_libelle>Icone</TD><TD><INPUT type=text name='icone'/></TD></TR>
          <TR><TD class=panneau_libelle>Public</TD><TD><INPUT type="checkbox" name="public" value="1"/></TD></TR>
          <TR><TD colspan=2 class=panneau_boutons><INPUT type=submit name='Ajouter' value='Ajouter'></TD></TR>
        </FORM>
      </TABLE>
      </CENTER>
    </TD>
  </TR>
</TABLE>
</P>
<? 
} 
?>

