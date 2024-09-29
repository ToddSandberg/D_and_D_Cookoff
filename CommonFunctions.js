function callPHPUtilityFunction(functionname, args, relativePath) {
    console.log(`calling ${functionname} with arguments ${args}`);
    jQuery.ajax({
        type: "POST",
        url: relativePath + 'Apis.php',
        dataType: 'json',
        data: {functionname, arguments: args},

        success: function (obj, textstatus) {
            if( !('error' in obj) ) {
                //TODO add alert to page
                //alert("Success! Please refresh to see results.");
                console.log("Success!");
                window.location.reload();
            }
            else {
                console.log(obj.error);
            }
        },

        error: function(xhr, status, error) {
            if (error) {
                console.error("There was an error?", error);
                alert(xhr.responseText);
            } else {
                window.location.reload();
            }
        }
    });
}

function fetchNewPagePath(path) {
    return path + "/" + document.getElementById("newPageName").value;
}