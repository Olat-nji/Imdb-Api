<?php


if($isset($_GET['search'])){
$search=$_GET['search'];
}else if(isset($_POST['search'])){$search=$_POST['search'];}else{
$search='';}
$url = 'https://www.imdb.com/find?q='.$search.'&s=tt&ttype=ft&ref_=fn_ft';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($curl);


preg_match_all('!<tr class="findResult odd"> (.{0,420}) <\/tr>!', $response, $matches);
$links=array_unique($matches[0]);




//$c = array_combine($a, $b);
$array_values=array();
for($i=0; $i<count($links);$i++){
   
   $image=preg_match('!https://m.media-amazon.com/images/M/[^\s]*?.jpg!', $links[$i], $dump);
    if(isset($dump[0]))
    $image=$dump[0];
    $image=str_replace('._V1_UX32_CR0,0,32,44_AL_','._V1_UX182_CR0,0,182,268_AL_',$image);
    
 
  $link=preg_match('!/title/[^\s]*?"!', $links[$i], $dumplink);
    if(isset($dumplink))
   $link=$dumplink[0];
    $link=str_replace('"','',$link);
    
    preg_match('!<td class="result_text">(.*)<\/td>!', $links[$i], $dumpgen);
    if(isset($dumpgen))
    $gen_string=$dumpgen[0];
    $gen_string=str_replace('<td class="result_text">','',$gen_string);
    $name=str_replace('</td>','',$gen_string);
    preg_match('!href="\/title\/(.{0,30})"!', $gen_string, $rep);
    $reps=$rep[0];
    
    $name=str_replace($reps,'',$gen_string);
    preg_match('!<a(.*)>(.*)<\/a>!', $name, $repname);
    preg_match('!\((.*)\)!', $name, $repdate);
    $name=$repname[0];
    if(isset($repdate[0]))
    $date=str_replace('(', '',$repdate[0]);
    $date=str_replace(')', '',$date);
    
    $name=str_replace('<a  >','',$name);
    $name=str_replace('</a>','',$name);
    
    $array_values[$i]=array('name' => $name, 'link' => $link, 'image' => $image, 'date' => $date);
    
//  $name=preg_match('!https://m.media-amazon.com/images/M/[^\s]*?.jpg!', $links[$i], $dumpname);
//    $name=$dumpname[0];
}
   
        
      


$err = curl_error($curl);

if($err){
    // there was an error contacting the IMDB API
  die( $err);
}else{
    echo json_encode($array_values);
}



curl_close($curl);




?>
