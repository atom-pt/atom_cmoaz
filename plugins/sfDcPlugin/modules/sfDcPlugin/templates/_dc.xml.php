<?php
/*
 * This file is part of the Access to Memory (AtoM) software.
 *
 * Access to Memory (AtoM) is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Access to Memory (AtoM) is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Access to Memory (AtoM).  If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * Extended methods for compliance to the Portuguese National Portal of Archives, see <https://portal.arquivos.pt/>.
 *
 * @package AccesstoMemory
 * @author Helder Gomes Silva <gomesxsilva@gmail.com>
 * @author João Pereira <pereirabrothers@portugalmail.pt>
 * @author Ricardo Pinho <ricardodepinho@gmail.com>
 */
/**
Dublin Core elements output by the following order:
<dc:title>
<dc:subject>
<dc:publisher>
<dc:date>
<dc:date>
<dc:type>
<dc:format>
<dc:identifier>
<dc:identifier>
<dc:language>
<dc:relation>
<dc:rights>
<dc:creator>
*/
?>

<oai_dc:dc
    xmlns:oai_dc="http://www.openarchives.org/OAI/2.0/oai_dc/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.openarchives.org/OAI/2.0/oai_dc/
    http://www.openarchives.org/OAI/2.0/oai_dc.xsd">

 <?php

    foreach ($resource->getNotesByType(array(
      'noteTypeId' => QubitTerm::GENERAL_NOTE_ID
    )) as $notas)
    {
    }
    if ((!isset($resource->title) and (strpos(strval($resource->levelOfDescription), 'omposto') == true or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "DC")) or (esc_specialchars(strval($resource->title) == esc_specialchars(strval($dc->identifier)) and (strpos(strval($resource->levelOfDescription), 'omposto') == true or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "DC"))))
    {
      echo "<dc:title>" . "[Sem título]" . "</dc:title>";
    }
    elseif ($rest = substr(esc_specialchars(strval($resource->title)), 0, 1) == "[" and $rest = substr(esc_specialchars(strval($resource->title)), -1) == "]" and esc_specialchars(strval($resource->title)) != "[Sem título]" and esc_specialchars(strval($resource->title)) != "[Sem título, contendo dados não identificáveis]")
    {
      echo "<dc:title>" . "[" . substr(esc_specialchars(strval($resource->title)), 1, -1) . "]" . "</dc:title>";
    }
    elseif ($rest = substr(esc_specialchars(strval($resource->title)), -18) == "ítulo atribuído]" or $rest = substr(esc_specialchars(strval($resource->title)), -18) == "ítulo atribuído)" or $rest = substr(esc_specialchars(strval($resource->title)), -18) == "ítulo atribuído)" or $rest = substr(esc_specialchars(strval($resource->title)), -18) == "ítulo Atribuído)" or $rest = substr(esc_specialchars(strval($resource->title)), -18) == "ítulo atribuído]")
    {
      echo "<dc:title>" . "[" . substr(esc_specialchars(strval($resource->title)), 0, -21) . "]" . "</dc:title>";
    }
    elseif ($rest = substr(esc_specialchars(strval($resource->title)), -10) == "tribuído]" or $rest = substr(esc_specialchars(strval($resource->title)), -10) == "tribuído)")
    {
      echo "<dc:title>" . "[" . substr(esc_specialchars(strval($resource->title)), 0, -13) . "]" . "</dc:title>";
    }
    elseif (strpos(strval($notas), 'ítulo atribuído') != false and $rest = substr(esc_specialchars(strval($resource->title)), 0, 1) !== "[" and $rest = substr(esc_specialchars(strval($resource->title)), -1) != "]" and $rest = substr(esc_specialchars(strval($resource->title)), -10) != "tribuído]" and $rest = substr(esc_specialchars(strval($resource->title)), -10) != "tribuído)")
    {
      echo "<dc:title>" . "[" . esc_specialchars(strval($resource->title)) . "]" . "</dc:title>";
    }
    else
    {
      echo "<dc:title>" . esc_specialchars(strval($resource->title)) . "</dc:title>";
    }
  ?>

