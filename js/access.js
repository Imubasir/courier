
jQuery.ajax({
    url:'../php/access.php',

    success:function(json) {

        var results = [];
        var data = JSON.parse(json);

        for(var i = 0; i < data.length; i++) {
            results.push(data[i].group_page_fk);
        }

    //Access for Parcel
        if(!(results.includes("2"))) {
           document.getElementById("addParcel").style.display = 'none';
       } 
       if(!(results.includes("3"))) {
           document.getElementById("searchParcel").style.display = 'none';
       }
       if(!(results.includes("4"))) {
           document.getElementById("viewDetails").style.display = 'none';
       }
       if(!(results.includes("6"))) {
           document.getElementById("addPayment").style.display = 'none';
       }
       if(!(results.includes("7"))) {
           document.getElementById("viewPayment").style.display = 'none';
       }
       if(!(results.includes("8"))) {
           document.getElementById("parcelTracking").style.display = 'none';
       }
       if(!(results.includes("27"))) {
           document.getElementById("addRegionalParcel").style.display = 'none';
       }
       if(!(results.includes("2")) && !(results.includes("3")) && !(results.includes("4")) && !(results.includes("6")) && !(results.includes("7")) && !(results.includes("8")) && !(results.includes("27"))) {
           document.getElementById("parcelHome").style.display = 'none';
       }

    //Access for Internal Processing
        if(!(results.includes("9"))) {
           document.getElementById("processDashboard").style.display = 'none';
       } 
       if(!(results.includes("10"))) {
           document.getElementById("createManifest").style.display = 'none';
       }
       if(!(results.includes("11"))) {
           document.getElementById("viewManifest").style.display = 'none';
       }
       if(!(results.includes("12"))) {
           document.getElementById("assignConsignment").style.display = 'none';
       }
       if(!(results.includes("13"))) {
           document.getElementById("dispatchConsignment").style.display = 'none';
       }

       if(!(results.includes("9")) && !(results.includes("10")) && !(results.includes("11")) && !(results.includes("12")) && !(results.includes("13"))) {
           document.getElementById("processHome").style.display = 'none';
       }

    //Access for Receival
        if(!(results.includes("14"))) {
           document.getElementById("recViewManifest").style.display = 'none';
       } 
       if(!(results.includes("15"))) {
           document.getElementById("receiveManifest").style.display = 'none';
       }
       if(!(results.includes("16"))) {
           document.getElementById("delivery").style.display = 'none';
       }

       if(!(results.includes("14")) && !(results.includes("15")) && !(results.includes("16"))) {
           document.getElementById("receiveHome").style.display = 'none';
       }

    //Access for Finance
        if(!(results.includes("17"))) {
           document.getElementById("financeDashboard").style.display = 'none';
       } 
       if(!(results.includes("18"))) {
           document.getElementById("financeViewSent").style.display = 'none';
       }
       if(!(results.includes("19"))) {
           document.getElementById("financeViewCompanySent").style.display = 'none';
       }

       if(!(results.includes("17")) && !(results.includes("18")) && !(results.includes("19"))) {
           document.getElementById("financeHome").style.display = 'none';
       }

    //Access for Settings
        if(!(results.includes("20"))) {
           document.getElementById("users").style.display = 'none';
       } 
       if(!(results.includes("21"))) {
           document.getElementById("userGroups").style.display = 'none';
       }
       if(!(results.includes("22"))) {
           document.getElementById("customers").style.display = 'none';
       }
       if(!(results.includes("23"))) {
           document.getElementById("branches").style.display = 'none';
       }
       if(!(results.includes("24"))) {
           document.getElementById("flights").style.display = 'none';
       }
       if(!(results.includes("25"))) {
           document.getElementById("rates").style.display = 'none';
       }
       if(!(results.includes("26"))) {
           document.getElementById("log").style.display = 'none';
       }

       if(!(results.includes("20")) && !(results.includes("21")) && !(results.includes("22"))  && !(results.includes("23"))  && !(results.includes("24")) && !(results.includes("25")) && !(results.includes("26"))) {
           document.getElementById("settingHome").style.display = 'none';
       }

   }
})