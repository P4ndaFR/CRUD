$( document ).ready(function()
{
  $(".modal").modal();
  $('select').material_select();
  //$(".dropdown-button").dropdown();
  $(".button-collapse").sideNav();
  $('.collapsible').collapsible({
      accordion : true  // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    })

});
