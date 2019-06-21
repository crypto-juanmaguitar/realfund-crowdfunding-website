import web3 from './contracts/web3'
import './common'

import {
  getProjectsDetails,
  fundProject,
  getRefundProject,
  withdrawFundsProject,
  getTokensProject
} from './utils/'
import { getUrlVars, drawPie, countDown } from './utils/common'

import '../scss/project.scss'

let { address } = getUrlVars()
address = address.replace(/\#/g, '')
console.log({ address })
;(async function () {
  const {
    title,
    description,
    goal,
    finishesAt,
    closedAt,
    finalizesIn,
    closedAgo,
    isClosed,
    percent,
    creator,
    contributors,
    balanceInEther,
    currentUserContributionInEhter
  } = await getProjectsDetails(address)

  console.log({ closedAgo, isClosed })
  $('.rfnd-title-project').html(title)
  $('.rfnd-description-project').html(description)
  $('.rfnd-finalizes-project').html(finalizesIn)

  $('.rfnd-amount-financed-project').html(`${balanceInEther} ETH`)
  $('.rfnd-amount-goal-project').html(`${goal} ETH`)
  $('.rfnd-duetime-goal-project').html(finalizesIn)
  $('.rfnd-contributors-project').text(contributors.length)

  $('.rfnd-percent-project').attr('data-percent', percent)

  drawPie()

  const $projectStatusBar = $('#rfnd-status-project')
  const $projectStatusBarMessage = $projectStatusBar.find('.message-top')

  if (closedAt != 0) {
    let text = `<p>🎉 El proyecto terminó con exito! Se consiguió financiar su objetivo de ${goal} ETH</p>`
    if (window.REALFUND.thisAccount === creator) {
      text += `<p class="note"><strong>Eres el creador</strong> de este proyecto</p>`
      if (+balanceInEther !== 0) {
        text += `<p class="note">Puedes retirar el dinero financiado (${balanceInEther} ETH)</p>`
        $('.rfnd-withdraw-project').removeClass('hidden')
      }
    }
    if (+currentUserContributionInEhter) {
      text += `<p class="note"><strong>Has invertido ${currentUserContributionInEhter} ETH</strong> de este proyecto. Puedes retirar tus tokens STP</p>`
      $('.rfnd-tokens-project').removeClass('hidden')
    }

    $projectStatusBarMessage.addClass('success').html(text)

    $('.rfnd-withdraw-amount-project').text(`${balanceInEther} ETH`)

    $('.rfnd-contribute-project').addClass('hidden')
    $('.rfnd-contribute-project-description').addClass('hidden')

  } else if (new Date() > new Date(finishesAt * 1000) ) {
    let text = `🙁 El proyecto ha expirado y no consiguió financiar su objetivo de ${goal} ETH`
    if (
      currentUserContributionInEhter &&
      +currentUserContributionInEhter !== 0
    ) {
      text += `<p class="note"><strong>Habias invertido ${currentUserContributionInEhter} ETH</strong> de este proyecto por lo que puedes solicitar la devolución de tu aportación</p>`
    }
    $projectStatusBarMessage.addClass('alert').html(text)

    $('.rfnd-refund-amount-project').text(
      `${currentUserContributionInEhter} ETH`
    )

    $('.rfnd-contribute-project').addClass('hidden')
    $('.rfnd-contribute-project-description').addClass('hidden')
    if (
      currentUserContributionInEhter &&
      +currentUserContributionInEhter !== 0
    ) {
      $('.rfnd-refund-project').removeClass('hidden')
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

$('.rfnd-withdraw-project').on('submit', async function (e) {
  e.preventDefault()
  await withdrawFundsProject({
    projectAddress: address
  })
})

$('.rfnd-tokens-project').on('submit', async function (e) {
  e.preventDefault()
  await getTokensProject({
    projectAddress: address
  })
})
