<?php
use Illuminate\Support\Facades\Storage;
//function for date values
function month(){
    $html ="<option value='' disabled selected>Month</option><option value='01'>Jan</option><option value='02'>Feb</option><option value='03'>Mar</option><option value='04'>Apr</option> <option value='05'>May</option><option value='06'>Jun</option><option value='07'>Jul</option><option value='08'>Aug</option><option value='09'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option>";

    return $html;
}
function year(){
    $firstYear = date("Y");
    $lastYear = 1900;
    for($i=$firstYear;$i>=$lastYear;$i--){
        echo '<option value='.$i.'>'.$i.'</option>';
    }
}
function yearPlus50(){
    $firstYear = date("Y");
    $lastYear = 1900;
    for($i=$firstYear+20;$i>=$lastYear;$i--){
        echo '<option value='.$i.'>'.$i.'</option>';
    }
}
function get_local_time(){

    $ip = file_get_contents("http://ipecho.net/plain");

    $url = 'http://ip-api.com/json/'.$ip;

    $tz = file_get_contents($url);

    $tz = json_decode($tz,true)['timezone'];

    return $tz;

 }

 function imgLocalOrLive($filename) {
    // Local
    if($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
        return asset('images/'.$filename);
    }
    // Live
    else{
        return 'https://assetsmdr.fra1.digitaloceanspaces.com/'.$filename;
    }
 }

 function saveImgToLocalOrLive($foldername,$name,$photo){
    // Local
    if($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
        $photo->save(public_path().'/images/'.$foldername .  $name);
    }
    // Live
    else{
        $photo->save($name);
        Storage::put($foldername.$name, $photo, 'public');
    }
 }

?>
<?php
// Medical History Section
// get summary of unit and frequency

// End of Medical History
?>
