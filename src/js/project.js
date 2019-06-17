import web3 from './contracts/web3'
import './common'

import { getProjectsDetails, fundProject } from './utils/'
import { getUrlVars, drawPie } from './utils/common'

import '../scss/project.scss'

let { address } = getUrlVars()
address = address.replace(/\#/g, '')
console.log({ address })

web3.eth.getAccounts().then(([account]) => {
  console.log(account)
  window.REALFUND.thisAccount = account
})
;(async function () {
  const {
    title,
    description,
    goal,
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

  $('#pluswrap').addClass('hidden')
})()

$('.rfnd-contribute-project').on('submit', async function (e) {
  e.preventDefault()
  const amount = $(this).find('input').val()
  await fundProject({
    projectAddress: address,
    amount
  })
})
