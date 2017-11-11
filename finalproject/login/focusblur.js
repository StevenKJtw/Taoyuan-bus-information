var helpArray = [ "Enter your name in this input box.",
  "Enter your password in this input box.","" ];
var helpText;
function init()
{
   helpText = document.getElementById( "helpText" );
   registerListeners(document.getElementById( "name" ), 0 );
   registerListeners(document.getElementById( "pass" ), 1 );
}
function registerListeners( object, messageNumber )
{
   object.addEventListener( "focus",
      function() { helpText.innerHTML = helpArray[ messageNumber ]; },
      false );
   object.addEventListener( "blur",
      function() { helpText.innerHTML = helpArray[ 2 ]; }, false );
}
window.addEventListener( "load", init, false );