$('.sort-wins').click(function(){
  $('.highlight').removeClass('highlight');
  $(this).addClass('highlight');
  $('tr').hide();
  $('tr.won').show();
});
$('.sort-losses').click(function(){
  $('.highlight').removeClass('highlight');
  $(this).addClass('highlight');
  $('tr').hide();
  $('tr.lost').show();
});
$('.sort-all').click(function(){
  $('.highlight').removeClass('highlight');
  $(this).addClass('highlight');
  $('tr').show();
});