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

export const countDown = idDomElement => endDate => {
  var end = new Date(endDate)

  var _second = 1000
  var _minute = _second * 60
  var _hour = _minute * 60
  var _day = _hour * 24
  var timer
  console.log({endDate})
  function showRemaining () {
    var now = new Date()
    var distance = end - now
    if (distance < 0) {
      clearInterval(timer)
      document.getElementById(idDomElement).innerHTML = 'EXPIRED!'

      return
    }
    var days = Math.floor(distance / _day)
    var hours = Math.floor((distance % _day) / _hour)
    var minutes = Math.floor((distance % _hour) / _minute)
    var seconds = Math.floor((distance % _minute) / _second)

    document.getElementById(idDomElement).innerHTML = days + ' días '
    document.getElementById(idDomElement).innerHTML += hours + ' horas '
    document.getElementById(idDomElement).innerHTML += minutes + ' minutos '
    document.getElementById(idDomElement).innerHTML += seconds + ' segundos'
  }

  timer = setInterval(showRemaining, 1000)
}
