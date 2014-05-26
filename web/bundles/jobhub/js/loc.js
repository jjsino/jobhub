
function showPosition(position)
  {
  
  var infopos = "Position déterminée :\n";
  infopos += "Latitude : "+position.coords.latitude +"\n";
  infopos += "Longitude: "+position.coords.longitude+"\n";
  infopos += "Altitude : "+position.coords.altitude +"\n";
  
  $.ajax({
            url: "../../src/JH_Project/JobHubBundle/Resources/ajax/getCloserCity.php?longitude="+position.coords.longitude+"&latitude="+position.coords.latitude,
            context: document.body
         }).done(function( result) {            
            $(".tracked_city").val(result);
            }
        );
  }
  
function onLoadPlugGeo(){
    $('.tracked_city').val('Localisation en cours ...');
    getLocalisation();
   
}

function getLocalisation(){
    if(navigator.geolocation) {
  // L'API est disponible
  navigator.geolocation.getCurrentPosition(showPosition);   
} else {
  // Pas de support, proposer une alternative ?
  alert("Nous ne pouvons pas vous géocaliser sur votre navigateur");
}
}


