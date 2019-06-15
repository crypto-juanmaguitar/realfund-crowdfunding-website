import web3 from './contracts/web3'
import './common'

import { getProjectsListInfo } from './utils/'

console.log('Home!')

web3.eth.getAccounts().then(([account]) => {
  console.log(account)
  window.REALFUND.thisAccount = account
  getProjectsListInfo()
})
