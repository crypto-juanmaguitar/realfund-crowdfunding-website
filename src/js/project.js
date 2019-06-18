import web3 from './contracts/web3'
import './common'

import { getProjectsDetails, fundProject, getRefundProject } from './utils/'
import { getUrlVars, drawPie, countDown } from './utils/common'

import '../scss/project.scss'

let { address } = getUrlVars()
address = address.replace(/\#/g, '')
console.log({ address })

web3.eth.getAccounts().then((accounts) => {

  console.log(accounts)
  const [account] = accounts
  console.log(account)
  window.REALFUND.thisAccount = account
})
;(async function () {
  const {
    title,
    description,
    goal,
    finishesAt,
    finalizesIn,
    closedAgo,
    isClosed,
    percent,
    balanceInEther
  } = await getProjectsDetails(address)

  console.log({ closedAgo, isClosed })
  $('.rfnd-title-project').html(title)
  $('.rfnd-description-project').html(description)
  $('.rfnd-finalizes-project').html(finalizesIn)

  $('.rfnd-amount-financed-project').html(`${balanceInEther} ETH`)
  $('.rfnd-amount-goal-project').html(`${goal} ETH`)
  $('.rfnd-duetime-goal-project').html(finalizesIn)

  $('.rfnd-percent-project').attr('data-percent', percent)

  drawPie()

  const $projectStatusBar = $('#rfnd-status-project')
  const $projectStatusBarMessage = $projectStatusBar.find('.message-top')

  if (new Date() > new Date(finishesAt * 1000)) {
    if (balanceInEther < goal) {
      $projectStatusBarMessage
        .addClass('alert')
        .text(
          `🙁 El proyecto ha expirado y no consiguió financiar su objetivo de ${goal} ETH`
        )

      $('.rfnd-contribute-project').addClass('hidden')
      $('.rfnd-contribute-project-description').addClass('hidden')
      $('.rfnd-refund-project').removeClass('hidden')
    } else {
      $projectStatusBarMessage
        .addClass('success')
        .text(
          `🎉 El proyecto terminó con exito! Se consiguió financiar su objetivo de ${goal} ETH`
        )
    }
  } else {
    $projectStatusBarMessage
      .addClass('progress')
      .html(
        '<p>🤞 Proyecto abierto. Quedan <span id="rfnd-status-project-countdown"></span></p>'
      )
    const countDownProject = countDown('rfnd-status-project-countdown')
    countDownProject(finishesAt * 1000)
  }

  $('#pluswrap').addClass('hidden')
})()

$('.rfnd-contribute-project').on('submit', async function (e) {
  e.preventDefault()
  const amount = $(this)
    .find('input')
    .val()
  await fundProject({
    projectAddress: address,
    amount
  })
})

$('.rfnd-refund-project').on('submit', async function (e) {
  e.preventDefault()
  await getRefundProject({
    projectAddress: address
  })
})
