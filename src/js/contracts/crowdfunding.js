/* eslint-disable */
import web3 from './web3';
import {abi} from 'realfund-smart-contracts/build/contracts/Crowdfunding.json'

const address = '0x2c20b238eBf33b09E55541f1D22421a8824c33aa'; // Your deployed contract's address goes here

const instance = new web3.eth.Contract(abi, address);

export default instance;
