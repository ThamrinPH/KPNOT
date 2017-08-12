<script type="text/javascript">
var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1);
var monthArray = new Array();
monthArray[1] = "Januari";
monthArray[2] = "Februari";
monthArray[3] = "March";
monthArray[4] = "April";
monthArray[5] = "Mei";
monthArray[6] = "Juni";
monthArray[7] = "Juli";
monthArray[8] = "Agustus";
monthArray[9] = "September";
monthArray[10] = "October";
monthArray[11] = "November";
monthArray[12] = "December";

for(m = 0; m <= 11; m++) {
    var optn = document.createElement("OPTION");
    optn.text = monthArray[m];
    // server side month start from one
    optn.value = (m+1);
 
    // if june selected
    if ( m == (today.getMonth()+1)) {
        optn.selected = true;
    }
 
    document.getElementById('month').options.add(optn);
}
for(y = 1945; y <= today.getFullYear(); y++) {
        var optn = document.createElement("OPTION");
        optn.text = y;
        optn.value = y;
        
        // if year is 2015 selected
     
   if (y == today.getFullYear()) {
            optn.selected = true;
        }
        
        document.getElementById('year').options.add(optn);
}

function mthchange() {
     var mth = document.getElementById("month").value;
     var yrs = document.getElementById("year").value;

}

function yrschange() {
     var mth = document.getElementById("month").value;
     var yrs = document.getElementById("year").value;
}
</script>