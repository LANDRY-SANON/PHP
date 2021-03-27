
<?PHP
    // gerer le fichier de données:
    $etudiants = array();
    $f = fopen("listeEleve.csv", "r");
    while($ligne = fgetcsv($f)){
        array_push($etudiants, array($ligne[0], $ligne[1]));
    }
?>
 
 <?php 

 

@$page=$_GET["page"];    
$nbr_ele_par_page = 2;
$n_pages = ceil(count($etudiants)/$nbr_ele_par_page);
$debut=($page-1)*$nbr_ele_par_page;


for($i=1;$i<=$n_pages;$i++){
    echo "<a href= '?page=$i'>$i</a>&nbsp;";
}
?>
<!DOCTYPE html>
<html lang="fr-FR" >
   <head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_de_base.css">
    <title>Document</title>
   </head>
   <body>
   <?php for($etudiant=1; $etudiant<count($etudiants); $etudiant++) { ?>
        <?php 
            $val = array();
            do{
                $val = array(random_int(150, 850), random_int(150, 850), random_int(150, 850), random_int(150, 850));
                $repetition = false;

                if(count(array_unique($val))!=4){
                    $repetition = true;
                }
            }while($repetition);

        ?>
   <div>
   <table  width=100%><tr ><th width=50%>Enoncé pour <?php echo $etudiants[$etudiant][0]." ".$etudiants[$etudiant][1] ?></th>
    <th align=left > &emsp; &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Solution pour <?php echo $etudiants[$etudiant][0]." ".$etudiants[$etudiant][1] ?></th>
        <div >
             <table border=1 align=left width=48% >
             <tr>
                <th>bin</th><th>Oct</th><th>Dec</th><th>hex</th>
                
             </tr>
             <tr>
                <td> <?php echo decbin($val[0]) ?> </td>  <td > </td>  <td> </td> <td> </td>
             </tr>
             <tr>
                <td width =48%> </td> <td> <?php echo decoct($val[1]) ?></td>  <td> </td><td> </td>
             </tr>
             <tr >
                <td> </td> <td> </td>  <td> <?php echo $val[1] ?></td><td> </td>
             </tr>
             <tr>
                <td> </td> <td> </td>  <td> </td><td> <?php echo dechex($val[2]) ?> </td>
             </tr>
             
             </table>
        </div>
        
        <div >
        
              <table border=1 align=right width=48%  >
              
		    <tr>
                <th>bin</th><th>Oct</th><th>Dec</th><th>hex</th>
             <?php for($i=0; $i<=3; $i++){ ?>
             <tr>
                <td><?php echo decbin($val[$i]) ?> </td> <td><?php echo $val[$i] ?> </td>  <td><?php echo dechex($val[$i]) ?> </td><td> <?php echo dechex($val[$i]) ?> </td>
             </tr>
             <?php } ?>
             </table>
       </div>
    </div> 

    <?php } ?>        	  
   </body>
   </center>

    <br>
    <br/>

    <a href="javascript:window.print()"><button>imprimer la page</button></a>

</center>
</html>