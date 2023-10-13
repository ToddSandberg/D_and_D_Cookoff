function callPHPUtilityFunction(functionname, args) {
    console.log(`calling ${functionname} with arguments ${args}`);
    jQuery.ajax({
        type: "POST",
        url: 'Apis.php',
        dataType: 'json',
        data: {functionname, arguments: args},

        success: function (obj, textstatus) {
                    if( !('error' in obj) ) {
                        //TODO add alert to page
                        alert("Success! Please refresh to see results.");
                        console.log("Success!");
                    }
                    else {
                        console.log(obj.error);
                    }
                },
        
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}