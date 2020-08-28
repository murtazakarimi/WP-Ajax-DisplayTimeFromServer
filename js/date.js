// Date JS
$(document).ready(function($) {
  $.ajax({
    type: 'POST',
    url: date_ajax_url.ajax_url,
    data: {
      action: 'get_time'
    }
  }).done(function(response) {
    $('.date-to-show').text(response);
  })
});
