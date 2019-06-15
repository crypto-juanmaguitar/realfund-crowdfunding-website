import './common'
import moment from 'moment'
import web3 from './contracts/web3'

import { getProjectsDetails, fundProject } from './utils/'
import { getUrlVars, drawPie } from './utils/common'

let { address } = getUrlVars()
address = address.replace(/\#/g,'')
console.log({ address })

web3.eth.getAccounts().then(([account]) => {
  console.log(account)
  window.REALFUND.thisAccount = account
})

;(async function () {
  const { title, description, goal, finishesAt } = await getProjectsDetails(
    address
  )

  const finalizesIn = moment.unix(finishesAt).fromNow()

  $('.rfnd-title-project').html(title)
  $('.rfnd-description-project').html(description)
  $('.rfnd-finalizes-project').html(finalizesIn)

  console.log({ address, title, description, goal, finishesAt })

  console.log({ address })
  const balance = await web3.eth.getBalance(address)
  const balanceInEther = web3.utils.fromWei(balance.toString())
  console.log({ balanceInEther })

  $('.rfnd-amount-financed-project').html(`${balanceInEther} ETH`)
  $('.rfnd-amount-goal-project').html(`${goal} ETH`)
  $('.rfnd-duetime-goal-project').html(finalizesIn)

  const percent = (goal * balanceInEther) / 100
  $('.rfnd-percent-project').attr('data-percent', percent)

  drawPie()
})()

$('.rfnd-contribute-project').on('click', async function (e) {
  console.log('click button')
  console.log({ address })
  await fundProject({
    projectAddress: address,
    amount: '2'
  })
})