<dc:subject><?php
foreach ($dc->coverage as $locais)
 {
   }
    foreach ($dc->subject as $assuntos)
 {
    }
$searchArray = array(".\n", ":\n\n", ":\n-", ":\nSR:", "\nSR:", ";\n-", "\n-", "\n\n");
$replaceArray = array(". ", ": ", ": ", ": SR:", "; SR:", "; ", " -", " • ");
if (!empty(esc_specialchars(strval($resource->scopeAndContent))) and isset($locais) ) {
echo str_replace($searchArray, $replaceArray, esc_specialchars(strval($resource->scopeAndContent))) .  " • ";
} else {
echo str_replace($searchArray, $replaceArray, esc_specialchars(strval($resource->scopeAndContent)));
}
if (isset($locais)) {
echo "Áreas geográficas e topónimos: ";
echo esc_specialchars(strval($locais));
}
if (isset($assuntos) and !empty(esc_specialchars(strval($resource->scopeAndContent)))) {
echo " • ";
}

if (isset($locais) and isset($assuntos) and empty(esc_specialchars(strval($resource->scopeAndContent))) ) {
echo " • ";
}

if (isset($assuntos)) {
echo "Assuntos: ";
echo esc_specialchars(strval($assuntos));
}
if (!empty($locais) or !empty($assuntos)) {
echo ".";
}
?></dc:subject>

<?php if ($value = $resource->getRepository(array('inherit' => true))): ?>
  <dc:publisher><?php echo esc_specialchars(strval($value)) ?></dc:publisher>
<?php endif; ?>

