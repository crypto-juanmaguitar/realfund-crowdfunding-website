import $ from 'jquery'

export function getUrlVars () {
  var vars = {}
  var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (
    m,
    key,
    value
  ) {
    vars[key] = value
  })
  return vars
}

export function drawPie () {
  var values = []
  $('.sys_circle_progress').each(function () {
    var getDonePercent = parseInt($(this).attr('data-percent'))
    var getPendingPercent = 100 - getDonePercent
    console.log({ getDonePercent, getPendingPercent })
    if (getPendingPercent == 0) {
      values[0] = getDonePercent
    } else if (getPendingPercent == 100) {
      values[0] = getDonePercent
    } else {
      console.log('sdsds')
      values[0] = getPendingPercent
      values[1] = getDonePercent
    }
    document.getElementsByClassName('sys_holder_sector')[0].innerHTML = ''
    window
      .Raphael($(this).find('.sys_holder_sector')[0], 78, 78)
      .pieChart(39, 39, 39, values, '#cecece')
    $(this).append(
      '<span class="val-progress">' + $(this).attr('data-percent') + '%</span>'
    )

    $('.rfnd-highlighted-project-image').on('load', function () {
      $('#pluswrap').addClass('hidden')
    })


    $('#pluswrap').addClass('hidden')
  })
}
