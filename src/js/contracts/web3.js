/* eslint-disable */
import Web3 from 'web3'
import { updateInterface } from '../helpers'

window.REALFUND = window.REALFUND || {}

if (window.ethereum) {
  window.web3 = new Web3(ethereum)

  console.log(web3.currentProvider.connection.networkVersion)

  console.log(
    `Network detected → ${web3.currentProvider.connection.networkVersion}`
  )
  if (web3.currentProvider.connection.networkVersion !== '3') {
    console.log(`Redirecting to ropsten error page...`)
    window.location.href = '/errors/ropsten.html'
  }

  web3.eth.getAccounts().then(accounts => {
    console.log(accounts)
    const [account] = accounts
    console.log(account)
    window.REALFUND.thisAccount = account
    detectChangeAccountMetamask()
  })

  try {
    // Request account access if needed
    ethereum.enable()
  } catch (error) {
    // User denied account access...
  }
} else if (window.web3) {
  // Legacy dapp browsers...
  window.web3 = new Web3(web3.currentProvider)
  console.log(web3.currentProvider.connection.networkVersion)

  console.log(
    `Network detected → ${web3.currentProvider.connection.networkVersion}`
  )
  if (web3.currentProvider.connection.networkVersion !== '3') {
    console.log(`Redirecting to ropsten error page...`)
    window.location.href = '/errors/ropsten.html'
  }

  web3.eth.getAccounts().then(accounts => {
    console.log(accounts)
    const [account] = accounts
    console.log(account)
    window.REALFUND.thisAccount = account
    detectChangeAccountMetamask()
  })
}
// else if (window.ethereum) {
//   window.web3 = new Web3(ethereum);
//   try {
//     // Request account access if needed
//     ethereum.enable();
//   } catch (error) {
//     // User denied account access...
//   }
// }
else {
  // Non-dapp browsers...
  // console.log('Non-Ethereum browser detected. You should consider trying MetaMask!');
  console.log(`window.web3 → ${window.web3}`)
  console.log(`Redirecting to metamask error page...`)
  window.location.href = '/errors/no-metamask.html'
}

/* eslint-disable */
// import Web3 from 'web3';
// const INFURA_API_KEY = 'f7f725c2a50a406db55d45129e5bbec2'
// const getInfuraUrl = apiKey => `https://ropsten.infura.io/v3/${apiKey}`

// var web3 = new Web3(new Web3.providers.HttpProvider(
//   getInfuraUrl(INFURA_API_KEY)
// ));

// if (window.web3) {
//   window.web3 = new Web3(new Web3.providers.HttpProvider(
//     getInfuraUrl(INFURA_API_KEY)
//   ));
//   console.log(window.web3)
// } else {
//   // Non-dapp browsers...
//   window.location.href = '/errors/no-metamask.html'
// }

// export default web3;

function detectChangeAccountMetamask() {
  var accountInterval = setInterval(async function() {
    const [account] = await web3.eth.getAccounts()
    if (account !== window.REALFUND.thisAccount) {
      console.log('account change in metamask!!')
      console.log('reloading...')
      window.REALFUND.thisAccount = web3.eth.accounts[0]
      updateInterface()
    }
    else {
      console.log('no change account...')
    }
  }, 2500)
}

export default web3