<?php
    foreach ($resource->getDates() as $itema)
    {
    }
    if (strlen(Qubit::renderDate($itema->startDate)) > 4 and strlen(Qubit::renderDate($itema->startDate)) < 10 and
 ($rest = substr(esc_specialchars(strval(Qubit::renderDate($itema->startDate))), 3, 1) == "-" or $rest =
substr(esc_specialchars(strval(Qubit::renderDate($itema->startDate))), 4, 1) == "-" or
 $rest = substr(esc_specialchars(strval(Qubit::renderDate($itema->startDate))), 6, 1) == "-"))
    {
      echo "<dc:date>" . date('Y-m-d', strtotime(Qubit::renderDate($itema->startDate))) . "</dc:date>";
    }
    elseif (strlen(Qubit::renderDate($itema->startDate)) == 3)
    {
      echo "<dc:date>" . Qubit::renderDate($itema->startDate) . "0" . "</dc:date>";
    }
    elseif (strlen(Qubit::renderDate($itema->startDate)) < 3)
    {
    }
    else
    {
      if (isset($itema->startDate))
      {
        echo "<dc:date>";
      }
      echo Qubit::renderDate($itema->startDate);
      if (isset($itema->startDate))
      {
        echo "</dc:date>";
      }
    }
  ?>

  <?php
    foreach ($resource->getDates() as $itemb)
    {
    }
    if (strlen(Qubit::renderDate($itemb->endDate)) > 4 and strlen(Qubit::renderDate($item->endDate)) < 10 and
($rest = substr(esc_specialchars(strval(Qubit::renderDate($itemb->endDate))), 3, 1) == "-" or $rest =
 substr(esc_specialchars(strval(Qubit::renderDate($itemb->endDate))), 4, 1) == "-" or
 $rest = substr(esc_specialchars(strval(Qubit::renderDate($itemb->endDate))), 6, 1) == "-"))
    {
      echo "<dc:date>" . date('Y-m-d', strtotime(Qubit::renderDate($itemb->endDate))) . "</dc:date>";
    }
    elseif (strlen(Qubit::renderDate($itemb->endDate)) == 3)
    {
      echo "<dc:date>" . Qubit::renderDate($itemb->endDate) . "0" . "</dc:date>";
    }
    elseif (strlen(Qubit::renderDate($itemb->endDate)) < 3)
    {
    }
    else
    {
      if (isset($itemb->endDate))
      {
        echo "<dc:date>";
      }
      echo Qubit::renderDate($itemb->endDate);
      if (isset($itemb->endDate))
      {
        echo "</dc:date>";
      }
    }
  ?>

  <?php
    foreach ($dc->date as $item1)
    {
    }
    foreach ($resource->getDates() as $item2)
    {
    }
    preg_match('/[0-9]{4}/', strval($item1), $aaaa);
    preg_match('/[0-9]{3}/', strval($item1), $aaa);
    preg_match('/[0-9]{2}/', strval($item1), $aa);
    if (!isset($item1) and !isset($item2->startDate) and !isset($item2->endDate))
    {
      echo "<dc:date>" . "1801" . "</dc:date>";
    }
    if (isset($item1) and !isset($item2->startDate) and !isset($item2->endDate) and strlen(esc_specialchars(strval($item1))) > 6 and strlen(esc_specialchars(strval($item1))) < 11 and stripos(strtolower(strval("##" . $item1)), 'c.') == false and stripos(strtolower(strval("##" . $item1)), 'ca.') == false and (substr(esc_specialchars(strval($item1)), 1, 1) == "-" or substr(esc_specialchars(strval($item1)), 1, 1) == "." or substr(esc_specialchars(strval($item1)), 2, 1) == "-" or substr(esc_specialchars(strval($item1)), 2, 1) == "."))
    {
      echo "<dc:date>" . date('Y-m-d', strtotime($item1)) . "</dc:date>";
      echo "<dc:date>" . date('Y-m-d', strtotime($item1)) . "</dc:date>";
    }
    if (isset($item1) and !isset($item2->startDate) and !isset($item2->endDate) and strlen(esc_specialchars(strval($item1))) > 6 and strlen(esc_specialchars(strval($item1))) < 11 and (substr(esc_specialchars(strval($item1)), 1, 1) == "/" or substr(esc_specialchars(strval($item1)), 2, 1) == "/"))
    {
      $date = str_replace('/', '-', $item1);
      echo "<dc:date>" . date('Y-m-d', strtotime($date)) . "</dc:date>";
      echo "<dc:date>" . date('Y-m-d', strtotime($date)) . "</dc:date>";
    }
    if (isset($item1) and !isset($item2->startDate) and !isset($item2->endDate) and $rest = substr(esc_specialchars(strval($item1)), 0, 10) == date('Y-m-d', $rest = strtotime(substr(esc_specialchars(strval($item1)), 0, 10))) and (substr(esc_specialchars(strval($item1)), 12, 1) . substr(esc_specialchars(strval($item1)), 7, 1) . substr(esc_specialchars(strval($item1)), 4, 1)) != "---")
    {
      echo "<dc:date>" . $rest = substr(esc_specialchars(strval($item1)), 0, 10) . "</dc:date>";
    }
    if (isset($item1) and !isset($item2->startDate) and !isset($item2->endDate) and (stripos(strtolower(strval($item1)), '--]') == false or stripos(strtolower(strval($item1)), '--]') > 5) and (stripos(strtolower(strval($item1)), '--?]') == false or stripos(strtolower(strval($item1)), '--?]') > 5) and (stripos(strtolower(strval($item1)), '-]') == false or stripos(strtolower(strval($item1)), '-]') > 5) and (stripos(strtolower(strval($item1)), '-?]') == false or stripos(strtolower(strval($item1)), '-?]') > 5) and ($rest = substr(esc_specialchars(strval($item1)), 0, 10) != date('Y-m-d', $rest = strtotime(substr(esc_specialchars(strval($item1)), 0, 10))) or (substr(esc_specialchars(strval($item1)), 12, 1) . substr(esc_specialchars(strval($item1)), 7, 1) . substr(esc_specialchars(strval($item1)), 4, 1)) == "---") and esc_specialchars(strval($item1)) != (strlen(esc_specialchars(strval($item1))) > 6 and strlen(esc_specialchars(strval($item1))) < 11 and (substr(esc_specialchars(strval($item1)), 1, 1) == "-" or substr(esc_specialchars(strval($item1)), 1, 1) == "/" or (substr(esc_specialchars(strval($item1)), 1, 1) == "." and substr(esc_specialchars(strval($item1)), 1, 1) != "c" and substr(esc_specialchars(strval($item1)), 0, 1) != "c") or substr(esc_specialchars(strval($item1)), 2, 1) == "-" or substr(esc_specialchars(strval($item1)), 2, 1) == "/" or (substr(esc_specialchars(strval($item1)), 2, 1) == "." and substr(esc_specialchars(strval($item1)), 1, 1) != "c" and substr(esc_specialchars(strval($item1)), 0, 1) != "c"))))
    {
      echo "<dc:date>" . $aaaa[0] . "</dc:date>";
    }
    if (!isset($item2->startDate) and !isset($item2->endDate) and stripos(strtolower(strval($item1)), '--]') !== false)
    {
      $datacerta   = $rest = substr(esc_specialchars(strval($item1)), stripos(strtolower(strval($item1)), $aa[0]), stripos(strtolower(strval($item1)), '--]') - stripos(strtolower(strval($item1)), $aa[0])) . "00";
      preg_match('/[0-9]{4}/', strval($datacerta), $aaaacerta);
      echo "<dc:date>" . ($aaaacerta[0] + 1) . "</dc:date>";
      echo "<dc:date>" . ($aaaacerta[0] + 100) . "</dc:date>";
    }
    elseif (isset($item1) and !isset($item2->startDate) and !isset($item2->endDate) and stripos(strtolower(strval($item1)), '-]') !== false)
    {
      echo "<dc:date>" . $rest = substr(esc_specialchars(strval($item1)), stripos(strtolower(strval($item1)), $aaa[0]), stripos(strtolower(strval($item1)), '-]') - stripos(strtolower(strval($item1)), $aaa[0])) . "0" . "</dc:date>";
      echo "<dc:date>" . $rest = substr(esc_specialchars(strval($item1)), stripos(strtolower(strval($item1)), $aaa[0]), stripos(strtolower(strval($item1)), '-]') - stripos(strtolower(strval($item1)), $aaa[0])) . "9" . "</dc:date>";
    }
    if (!isset($item2->startDate) and !isset($item2->endDate) and (stripos(strtolower(strval($item1)), '--]') == false or stripos(strtolower(strval($item1)), '--]') < 6) and (stripos(strtolower(strval($item1)), '--?]') == false or stripos(strtolower(strval($item1)), '--?]') < 6) and (stripos(strtolower(strval($item1)), '-]') == false or stripos(strtolower(strval($item1)), '-]') < 6) and (stripos(strtolower(strval($item1)), '-?]') == false or stripos(strtolower(strval($item1)), '-?]') < 6) and stripos(strtolower(strval($item1)), '--?]') !== false)
    {
      $dataincerta   = $rest = substr(esc_specialchars(strval($item1)), stripos(strtolower(strval($item1)), $aa[0]), stripos(strtolower(strval($item1)), '--?]') - stripos(strtolower(strval($item1)), $aa[0])) . "00";
      preg_match('/[0-9]{4}/', strval($dataincerta), $aaaaincerta);
      echo "<dc:date>" . ($aaaaincerta[0] + 1) . "</dc:date>";
      echo "<dc:date>" . ($aaaaincerta[0] + 100) . "</dc:date>";
    }
    elseif (isset($item1) and !isset($item2->startDate) and !isset($item2->endDate) and stripos(strtolower(strval($item1)), '-?]') !== false and stripos(strtolower(strval($item1)), ']- [') == false and stripos(strtolower(strval($item1)), ']-[') == false)
    {
      echo "<dc:date>" . $rest = substr(esc_specialchars(strval($item1)), stripos(strtolower(strval($item1)), $aaa[0]), stripos(strtolower(strval($item1)), '-?]') - stripos(strtolower(strval($item1)), $aaa[0])) . "0" . "</dc:date>";
      echo "<dc:date>" . $rest = substr(esc_specialchars(strval($item1)), stripos(strtolower(strval($item1)), $aaa[0]), stripos(strtolower(strval($item1)), '-?]') - stripos(strtolower(strval($item1)), $aaa[0])) . "9" . "</dc:date>";
    }
  ?>

  <?php
    foreach ($dc->date as $item1)
    {
    }
    foreach ($resource->getDates() as $item2)
    {
    }
    preg_match('/[0-9]{4}/', strrev(strval($item1)), $aaaa);
    if (!isset($item1) and !isset($item2->startDate) and !isset($item2->endDate))
    {
      echo "<dc:date>" . "1900" . "</dc:date>";
    }
    if (isset($item1) and !isset($item2->startDate) and !isset($item2->endDate) and $rest = substr(esc_specialchars(strval($item1)), 11, 10) == date('Y-m-d', $rest = strtotime(substr(esc_specialchars(strval($item1)), 11, 10))))
    {
      echo "<dc:date>" . $rest = substr(esc_specialchars(strval($item1)), 11, 10) . "</dc:date>";
    }
    if (isset($item1) and !isset($item2->startDate) and !isset($item2->endDate) and $rest = substr(esc_specialchars(strval($item1)), 13, 10) == date('Y-m-d', $rest = strtotime(substr(esc_specialchars(strval($item1)), 13, 10))))
    {
      echo "<dc:date>" . $rest = substr(esc_specialchars(strval($item1)), 13, 10) . "</dc:date>";
    }
    if (isset($item1) and !isset($item2->startDate) and !isset($item2->endDate) and $rest = substr(esc_specialchars(strval($item1)), 11, 10) != date('Y-m-d', $rest = strtotime(substr(esc_specialchars(strval($item1)), 11, 10))) and $rest = substr(esc_specialchars(strval($item1)), 13, 10) != date('Y-m-d', $rest = strtotime(substr(esc_specialchars(strval($item1)), 13, 10))) and (stripos(strtolower(strval($item1)), '-]') == false or stripos(strtolower(strval($item1)), '-]') > 5) and (stripos(strtolower(strval($item1)), '-?]') == false or stripos(strtolower(strval($item1)), '-?]') > 5) and esc_specialchars(strval($item1)) != date('Y-m-d', strtotime($item1)) and esc_specialchars(strval($item1)) != (strlen(esc_specialchars(strval($item1))) > 6 and strlen(esc_specialchars(strval($item1))) < 11 and (substr(esc_specialchars(strval($item1)), 1, 1) == "-" or substr(esc_specialchars(strval($item1)), 1, 1) == "/" or substr(esc_specialchars(strval($item1)), 1, 1) == "." or substr(esc_specialchars(strval($item1)), 2, 1) == "-" or substr(esc_specialchars(strval($item1)), 2, 1) == "/" or substr(esc_specialchars(strval($item1)), 2, 1) == ".")))
    {
      echo "<dc:date>" . strrev($aaaa[0]) . "</dc:date>";
    }
    if (isset($item1) and !isset($item2->startDate) and !isset($item2->endDate) and esc_specialchars(strval($item1)) == date('Y-m-d', strtotime($item1)))
    {
      echo "<dc:date>" . esc_specialchars(strval($item1)) . "</dc:date>";
    }
  ?>

  <?php
    if (isset($resource->levelOfDescription))
    {
      echo "<dc:type>";
      if (strpos(strval($resource->levelOfDescription), 'ub') != true and (esc_specialchars(strval($resource->levelOfDescription)) == "Colecção" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -6) == " Fundo" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -6) == " fundo" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -8) == "gregação" or esc_specialchars(strval($resource->levelOfDescription)) == "Col. F"))
      {
        echo "Coleção";
      }
      elseif (strpos(strval($resource->levelOfDescription), 'colecção') != false)
          {
        echo substr(esc_specialchars(strval($resource->levelOfDescription)), 0, -10) . "coleção";
      }
      elseif (strpos(strval($resource->levelOfDescription), 'arquivo') != false)
      {
        echo substr(esc_specialchars(strval($resource->levelOfDescription)), 0, -7) . "fundo";
      }
      elseif (strpos(strval($resource->levelOfDescription), 'ub') != true and ($rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -4) == "undo" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -6) == "rquivo") or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -1) == "F")
      {
        echo "Fundo";
      }
      elseif (strpos(strval($resource->levelOfDescription), 'ub') != true and ($rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -5) == "ecção") or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "SC")
      {
        echo "Secção";
      }
      elseif (strpos(strval($resource->levelOfDescription), 'ub') != true and $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -3) == "rie" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "SR" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -7) == "Col. SR")
      {
        echo "Série";
      }
      elseif ($rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -8) == "stalação" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "UI")
      {
        echo "Unidade de instalação";
      }
      elseif ($rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -7) == "omposto" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "DC")
      {
        echo "Documento composto";
      }
      elseif (esc_specialchars(strval($resource->levelOfDescription)) == "Documento" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -6) == "imples" or $rest = substr(esc_specialchars(strval($resource->levelOfDescription)), -2) == "DS")
      {
        echo "Documento simples";
      }
      else
      {
        echo esc_specialchars(strval($resource->levelOfDescription));
      }
      echo "</dc:type>";
    }
  ?>

  <dc:format><?php echo esc_specialchars(strval($resource->extentAndMedium)) ?></dc:format>

  <dc:identifier><?php
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on")
    {
      echo "https://";
    }
    else
    {
      echo "http://";
    }
    echo esc_specialchars($sf_request->getHost() . $sf_request->getRelativeUrlRoot() . '/' . $resource->slug);
