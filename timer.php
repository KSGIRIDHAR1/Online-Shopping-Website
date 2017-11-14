<?php

// target date entered by user
$TargetDate = $month."/".$day."/".$year." ".$hour.":".$minute.":".$second." ".$hourclock;

// change target date to unix timestamp format
$UnixTargetDate = strtotime($month."/".$day."/".$year." ".$hourHC.":".$minute.":".$second);

// unix timestamp right now
$unixtime = strtotime("now");
}


?>

<script language="JavaScript">
//TargetDate = "7/30/2012 13:32";
ForeColor = "navy";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
DisplayFormat = "%%H%%:%%M%%:%%S%%";
FinishMessage = "Sold at: "


    // extract timer variables inputs
    var unixNow = parseInt("<?php echo $unixtime?>");
    var unixTarget = parseInt("<?php echo $UnixTargetDate?>");


function AdditionalSecond()
{

    if ((unixTarget - unixNow)>0 && (unixTarget - unixNow)<15)
    {
        // reset timer to 15s
        // update target date
        unixTarget = unixTarget + 15 - (unixTarget - unixNow);

    }
    else if ((unixTarget - unixNow)>15)
    {
        // do nothing continue countdown normally
        unixTarget=unixTarget;

    }
    else
    {
        // display that item is sold when time is up
        FinishMessage
    }

}

// call function AdditionalSecond() to be executed  
AdditionalSecond();

// create a new javascript Date object based on the timestamp
// multiplied by 1000 so that the argument is in milliseconds, not seconds
var date = new Date(unixTarget*1000);

// month part from the timestamp
var months = date.getMonth()+1;
// day part from the timestamp
var days = date.getDate();
// year part from the timestamp
var years = date.getFullYear();
// hours part from the timestamp
var hours = date.getHours();
// minutes part from the timestamp
var minutes = date.getMinutes();
// seconds part from the timestamp
var seconds = date.getSeconds();


// will display time in 10:30:23 format
TargetDate = months + '/' + days + '/' + years + ' ' + hours + ':' + minutes + ':' + seconds;

</script>
<div id="countTimer" name="countTimer" style="margin-left:100px;">
<script language="JavaScript" src="countdown.js"></script>
</div>
<div id = "soldtime" style = "margin-left:100px;">
<span id="timedispspan"></span>
</div>
<div id = "bottom" style = "margin-left:100px;">
<form name="BidForm" id="BidForm" onsubmit="return false">
<input type="button" value="Bid" onclick="AddSecond();" style = "width:100px;height:30px;">
</form>
</div>
</body>
</html>