?></dc:identifier>

  <dc:identifier><?php echo esc_specialchars(strval($dc->identifier)) ?></dc:identifier>

  <dc:language xsi:type="dcterms:ISO639-3"><?php foreach ($resource->language as $code) {} if (isset($code)) {echo esc_specialchars(strval(strtolower($iso639convertor->getID3($code)))); } else {echo "por";} ?></dc:language>

  <?php
    foreach ($resource->digitalObjects as $digitalObject)
    {
      foreach ($dc->type as $registosonoro)
      {
      }
    }
    if (isset($resource->digitalObjects[0]) and $registosonoro != "sound")
    {
      echo "<dc:relation>";
      if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on")
      {
        echo "https://";
      }
      else
      {
        echo "http://";
      }
      echo $sf_request->getHost() . $sf_request->getRelativeUrlRoot() . $digitalObject->path . $digitalObject->getChildByUsageId(QubitTerm::THUMBNAIL_ID);
      echo "</dc:relation>";
    }
    elseif (isset($resource->digitalObjects[0]) and $registosonoro == "sound")
    {
      echo "<dc:relation>https://raw.githubusercontent.com/artefactual/atom/stable/2.4.x/images/generic-icons/audio.png</dc:relation>";
    }
?>
    
<?php if (!empty($resource->accessConditions)): ?>
  <dc:rights><?php echo esc_specialchars(strval($resource->accessConditions)) ?></dc:rights>
<?php endif; ?>

<?php
   foreach ($resource->ancestors->andSelf()->orderBy('rgt') as $item) {
    if (0 < count($item->getCreators())){
      foreach ($item->getCreators() as $ancestor) {
        if (!empty($ancestor)) {
          echo "<dc:creator>";
          echo esc_specialchars(strval($ancestor));
          echo "</dc:creator>";
          break;
        }
      }
      break;
    }
  }
?> 

</oai_dc:dc>
